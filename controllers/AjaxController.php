<?php

namespace app\controllers;
use app\models\node\Feedback;
use Yii;
use app\models\LoginForm;
use app\models\node\Node;
use app\models\ContactForm;
use yii\web\UploadedFile;
use app\models\file\UploadForm;

//require_once (\Yii::$app->request->BaseUrl.'/recaptcha/autoload.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/web/recaptcha/autoload.php');


class AjaxController extends \app\components\Controller
{

    public $enableCsrfValidation = false;


    public static function is_email($email) {
        return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
    }

    /**
     * Обратная связь
     */
    public function actionFeedback()
    {
        $errors         = [];
        $data           = [];
        $data['felds']  = [];

        if(Yii::$app->request->isAjax) {
            //Yii::$app->request->isPost


            $recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
            $resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

            if (!$resp->isSuccess()){

                $errors['recaptcha'] = 'Ошибка! Проверка не пройдена.';
//                foreach ($resp->getErrorCodes() as $code) {
//                    echo "Ошибка! Проверка не пройдена.";
//                    $errors['recaptcha'] .= '<br>'.$code;
//                    echo $code;
//                    return;
//                }
            }

//            $data['felds']['recaptcha']  = intval(Yii::$app->request->post('g-recaptcha-response', ''));
            $data['felds']['company']  = intval(Yii::$app->request->post('inp__company', '1'))-1;
            $data['felds']['fio']           = trim(Yii::$app->request->post('inp__fio', ''));
            $data['felds']['phone']         = trim(Yii::$app->request->post('inp__phone', ''));
            $data['felds']['email']         = trim(Yii::$app->request->post('inp__email', ''));
            $data['felds']['tema']          = trim(Yii::$app->request->post('inp__tema', ''));
            $data['felds']['message']       = trim(Yii::$app->request->post('inp__message', ''));


            foreach($data['felds'] as $feld_key => $feld_val) {

                if ($feld_key == 'company') {
                    continue;
                }

                if (!$feld_val) {
                    $errors[$feld_key] = 'Поле обязательное';
                }
            }
            if (!count($errors)) {
                if ( !self::is_email($data['felds']['email'])) {
                    $errors['email'] = 'Неверный E-mail';
                }
            }

            if (count($errors)) {

                $data['code'] = 400;


            } else {

                $feedback = new Feedback();

                $feedback->company  = $data['felds']['company'];
                $feedback->fio      = $data['felds']['fio'];
                $feedback->phone    = $data['felds']['phone'];
                $feedback->email    = $data['felds']['email'];
                $feedback->theme    = $data['felds']['tema'];
                $feedback->message  = $data['felds']['message'];
                $feedback->save();
                

                $data['code'] = 200;

                $email_to = (intval($data['felds']['company'])) ? Yii::$app->params['email_to'] : Yii::$app->params['email_to2'];

                //$email_to    = Yii::$app->params['email_to'];
//                $email_to    = 'tomminokk@gmail.com';
//                $email_to    = 'cs@sberinsur.ru';


                $comp_list = Node::getCompany();

                $content = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Обратная связь</title>
                    </head>
                    <body style="line-height: 1.5; font-size: 14px;">

                        <p><b>Компания:</b> '.$comp_list[$data['felds']['company']].'</p>
                        <p><b>Имя и фамилия:</b> '.$data['felds']['fio'].'</p>
                        <p><b>Контактный телефон:</b> '.$data['felds']['phone'].'</p>
                        <p><b>E-mail:</b> '.$data['felds']['email'].'</p>
                        <p><b>Тема обращения:</b> '.$data['felds']['tema'].'</p>
                        <p><b>Cообщение:</b> '.$data['felds']['message'].'</p>

                    </body>
                    </html>';


                Yii::$app->mailer->compose()
                    ->setTo($email_to)
                    ->setFrom('admin@sbins.dg-prod.ru')
                    ->setSubject('Обратная связь')
                    //->setTextBody($content)
                    ->setHtmlBody($content)
                    ->send();
            }
        }

        $data['errors'] = $errors;
        echo json_encode($data);
    }



    /**
     * Резюме
     */
    public function actionResume()
    {
        $errors         = [];
        $data           = [];
        $data['felds']  = [];

        if(Yii::$app->request->isAjax) {

            $recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
            $resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

            if (!$resp->isSuccess()){
                $errors['recaptcha'] = 'Ошибка! Проверка не пройдена.';
            }



//          $data['felds']['recaptcha']  = intval(Yii::$app->request->post('g-recaptcha-response', ''));
            $data['felds']['company']       = intval(Yii::$app->request->post('inp__company', '1'))-1;
            $data['felds']['vakans']        = trim(Yii::$app->request->post('inp__vakans', ''));
            $data['felds']['fio']           = trim(Yii::$app->request->post('inp__fio', ''));
            $data['felds']['name']          = trim(Yii::$app->request->post('inp__name', ''));
            $data['felds']['mname']         = trim(Yii::$app->request->post('inp__mname', ''));
            $data['felds']['email']         = trim(Yii::$app->request->post('inp__email', ''));
            $data['felds']['message']       = trim(Yii::$app->request->post('inp__message', ''));


            foreach($data['felds'] as $feld_key => $feld_val) {

                if ( ($feld_key == 'file')
                    || ($feld_key == 'company')
                    || ($feld_key == 'message')
                    || ($feld_key == 'vakans')
                ) {
                    continue;
                }

                if (!$feld_val) {
                    $errors[$feld_key] = 'Поле обязательное';
                }
            }

            if (!count($errors)) {
                if ( !self::is_email($data['felds']['email'])) {
                    $errors['email'] = 'Неверный E-mail';
                }
            }


            $model = new UploadForm();
            $model->file = UploadedFile::getInstanceByName('file');

            if (!$model->file) {
                $errors['file'] = 'Поле обязательное';
            }

            if (!count($errors)) {

                $lnk_file = '';

                if ($model->file && $model->validate()) {

                    $new_file_name = md5(time() . rand(1, 10000)) . '.' . $model->file->extension;
                    $model->file->saveAs('resume/' . $new_file_name);

                    $lnk_file = 'http://' . $_SERVER['HTTP_HOST'] . '/resume/' . $new_file_name;

                } else {
                    $errors['file'] = $model->errors['file'][0];
                }
            }



            if (count($errors)) {

                $data['code'] = 400;

            } else {

                $data['code'] = 200;

                if ($data['felds']['company'] == 0) {
                    $email_to    = Yii::$app->params['email_to2'];  // СБС
                } else {
                    $email_to    = Yii::$app->params['email_to'];   // СБСЖ
                }
//                $email_to    = 'tomminokk@gmail.com';


                $comp_list = Node::getCompany();

                $content = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Резюме</title>
                    </head>
                    <body style="line-height: 1.5; font-size: 14px;">
                        ' .
                        // '<p><b>Компания:</b> '.$comp_list[$data['felds']['company']].'</p>' .

                        '<p><b>Вакансия:</b> '.$data['felds']['vakans'].'</p>
                        <p><b>Фамилия:</b> '.$data['felds']['fio'].'</p>
                        <p><b>Имя:</b> '.$data['felds']['name'].'</p>
                        <p><b>Отчество:</b> '.$data['felds']['mname'].'</p>
                        <p><b>E-mail:</b> '.$data['felds']['email'].'</p>
                        <p><b>Комментарий:</b> '.$data['felds']['message'].'</p>
                        <p><b>Файл резюме:</b> <a target="_blank" href="'.$lnk_file.'">'.$new_file_name.'</a></p>

                    </body>
                    </html>';


                Yii::$app->mailer->compose()
                    ->setTo($email_to)
                    ->setFrom('admin@sbins.dg-prod.ru')
                    ->setSubject('Резюме')
                    ->setHtmlBody($content)
                    ->send();
            }
        }

        $data['errors'] = $errors;
        echo json_encode($data);

    }




    /**
     * Перезвонить
     */
    public function actionCallback_prod()
    {
        $errors         = [];
        $data           = [];
        $data['felds']  = [];

        if(Yii::$app->request->isAjax) {

            $data['felds']['phone']      = trim(Yii::$app->request->post('inp__phone', ''));

            foreach($data['felds'] as $feld_key => $feld_val) {
                if (!$feld_val) {
                    $errors[$feld_key] = 'Поле обязательное';
                }
            }

            if (count($errors)) {

                $data['code'] = 400;

            } else {

                $data['code'] = 200;

                $email_to    = Yii::$app->params['email_to'];
//                $email_to    = 'tomminokk@gmail.com';
//                $email_to    = 'cs@sberinsur.ru';


                $content = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Просьба перезвонить</title>
                    </head>
                    <body style="line-height: 1.5; font-size: 14px;">

                        <p><b>Контактный телефон:</b> '.$data['felds']['phone'].'</p>

                    </body>
                    </html>';


                Yii::$app->mailer->compose()
                    ->setTo($email_to)
                    ->setFrom('admin@sbins.dg-prod.ru')
                    ->setSubject('Просьба перезвонить')
                    ->setHtmlBody($content)
                    ->send();

            }
        }

        $data['errors'] = $errors;
        echo json_encode($data);
    }



    /**
     * Заявка на получение выплаты
     */
    public function actionRequest_form()
    {
        $errors         = [];
        $data           = [];
        $data['felds']  = [];

        if(Yii::$app->request->isAjax) {

            $data['felds']['company_email']     = trim(Yii::$app->request->post('inp__company_email', ''));
            $data['felds']['what']              = trim(Yii::$app->request->post('inp__what', ''));
            $data['felds']['num_polis']         = trim(Yii::$app->request->post('inp__num_polis', ''));
            $data['felds']['phone']             = trim(Yii::$app->request->post('inp__phone', ''));
            $data['felds']['fio']               = trim(Yii::$app->request->post('inp__fio', ''));
            $data['felds']['email']             = trim(Yii::$app->request->post('inp__email', ''));
            $data['felds']['message']           = trim(Yii::$app->request->post('inp__message', ''));


            foreach($data['felds'] as $feld_key => $feld_val) {
                if (!$feld_val) {
                    $errors[$feld_key] = 'Поле обязательное';
                }
            }
            if (!count($errors)) {
                if ( !self::is_email($data['felds']['email'])) {
                    $errors['email'] = 'Неверный E-mail';
                }
            }

            if (count($errors)) {

                $data['code'] = 400;


            } else {

                $data['code'] = 200;

//              $email_to    = Yii::$app->params['email_to'];
//              $email_to    = 'tomminokk@gmail.com';
//              $email_to    = 'cs@sberinsur.ru';

                $email_to    = $data['felds']['company_email'];


                $content = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Заявка на получение выплаты</title>
                    </head>
                    <body style="line-height: 1.5; font-size: 14px;">

                        <p><b>Что произошло:</b> '.$data['felds']['what'].'</p>
                        <p><b>№ полиса:</b> '.$data['felds']['num_polis'].'</p>
                        <p><b>Телефон:</b> '.$data['felds']['phone'].'</p>
                        <p><b>ФИО:</b> '.$data['felds']['fio'].'</p>
                        <p><b>E-mail:</b> '.$data['felds']['email'].'</p>
                        <p><b>Комментарий:</b> '.$data['felds']['message'].'</p>

                    </body>
                    </html>';


                if ($email_to) {
                    Yii::$app->mailer->compose()
                        ->setTo($email_to)
                        ->setFrom('admin@sbins.dg-prod.ru')
                        ->setSubject('Заявка на получение выплаты')
                        ->setHtmlBody($content)
                        ->send();
                }


            }
        }
        $data['errors'] = $errors;
        echo json_encode($data);
    }


}
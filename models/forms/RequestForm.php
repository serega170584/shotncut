<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 23.06.16
 * Time: 10:04
 */

namespace app\models\forms;


use yii\base\Model;

class RequestForm extends Model {


    public $subject;
    public $url;

    public $name;   //ФИО
    public $phone;  //Телефон
    public $email;  //E-mail
    public $message;  //Сообщение

    public $policy;

    public function rules(){

        return [
            [['phone'], 'integer'],
            [['subject', 'url', 'name', 'email', 'policy'], 'string'],
            [['email'], 'email'],
            [['message'], 'safe'],
        ];
    }

    public function send(){
        $res = \Yii::$app->mailer->compose('policy', [
            'form' => $this
        ])
            ->setFrom('no-replay@devsberlife.ru')
            ->setTo(\Yii::$app->params['email_to'])
            ->setSubject($this->subject)
            ->send();

        return $res;
    }

    public function formName(){
        return '';
    }
} 
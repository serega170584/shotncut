<?php

namespace app\controllers;


use app\components\Controller;
use app\components\SbsCalculate;
use app\models\forms\VzrCalculateForm;
use app\models\node\Policy;
use app\models\node\PolicyType;
use yii\base\InvalidParamException;
use yii\web\NotFoundHttpException;

class PolicyController extends Controller
{
    public function actionViewid($id)
    {
        /** @var Policy $model */
        $model = Policy::find()
            ->byId($id)
            ->active()
            ->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->redirect(['policy/view', 'slug' => $model->alias], 301);
    }

    public function actionView($slug)
    {
        /** @var Policy $model */
        $model = Policy::find()
            ->byAlias($slug)
            ->active()
            ->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        $model->changeConstructor();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        $this->registerSeo($model);

        $list_comp = Policy::getCompany();

        $this->view->params['company'] = $list_comp[intval($model->rating)];

        return $this->render('//policy/view', compact('model'));
    }

    public function actionCalcvzr()
    {
        $form = new VzrCalculateForm();
        $form->setAttributes($_POST, true);

        $res = false;
        if ($form->validate()) {
            $calc = new SbsCalculate();
            $res = $calc->calculate($form);
        }

        if ($res) {
            return $this->asJson(['result' => 'ok', 'price' => $res]);
        }

        return $this->asJson(['result' => 'error']);
    }
}
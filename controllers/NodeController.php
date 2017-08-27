<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 07.06.16
 * Time: 17:45
 */

namespace app\controllers;


use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;
use app\models\node\News;
use yii\web\NotFoundHttpException;

class NodeController extends Controller {
/*
    public function actionView($id){

        $model = News::find()
            ->byId($id)
            ->active()
            ->one();

        if(!$model)
            throw new NotFoundHttpException();

        return $this->render('//online-policy/view', compact('model'));
    }*/

}
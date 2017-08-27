<?php

namespace app\modules\admin\controllers;
use app\modules\admin\components\Controller;
use Yii;

class AboutListController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}

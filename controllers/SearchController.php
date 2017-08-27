<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 06.07.16
 * Time: 13:07
 */

namespace app\controllers;


use yii\web\Controller;


class SearchController extends Controller {

    public function actionIndex(){
        
        return $this->render('index');
    }
} 
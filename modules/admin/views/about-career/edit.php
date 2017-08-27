<?php

use yii\helpers\Html;

$comp_cr = Yii::$app->request->get('company', 0);

$this->title = $model->isNewRecord ? 'Создать вакансию' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'О компании', 'url' => ['/admin/about-list']];
$this->params['breadcrumbs'][] = ['label' => 'Карьера', 'url' => ['/admin/about-career?company='.$comp_cr]];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

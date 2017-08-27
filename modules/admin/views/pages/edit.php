<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать страницу' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['/admin/pages']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

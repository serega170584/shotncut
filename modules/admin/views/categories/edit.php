<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать категорию' : $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Разделы витрины', 'url' => ['/admin/categories']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать меню' : $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Верхнее меню', 'url' => ['/admin/categories-menu']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

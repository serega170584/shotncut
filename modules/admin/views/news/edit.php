<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать блог' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['/admin/news']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

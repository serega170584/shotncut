<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать новость' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['/admin/news']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

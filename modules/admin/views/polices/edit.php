<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать полис' : $model->title;
$this->params['breadcrumbs'][] = ['label' => $this->context->list_title, 'url' => $this->context->list_url];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

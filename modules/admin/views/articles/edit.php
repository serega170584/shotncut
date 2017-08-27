<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать статью' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['/admin/articles']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

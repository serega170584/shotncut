<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать видео' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Видео', 'url' => ['/admin/video']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

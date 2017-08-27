<?php

use yii\helpers\Html;

$comp_cr = Yii::$app->request->get('company', 0);

$this->title = $model->isNewRecord ? 'Создать' : $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Обратная связь', 'url' => ['/admin/feedback?company='.$comp_cr]];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', ['model' => $model]);

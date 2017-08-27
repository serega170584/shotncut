<?php

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Создать статью' : $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мои статьи', 'url' => ['/admin/ambassador-articles']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('/articles/_form', ['model' => $model, 'back_link' => ['/admin/ambassador-articles']]);

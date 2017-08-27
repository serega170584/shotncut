<?php
use yii\widgets\Breadcrumbs;

$links = \yii\helpers\ArrayHelper::getValue(Yii::$app->view->params, 'breadcrumbs', []);
$links = array_map(function($item){
    if(!empty($item['label'])) $item['label'] = '<span class="si-breadcrumbs__text">'.$item['label'].'</span>';
    if(!empty($item['url'])) $item['class'] = 'si-breadcrumbs__link';
    return $item;
}, $links);

echo Breadcrumbs::widget([
    'tag' => 'div',
    'encodeLabels' => false,
    'homeLink' => [
        'label' => '<span class="si-breadcrumbs__text">Главная</span>',
        'url' => '/',
        'class' => 'si-breadcrumbs__link'
    ],
    'options' => [
        'class' => 'si-breadcrumbs'
    ],
    'itemTemplate' => '<div class="si-breadcrumbs__item">{link}</div>',
    'activeItemTemplate' => '{link}',
    'links' => $links
]);
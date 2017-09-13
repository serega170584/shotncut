<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;


$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => SerialColumn::className()],

        'id',
        [
            'attribute' => 'status',
            'content' => function ($model, $key, $index, $column) {
                return $model->status ? 'да' : 'нет';
            },
        ],
        'title',

        [
            'attribute' => 'sort',
            'label' => 'Сорт.'
        ],

        /*[
            'attribute' => 'rating',
            'content' => function ($model) {
                return ($model->rating == 0) ? 'Сбербанк страхование': 'Сбербанк страхование жизни';
            },
        ],*/
/*
        'alias',
        [
            'attribute' => 'lang.name',
            'header' => 'Язык',
        ],
        */

        [
			'class' => ActionColumn::className(),
			'template' => '{update}&nbsp;&nbsp;{delete}',
		],
    ],
]); ?>

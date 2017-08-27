<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;


$this->title = 'Мои статьи';
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
        'alias',
        'sort',
        [
            'attribute' => 'lang.name',
            'header' => 'Язык',
        ],

        [
			'class' => ActionColumn::className(),
			'template' => '{update}&nbsp;&nbsp;{delete}',
		],
    ],
]); ?>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;


$this->title = 'Верхнее меню';
$this->params['breadcrumbs'][] = $this->title;

$dataProvider->pagination->pagesize = -1;

?>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'attribute' => 'name',
            'content' => function ($model, $key, $index, $column) {
                return str_repeat("&nbsp;", $model->depth*8).$model->name;
            },
            'contentOptions' =>function ($model, $key, $index, $column) {
                return ['style'=> 'width: 70%;'.($model->gray?'color: #999999;':'')];
            },
        ],
        [
            'attribute' => 'link',
            'content' => function ($model, $key, $index, $column) {
                if(trim($model->link) && (trim($model->link) != '#')) {
                    return Html::a('ссылка', $model->link);
                } else {
                    return '-';
                }
            },
            'contentOptions' =>['style'=>'text-align: center;'],
        ],
        [
			'class' => ActionColumn::className(),
			'template' => '{update}&nbsp;&nbsp;{delete}',
            'buttons' => [
                'delete' => function ($url,$model) {
                    return $model->isRoot()?'':Html::a('<span class="glyphicon glyphicon-trash"></span>',$url);
                },
            ],
            'contentOptions' =>['style'=>'width: 60px;'],
		]
    ],
]); ?>
 
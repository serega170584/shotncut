<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;


$this->title = 'Реестр страховых агентов';
$this->params['breadcrumbs'][] = ['label' => 'О компании', 'url' => ['/admin/about-list']];
$this->params['breadcrumbs'][] = $this->title;

$comp_cr = Yii::$app->request->get('company', 0);
?>

<a href="?company=0" class="btn btn-default <?=($comp_cr == 0)?'active':''?>">Сбербанк страхование</a>
<a href="?company=1" class="btn btn-default <?=($comp_cr == 1)?'active':''?>">Сбербанк страхование жизни</a>

<div class="clearfix"></div>
<br>


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
            'attribute' => 'rating',
            'content' => function ($model) {
                return ($model->rating == 0) ? 'Сбербанк страхование': 'Сбербанк страхование жизни';
            },
        ],
        'sort',
        [
			'class' => ActionColumn::className(),
			'template' => '{update}&nbsp;&nbsp;{delete}',
            'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>',
                        $url.'&company='.Yii::$app->request->get('company', 0));
                },
                'delete' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        $url.'&company='.Yii::$app->request->get('company', 0));
                },
            ],
		],
    ],
]); ?>

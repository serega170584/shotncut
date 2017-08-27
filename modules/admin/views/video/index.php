<?php

use yii\helpers\Html;

use app\models\category\CategoryVideo;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;


$this->title = 'Видео';
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
            'attribute' => 'categoryVideo',
            'content' => function (\app\models\node\Node $model) {
                return implode(", ", \yii\helpers\ArrayHelper::getColumn($model->getCategoryVideo()->all(), 'name'));
            },

        ],
        [
            'attribute' => 'sort',
            'label' => 'Сорт.'
        ],
        [
			'class' => ActionColumn::className(),
			'template' => '{update}&nbsp;&nbsp;{delete}',
		],
    ],
]); ?>

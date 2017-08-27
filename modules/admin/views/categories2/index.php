<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;


$this->title = 'Способ оформления';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'code',
        [
			'class' => ActionColumn::className(),
			'template' => '{update}&nbsp;&nbsp;{delete}',
		]
    ],
]); ?>

<?php

use app\models\node\Node;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use marvin255\yii2tinymce\TinyMceInput;
use yii\widgets\ActiveForm;

use app\models\lang\Lang;

$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
$parent_nodes = ArrayHelper::map(Node::find()->andFilterWhere(['!=', 'id', $model->id])->all(), 'id', 'title');

$model->parent_id = $model->parent ? $model->parent->id : 0;

if (empty($back_link)) $back_link = ['/admin/pages'];

$form = ActiveForm::begin([
    'method' => 'post',
    'enableClientScript' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
]);

?>

<?php echo $form->field($model, 'status')->checkbox(); ?>
<?php echo $form->field($model, 'title')->input('text'); ?>
<?php echo $form->field($model, 'alias')->input('text'); ?>
<?php echo $form->field($model, 'sort')->input('text'); ?>
<?php echo $form->field($model, 'lang_id')->dropDownList($langs, ['prompt' => '-']); ?>
<?php echo $form->field($model, 'parent_id')->dropDownList($parent_nodes, ['prompt' => '-']); ?>

<h2>Сео</h2>
<?php echo $form->field($model, 'seo_title')->input('text'); ?>
<?php echo $form->field($model, 'seo_keywords')->input('text'); ?>
<?php echo $form->field($model, 'seo_description')->textarea(['rows' => 2]); ?>

<h2>Контент</h2>
<?php
echo $form->field($model, 'preview_text')->widget(
    TinyMceInput::className(),
    ['options_bag' =>
        ['basic']
    ]
);
?>

<?php
echo $form->field($model, 'detail_text')->widget(
    TinyMceInput::className(),
    ['options_bag' =>
        ['basic']
    ]
);
?>
<?php //echo $form->field($model, 'preview_text')->textarea(['rows' => 6]); ?>
<?php //echo $form->field($model, 'detail_text')->textarea(['rows' => 6]); ?>

<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

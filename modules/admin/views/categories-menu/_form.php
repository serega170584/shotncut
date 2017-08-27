<?php

use app\models\category\CategoryMenu;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

$arr_cat = CategoryMenu::find()->andFilterWhere(['!=', 'id', $model->id])->orderBy(['lft' => SORT_ASC])->all();
foreach($arr_cat as &$node) {
    $node->name = str_repeat("-", $node->depth*4).' '.$node->name;
}
$parent_nodes = ArrayHelper::map($arr_cat, 'id', 'name');

//$model->parent_id = $model->parent ? $model->parent->id : 0;

if (empty($back_link)) $back_link = ['/admin/categories-menu'];

$form = ActiveForm::begin([
    'method' => 'post',
    'enableClientScript' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
]);
?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->field($model, 'name')->input('text'); ?>
<?php if (!$model->isRoot()) { ?>
    <?php echo $form->field($model, 'gray')->checkbox(); ?>
    <?php echo $form->field($model, 'link')->input('text'); ?>
    <?php echo $form->field($model, 'parent_id')->dropDownList($parent_nodes, ['prompt' => '-']); ?>
    <?php echo $form->field($model, 'move_to')->label('Разместить')->dropDownList([
        '0' => 'Внутри', '1' => 'Перед', '2' => 'После',
    ]); ?>
    <?php
} ?>




<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

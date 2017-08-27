<?php

use app\models\category\Category;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

$parent_nodes = ArrayHelper::map(Category::find()->andFilterWhere(['!=', 'id', $model->id])->all(), 'id', 'name');

$model->parent_id = $model->parent ? $model->parent->id : 0;

if (empty($back_link)) $back_link = ['/admin/categories'];

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
<?php echo $form->field($model, 'code')->input('text'); ?>
<?php echo $form->field($model, 'sort')->input('text'); ?>
<?php echo $form->field($model, 'parent_id')->dropDownList($parent_nodes, ['prompt' => '-']); ?>


<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

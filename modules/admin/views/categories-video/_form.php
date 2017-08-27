<?php

use app\models\category\CategoryVideo;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

$parent_nodes = ArrayHelper::map(CategoryVideo::find()->andFilterWhere(['!=', 'id', $model->id])->all(), 'id', 'name');

$model->parent_id = $model->parent ? $model->parent->id : 0;

if (empty($back_link)) $back_link = ['/admin/categories-video'];

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
<?php echo $form->field($model, 'sort')->input('text'); ?>

<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

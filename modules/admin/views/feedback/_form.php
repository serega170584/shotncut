<?php

use kartik\select2\Select2;
use marvin255\yii2tinymce\TinyMceInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\lang\Lang;


$comp_cr = Yii::$app->request->get('company', 0);

$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
if (empty($back_link)) $back_link = ['/admin/feedback?company='.$comp_cr];

$form = ActiveForm::begin([
    'method' => 'post',
    'enableClientScript' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
]);

?>

<div class="panel panel-default">
    <div class="panel-heading">Контент</div>
    <div class="panel-body">
        <?php echo $form->field($model, 'fio')->input('text'); ?>
        <?php echo $form->field($model, 'phone')->input('text'); ?>
        <?php echo $form->field($model, 'email')->input('text'); ?>
        <?php echo $form->field($model, 'theme')->input('text'); ?>
        <?php echo $form->field($model, 'created_at')->input('text'); ?>

        <?php echo $form->field($model, 'message')->widget(
            TinyMceInput::className(),
            ['options_bag' => ['text_only']]
        ); ?>
    </div>
</div>


<?php if (Yii::$app->controller->action->id == 'update') { ?>
    <div class="panel panel-default">
        <div class="panel-heading">Комания</div>
        <div class="panel-body">
            <?php
            echo $form->field($model, 'company')->label(false)->widget(Select2::className(), [
                'data' => $model->company2,
                'options' => [
                    'placeholder' => 'Выберите команию ...',
                ]
            ]);
            ?>
        </div>
    </div>
    <?php
} ?>


<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php

use app\models\category\Category;
use app\models\tag\Tag;
use kartik\select2\Select2;
use marvin255\yii2tinymce\TinyMceInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

use app\models\lang\Lang;

$comp_cr = Yii::$app->request->get('company', 0);

$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
if (empty($back_link)) $back_link = ['/admin/team?company='.$comp_cr];

$form = ActiveForm::begin([
    'method' => 'post',
    'enableClientScript' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
]);

?>

<div class="panel panel-default">
    <div class="panel-heading">Базовые настройки</div>
    <div class="panel-body">
        <?php echo $form->field($model, 'status')->checkbox(); ?>
        <?php echo $form->field($model, 'title')->input('text'); ?>
        <?php echo $form->field($model, 'alias')->input('text'); ?>
        <?php echo $form->field($model, 'sort')->input('text'); ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">Контент</div>
    <div class="panel-body">

        <?php echo $form->field($model, 'text_1')->input('text'); ?>
        <?php echo $form->field($model, 'text_2')->input('text'); ?>
        <?php echo $form->field($model, 'text_3')->input('text'); ?>

        <?php echo $form->field($model, 'preview_text')->widget(
            TinyMceInput::className(),
            ['options_bag' => ['basic']]
        ); ?>

    </div>
</div>


<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

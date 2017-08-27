<?php
use app\models\category\CategoryVideo;
use kartik\select2\Select2;
use marvin255\yii2tinymce\TinyMceInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\lang\Lang;


$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
if (empty($back_link)) $back_link = ['/admin/video'];

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
    <div class="panel-heading">Категории</div>
    <div class="panel-body">
        <?php
        echo $form->field($model, 'categoryVideoIds')->label(false)->widget(Select2::className(), [
            'data' => ArrayHelper::map(CategoryVideo::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Выберите категорию ...',
                'multiple' => 'multiple'
            ],
        ]); ?>
    </div>
</div>



<?php //echo $form->field($model, 'rating')->dropDownList(ArrayHelper::map(CategoryVideo::find()->all(), 'id', 'name')); ?>


<div class="panel panel-default">
    <div class="panel-heading">Сео</div>
    <div class="panel-body">
        <?php echo $form->field($model, 'seo_title')->input('text'); ?>
        <?php echo $form->field($model, 'seo_keywords')->input('text'); ?>
        <?php echo $form->field($model, 'seo_description')->textarea(['rows' => 2]); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Контент</div>
    <div class="panel-body">

        <?php echo $form->field($model, 'preview_text')->input('text'); ?>

        <?php
        echo $form->field($model, 'detail_text')->widget(
            TinyMceInput::className(),
                ['options_bag' =>
                    ['basic']
                ]
        );
        ?>
    </div>
</div>


<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

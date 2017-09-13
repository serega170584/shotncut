<?php

use app\models\category\Category;
use app\models\tag\Tag;
use kartik\select2\Select2;
use marvin255\yii2tinymce\TinyMceInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

use app\models\lang\Lang;
use dosamigos\datepicker\DatePicker;


$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
if (empty($back_link)) $back_link = ['/admin/news'];

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

        <div class="form-group field-news-sort">
            <label class="control-label" for="news-text_1">Дата публикации</label>
            <?= DatePicker::widget([
                'model' => $model,
                'value' => '02-16-2012',
                'language' => 'ru',
                'attribute' => 'text_1',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>

        <?php echo $form->field($model, 'lang_id')->dropDownList($langs, ['prompt' => '-']); ?>
    </div>
</div>


<div class="panel panel-default">
    <input type="hidden" name="News[rating]" value="0" />
    <!--div class="panel-heading">Комания</1div>
    <div class="panel-body">
        <?php
        echo $form->field($model, 'rating')->label(false)->widget(Select2::className(), [
            'data' => $model->company,
            'options' => [
                'placeholder' => 'Выберите команию ...',
            ]
        ]);
        ?>
    </div-->
</div> 


<div class="panel panel-default">
    <input type="hidden" name="News[category_id]" value="1" />
    <!--div class="panel-heading">Категория</div>
    <div class="panel-body">
        <?php

        $model->category_id = $model->category ? $model->category->id : null;
        echo $form->field($model, 'category_id')->label(false)->widget(Select2::className(), [
            'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Выбирите категорию ...',
            ]
        ]); ?>
    </div-->
</div>

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
        <?php if ($model->previewPicture !== null): ?>
            <div class="form-group">
                <img class="img-responsive img-thumbnail" src="<?php echo $model->previewPicture->url; ?>">
            </div>
            <?php echo $form->field($model, 'previewPictureDelete')->checkbox(); ?>
        <?php endif; ?>
        <?php echo $form->field($model, 'previewPictureNew')->fileInput(); ?>
        <?php echo $form->field($model, 'preview_text')->widget(
            TinyMceInput::className(),
            ['options_bag' => ['text_only']]
        ); ?>

        <?php if ($model->detailPicture !== null): ?>
            <div class="form-group">
                <img class="img-responsive img-thumbnail" src="<?php echo $model->detailPicture->url; ?>">
            </div>
            <?php echo $form->field($model, 'detailPictureDelete')->checkbox(); ?>
        <?php endif; ?>
        <?php echo $form->field($model, 'detailPictureNew')->fileInput(); ?>
        <?php echo $form->field($model, 'detail_text')->widget(
            TinyMceInput::className(),
//                ['options_bag' => ['text_only']]
                ['options_bag' =>
                    ['basic']
                ]
        ); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Теги</div>
    <div class="panel-body">
        <?php

        $model->tagsList = $model->tags ? $model->tags : [];
        echo $form->field($model, 'tagsList')->label(false)->widget(Select2::className(), [
            'data' => ArrayHelper::map(Tag::find()->all(), 'id', 'name'),
            'options' => [
                'multiple' => true,
                'placeholder' => 'Выбирите значения ...',
            ],
            'pluginOptions' => [
                'tags' => true
            ]
        ]); ?>
    </div>
</div>

<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>

<?php ActiveForm::end(); ?>

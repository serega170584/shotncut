<?php

use app\models\category\Category;
use app\models\tag\Tag;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;
use marvin255\yii2tinymce\TinyMceInput;

use app\modules\admin\components\content_constructor\widgets\Input;
use app\models\lang\Lang;


$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
if (empty($back_link)) $back_link = ['/admin/articles'];

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
        <?php echo $form->field($model, 'lang_id')->dropDownList($langs, ['prompt' => '-']); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Категория</div>
    <div class="panel-body">
        <?php

        $model->category_id = $model->category ? $model->category->id : null;
        echo $form->field($model, 'category_id')->label(false)->widget(Select2::className(), [
            'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Выбирите категорию ...',
            ]
        ]); ?>
    </div>
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

<?php echo $form->field($model, 'article', ['template' => '{input}{hint}{error}'])->widget(
    Input::className()
); ?>

<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>



<?php ActiveForm::end(); ?>

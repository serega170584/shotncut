<?php

use app\models\category\Category;
use app\models\category\Category2;
use app\models\node\PolicyInfo;
use app\models\node\PolicyType;
use app\models\tag\Tag;
use app\modules\admin\components\content_constructor\ConstructorPolicy;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;
use marvin255\yii2tinymce\TinyMceInput;

use app\modules\admin\components\content_constructor\widgets\Input;
use app\models\lang\Lang;

$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
ksort($langs);
if (empty($back_link)) $back_link = ['/admin/simple-polices'];

$form = ActiveForm::begin([
    'method' => 'post',
    'enableClientScript' => false,
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
]);

echo $form->errorSummary([$model, $model->data]);
?>

 
<div class="panel panel-default">
    <div class="panel-heading">Базовые настройки</div>
    <div class="panel-body">
        <?php echo $form->field($model, 'status')->checkbox(); ?>
        <?php echo $form->field($model, 'title')->input('text'); ?>
        <?php // echo $form->field($model, 'link')->input('text'); ?>
        <?php // echo $form->field($model, 'link2')->input('text'); ?>
        <?php echo $form->field($model, 'alias')->input('text'); ?>
        <?php echo $form->field($model, 'sort')->input('text'); ?>
        <?php // echo $form->field($model, 'lang_id')->dropDownList($langs, ['prompt' => '-']); ?>
        <?php echo $form->field($model, 'lang_id')->dropDownList($langs); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Комания</div>
    <div class="panel-body">
        <?php
        echo $form->field($model, 'rating')->label(false)->widget(Select2::className(), [
            'data' => $model->company,
            'options' => [
                'placeholder' => 'Выберите команию ...',
            ]
        ]);
        ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Разделы витрины</div>
    <div class="panel-body">
        <?php

        //$model->category_id = $model->category ? $model->category->id : null;
        echo $form->field($model, 'category_ids')->label(false)->widget(Select2::className(), [
            'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Выбирите категорию ...',
                'multiple' => 'multiple'
            ],
        ]); ?>
    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">Способ оформления / Партнер</div>
    <div class="panel-body">
        <?php
        $model->category2_id = $model->category2 ? $model->category2->id : null;
        echo $form->field($model, 'category2_id')->label(false)->widget(Select2::className(), [
            'data' => ArrayHelper::map(Category2::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Выбирите категорию ...',
            ]
        ]); ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">Информация в плитке</div>
    <div class="panel-body">
        <?php if ($model->previewPicture !== null): ?>
            <div class="form-group">
                <img class="img-responsive img-thumbnail" src="<?php echo $model->previewPicture->url; ?>">
            </div>
            <?php echo $form->field($model, 'previewPictureDelete')->checkbox(); ?>
        <?php endif; ?>
        <?php echo $form->field($model, 'previewPictureNew')->fileInput(); ?>
        <?php echo $form->field($model, 'short_text')->textarea(); ?>
        <?php echo $form->field($model, 'price_from')->input('numeric'); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><a href="#collapsSeo" data-toggle="collapse">Сео</a></div>
    <div class="panel-collapse collapse" id="collapsSeo">
        <div class="panel-body">
            <?php echo $form->field($model, 'seo_title')->input('text'); ?>
            <?php echo $form->field($model, 'seo_keywords')->input('text'); ?>
            <?php echo $form->field($model, 'seo_description')->textarea(['rows' => 2]); ?>
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">Контент</div>
    <div class="panel-body">
        <?php if ($model->mainImage !== null): ?>
            <div class="form-group">
                <img class="img-responsive img-thumbnail" src="<?php echo $model->mainImage->url; ?>">
            </div>
            <?php echo $form->field($model, 'mainImageDelete')->checkbox(); ?>
        <?php endif; ?>
        <?php echo $form->field($model, 'mainImageNew')->fileInput(); ?>
        <?php
        echo $form->field($model, 'preview_text')->widget(
            TinyMceInput::className(),
                ['options_bag' =>
                    ['basic']
                ]
            );

        ?>
    </div>
</div>


<?php $model->changeConstructor(); ?>
<?php echo $form->field($model, 'article', ['template' => '{input}{hint}{error}'])->widget(
    Input::className(),[
        'constructor' => $model->getConstructor()
    ]
); ?>

<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
</div>



<?php ActiveForm::end(); ?>

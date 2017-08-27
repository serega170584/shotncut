<?php
use marvin255\yii2tinymce\TinyMceInput;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

use app\models\lang\Lang;

$comp_cr = Yii::$app->request->get('company', 0);

$langs = ArrayHelper::map(Lang::find()->all(), 'id', 'name');
if (empty($back_link)) $back_link = ['/admin/about?company='.$comp_cr];

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
            <?php echo $form->field($model, 'sort')->input('text'); ?>
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

            <?php //echo $form->field($model, 'text_3')->label('Телефон в заголовке')->input('text'); ?>
            <?php //echo $form->field($model, 'text_4')->label('Телефон 2')->input('text'); ?>
            <?php //echo $form->field($model, 'text_5')->label('Телефон 3')->input('text'); ?>


            <?php echo $form->field($model, 'preview_text')->label('Колонка 1')->widget(
                TinyMceInput::className(),
                ['options_bag' => ['text_only']]
            ); ?>


            <?php
            /*
                    echo $form->field($model, 'detail_text')->widget(
                        TinyMceInput::className(),
            //                ['options_bag' => ['text_only']]
                            ['options_bag' =>
                                ['basic']
                            ]
                    );
            */


            echo $form->field($model, 'text_1')->label('Колонка 2')->widget(
                TinyMceInput::className(),
                ['options_bag' =>
                    ['basic']
                ]
            );


            /*echo $form->field($model, 'text_2')->label('Документы')->widget(
                TinyMceInput::className(),
                ['options_bag' =>
                    ['basic']
                ]
            );*/
            ?>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Карта</div>
        <div class="panel-body">
            <?php echo $form->field($model, 'text_6')->label('<a title="Опредилить координаты" target="_blank" href="http://webmap-blog.ru/tools/getlonglat-ymap2.html">Координаты</a> = x,y')->input('text'); ?>
            <?php echo $form->field($model, 'text_7')->label('Zoom = 16')->input('text'); ?>
            <?php echo $form->field($model, 'text_8')->label('Метка = адрес')->input('text'); ?>
        </div>
    </div>



    <div class="form-group">
        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
        <?php echo Html::a('Отменить', $back_link, ['class' => 'btn btn-warning']) ?>
    </div>

<?php ActiveForm::end(); ?>
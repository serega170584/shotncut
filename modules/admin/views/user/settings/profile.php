<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\models\tag\Tag;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'public_email') ?>

                <?= $form->field($model, 'website') ?>

                <?= $form->field($model, 'location') ?>

                <?= $form->field($model, 'bio')->textarea() ?>

                <?= $form->field($model, 'status') ?>

                <?= $form->field($model, 'birth_date')->widget(\yii\jui\DatePicker::className(), [
                    'dateFormat' => 'php:d.m.Y',
                    'options' => [
                        'class' => 'form-control'
                    ],
                    'clientOptions' => [
                        'changeYear' => true,
                        'changeMonth' => true
                    ]
                ]) ?>

                <?php if ($model->avatarImage !== null): ?>
                    <div class="form-group">
                        <img class="img-responsive img-thumbnail" src="<?php echo $model->avatarImage->url; ?>">
                    </div>
                    <?php echo $form->field($model, 'avatarImageDelete')->checkbox(); ?>
                <?php endif; ?>
                <?php echo $form->field($model, 'avatarImageNew')->fileInput(); ?>

                <?php if ($model->coverImage !== null): ?>
                    <div class="form-group">
                        <img class="img-responsive img-thumbnail" src="<?php echo $model->coverImage->url; ?>">
                    </div>
                    <?php echo $form->field($model, 'coverImageDelete')->checkbox(); ?>
                <?php endif; ?>
                <?php echo $form->field($model, 'coverImageNew')->fileInput(); ?>

                <?php

                $model->tagsList = $model->tags ? $model->tags : [];
                echo $form->field($model, 'tagsList')->widget(Select2::className(), [
                    'data' => ArrayHelper::map(Tag::find()->all(), 'id', 'name'),
                    'options' => [
                        'multiple' => true,
                        'placeholder' => 'Выбирите значения ...',
                    ],
                    'pluginOptions' => [
                        'tags' => true
                    ]
                ]); ?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

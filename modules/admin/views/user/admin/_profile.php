<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\models\category\Category;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @var yii\web\View 					$this
 * @var dektrium\user\models\User 		$user
 * @var dektrium\user\models\Profile 	$profile
 */

?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>
<?= $form->errorSummary($profile) ?>
<?= $form->field($profile, 'name') ?>
<?= $form->field($profile, 'public_email') ?>
<?= $form->field($profile, 'website') ?>
<?= $form->field($profile, 'location') ?>
<?= $form->field($profile, 'gravatar_email') ?>
<?= $form->field($profile, 'bio')->textarea() ?>

<?= $form->field($profile, 'birth_date')->widget(\yii\jui\DatePicker::className(), [
    'dateFormat' => 'php:d.m.Y',
    'options' => [
        'class' => 'form-control'
    ],
    'clientOptions' => [
        'changeYear' => true,
        'changeMonth' => true
    ]
]) ?>

<div class="panel panel-default">
    <div class="panel-heading">Категории</div>
    <div class="panel-body">
        <?php

        $profile->category_id = $profile->category ? $profile->category->id : null;
        echo $form->field($profile, 'category_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Выбирите главную категорию ...',
            ]
        ]); ?>

        <?php
        $profile->category_list = $profile->categories ? $profile->categories : [];
        echo $form->field($profile, 'category_list')->widget(Select2::className(), [
            'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
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
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>

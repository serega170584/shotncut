<?php
/** @var \app\models\node\News $model */
?>
<section class="b-text__section">
    <h1><?= \yii\helpers\Html::encode($model->title) ?></h1>

    <div class="b-text__wrapper">
        <?= \app\components\SbrHtmlPurifier::process($model->detail_text) ?>
    </div>

</section>

<section class="b-social-section">
    <div class="b-wrapper">
        <span class="b-social-section__label">Поделиться –</span>
        <ul class="u-clear-fix b-social__list">
            <li class="b-social__item">
                <a href="#" class="b-social b-social_fb"></a>
            </li>
            <li class="b-social__item">
                <a href="#" class="b-social b-social_tw"></a>
            </li>
            <li class="b-social__item">
                <a href="#" class="b-social b-social_vk"></a>
            </li>
        </ul>
    </div>
</section>
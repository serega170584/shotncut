<?php
/** @var \app\models\node\Video $model */
/** @var \app\models\category\CategoryVideo[] $video_categories */
?>
<section class="b-text__section">
    <h1><?=\yii\helpers\Html::encode($model->title) ?></h1>
    <ul class="u-clear-fix b-tags">
        <?php
        foreach ($video_categories as $key => $item) {
?>
        <li>
            <a href="#category_<?= $key ?>"><?= \yii\helpers\Html::encode($item) ?></a>
        </li>
        <?php
        }
        ?>
    </ul>

    <div class="b-text__wrapper">
        <?= $model->detail_text ?>
    </div>

    <form action="" class="js-voting-from b-voting__box">
        <h3>Какую платежную систему вы используете?</h3>
        <ul class="b-voting__list">
            <li data-voting-id="voting_0" class="b-voting__item">
                <input type="radio" name="voting_0" id="voting_0" class="js-voting-input">
                <label for="voting_0">
                    Мир
                    <b class="js-voting-result"></b>
                    <div class="js-voting-progress b-voting__progress"></div>
                </label>
            </li>
            <li data-voting-id="voting_1" class="b-voting__item">
                <input type="radio" name="voting_1" id="voting_1" class="js-voting-input">
                <label for="voting_1">
                    Mastercard
                    <b class="js-voting-result"></b>
                    <div class="js-voting-progress b-voting__progress"></div>
                </label>
            </li>
            <li data-voting-id="voting_2" class="b-voting__item">
                <input type="radio" name="voting_2" id="voting_2" class="js-voting-input">
                <label for="voting_2">
                    VISA
                    <b class="js-voting-result"></b>
                    <div class="js-voting-progress b-voting__progress"></div>
                </label>
            </li>
        </ul>
        <div class="js-voting-text b-voting__text">
            Проголосуйте чтобы узнать результат
        </div>
        <div class="js-voting-error b-voting__error hidden">
            Возникла ошибка.<br>Повторите попытку позже.
        </div>
    </form>

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
<?php
/**
 * @var \app\models\node\Policy $owner
 */
?>
<script src="js/pages/first-capital.js"></script>
<script src="js/pages/order.js"></script>

<div class="js-top-result-fix b-bg b-bg__top">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(i/__tmp/bg-travel.jpg)"></div>
    </div>

    <section class="js-section-calc b-first-section b-first-section__first-capital">
        <div class="b-wrapper">
            <div class="b-product__wrapper">
                <div class="b-main-title">
                    <h2><?=\yii\helpers\Html::encode($owner->title)?></h2>
                    <?= \app\components\SbrHtmlPurifier::process($owner->preview_text) ?>
                </div>

            </div>

            <div class="js-calc-result-blocks js-calc-top-result b-calc__result b-calc__result_link">
                <a href="#" class="js-buy-polis-popup-link b-calc__result_link-mian">Хочу купить полис</a>
            </div>
        </div>
    </section>

    <section id="how_to_buy" class="js-nav-block js-nav-block-for-fix b-bg b-travel-how-buy">

        <div class="js-nav-bar-wrapper b-nav-page__wrapper">
            <div class="js-nav-bar b-nav-page">
                <div class="b-wrapper">
                    <ul class="js-nav-ul u-clear-fix b-nav-page__list">
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#how_to_buy" class="js-nav-link b-nav-page__link">Как купить</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#how_it_works" class="js-nav-link b-nav-page__link">Как все устроено</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#privilege" class="js-nav-link b-nav-page__link">Привилегии</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#action" class="js-nav-link b-nav-page__link">Действия с полисом</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#questions" class="js-nav-link b-nav-page__link">Вопросы</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#documents" class="js-nav-link b-nav-page__link">Документы</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#insurance_case" class="js-nav-link b-nav-page__link">Страховой случай</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="js-nav-block-for-fix-mobile b-wrapper">
            <div data-step="" class="js-how-buy-carousel u-clear-fix b-travel-how-buy__column_box">
                <div class="js-how-buy-box b-travel-how-buy__column">
                    <div class="b-travel-how-buy__column_pic b-travel-how-buy__column_pic-4"></div>
                    <div class="b-travel-how-buy__column_text">
                        В отделении «Сбербанк Премьер»
                    </div>
                </div>
                <div class="js-how-buy-box b-travel-how-buy__column">
                    <div class="b-travel-how-buy__column_pic b-travel-how-buy__column_pic-5"></div>
                    <div class="b-travel-how-buy__column_text">
                        По телефону
                        8&nbsp;800&nbsp;555-55-59
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<div class="js-calc-result-blocks js-calc-fix-mobile-result b-calc__result b-calc__result_link b-calc__result_mobile">
    <a href="#" class="js-buy-polis-popup-link b-calc__result_link-mian">Хочу купить полис</a>
</div>

<?= $this->render('//policy/order-policy') ?>

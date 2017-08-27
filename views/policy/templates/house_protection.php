<?php
/**
 * @var \app\models\node\Policy $owner
 */
?>

<script src="js/pages/house-protection.js"></script>
<script src="js/pages/promo-code.js"></script>

<div class="js-top-result-fix b-bg b-bg__top">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(i/__tmp/bg-travel.jpg)"></div>
    </div>

    <section class="js-section-calc b-first-section b-first-section__family-protection">
        <div class="b-wrapper">
            <div class="b-product__wrapper">
                <div class="b-main-title">
                    <h2><?=\yii\helpers\Html::encode($owner->title)?></h2>
                    <?= \app\components\SbrHtmlPurifier::process($owner->preview_text) ?>
                </div>

                <form action="" class="js-calc b-calc b-calc__family-protection">

                    <div class="js-calc-section u-clear-fix b-calc__section">
                        <div class="u-clear-fix b-calc__section_column">
                            <label class="b-calc__label">Объект страхования</label>
                            <div class="js-who-dropdown b-dropdown__box b-dropdown__box_who">
                                <div class="b-dropdown b-dropdown_open first-open">
                                    <div class="b-dropdown__arrow"></div>
                                    <span class="b-dropdown__text js-link-stop"></span>
                                    <ul class="b-dropdown__sub">
                                        <li data-email="" class="b-dropdown__item">Квартира</li>
                                        <li data-email="" class="b-dropdown__item">Дом</li>
                                    </ul>
                                </div>
                                <input class="hidden js-input-for-select b-input" id="houseprotectionForm_who" name="houseprotectionForm[who]" type="text">
                            </div>
                        </div>
                        <div class="u-clear-fix b-calc__section_column">
                            <label class="b-calc__label">со страховой защитой</label>
                            <div class="js-price-dropdown b-dropdown__box b-dropdown__box_price">
                                <div class="b-dropdown b-dropdown_open first-open">
                                    <div class="b-dropdown__arrow"></div>
                                    <span class="b-dropdown__text js-link-stop"></span>
                                    <ul class="b-dropdown__sub">
                                        <li data-email="" class="b-dropdown__item">450 000 <span class="b-rub">a</span></li>
                                        <li data-email="" class="b-dropdown__item">600 000 <span class="b-rub">a</span></li>
                                        <li data-email="" class="b-dropdown__item">1 400 000 <span class="b-rub">a</span></li>
                                        <li data-email="" class="b-dropdown__item">2 000 000 <span class="b-rub">a</span></li>
                                    </ul>
                                </div>
                                <input class="hidden js-price-input js-input-for-select b-input" id="houseprotectionForm_price" name="houseprotectionForm[price]" type="text">
                            </div>
                        </div>
                    </div>

                </form>

            </div>

            <div class="js-calc-result-blocks js-calc-top-result b-calc__result b-calc__result_alone">
                <div class="b-calc__result_pic" ></div>
                <a href=".js-section-calc" class="js-scroll-to-block b-calc__result_scroll">
                    Пересчитать
                </a>
                <div class="u-clear-fix b-calc__result_wrapper">
                    <span class="js-calc-result-top-text b-text__bigger">Полис за 7 минут</span>
                    <div class=" b-calc__result_sum">
                        <span class="b-calc__result_sum-small">от </span><span class="js-calc-result-sum">75</span><span class="b-rub">c</span>
                    </div>
                    <div class="b-calc__result_text">
                        Укажите информацию, чтобы купить полис
                    </div>
                    <div class="js-call-promo-popup b-call-promo__link">
                        <a href="#">У меня есть промокод</a>
                    </div>
                    <div class="b-button__box">
                        <a href="#" class="js-buy-polis b-button b-button_white">Купить полис</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how_to_buy" class="js-nav-block js-nav-block-for-fix b-bg b-travel-how-buy">

        <div class="js-nav-bar-wrapper b-nav-page__wrapper">
            <div class="js-nav-bar b-nav-page">
                <div class="b-wrapper">
                    <ul class="js-nav-ul u-clear-fix b-nav-page__list">
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#how_to_buy" class="js-nav-link b-nav-page__link">Как купить полис</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#for_what" class="js-nav-link b-nav-page__link">Для чего нужен полис</a>
                        </li>
                        <li class="js-nav-item b-nav-page__item">
                            <a href="#how_it_works" class="js-nav-link b-nav-page__link">Как все устроено</a>
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
                    <div class="b-travel-how-buy__column_pic b-travel-how-buy__column_pic-1"></div>
                    <div class="b-travel-how-buy__column_text">
                        Рассчитайте стоимость
                    </div>
                </div>
                <div class="js-how-buy-box b-travel-how-buy__column">
                    <div class="b-travel-how-buy__column_pic b-travel-how-buy__column_pic-2"></div>
                    <div class="b-travel-how-buy__column_text">
                        Заполните данные и оплатите картой
                    </div>
                </div>
                <div class="js-how-buy-box b-travel-how-buy__column">
                    <div class="b-travel-how-buy__column_pic b-travel-how-buy__column_pic-3"></div>
                    <div class="b-travel-how-buy__column_text">
                        Получите полис на&nbsp;email
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<div class="js-calc-result-blocks js-calc-fix-mobile-result b-calc__result b-calc__result_mobile">
    <div class="u-clear-fix b-calc__result_wrapper">
        <span class="js-calc-result-top-text b-text__bigger">Полис за 7 минут</span>
        <div class=" b-calc__result_sum">
            <span class="b-calc__result_sum-small">от </span><span class="js-calc-result-sum">75</span><span class="b-rub">c</span>
        </div>
        <div class="b-button__box">
            <a href="#" class="js-buy-polis b-button b-button_white">Купить полис</a>
        </div>
    </div>
</div>

<?= $this->render('//policy/promo-code') ?>

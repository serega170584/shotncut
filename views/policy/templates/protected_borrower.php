<?php
/**
 * @var \app\models\node\Policy $owner
 */
?>
<script src="js/pages/protected-borrower.js"></script>
<script src="js/pages/promo-code.js"></script>


<div class="js-top-result-fix b-bg b-bg__top">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(i/__tmp/bg-travel.jpg)"></div>
    </div>

    <section class="js-section-calc b-first-section b-first-section__protected-borrower">
        <div class="b-wrapper">
            <div class="b-product__wrapper">
                <div class="b-main-title">
                    <h2><?=\yii\helpers\Html::encode($owner->title)?></h2>
                    <?= \app\components\SbrHtmlPurifier::process($owner->preview_text) ?>
                </div>

                <form action="" class="js-calc b-calc b-calc__protected-borrower">

                    <div class="js-calc-section u-clear-fix b-calc__section">
                        <div class="u-clear-fix b-calc__section_column">
                            <label for="protectedBorrowerForm_price" class="b-calc__label">Остаток кредитной задолженности</label>
                            <div class="b-calc__section_column">
                                <input type="text" class="js-max-price b-input" id="protectedBorrowerForm_price" name="protectedBorrowerForm[price]">
                                <span class="b-input_faq">не более 1 500 000 <span class="b-rub">a</span></span>
                            </div>
                            <label for="protectedBorrowerForm_price" class="b-calc__label"><span class="b-rub">a</span></label>
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
                            <a href="#documents" class="js-nav-link b-nav-page__link">Документы</a>
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

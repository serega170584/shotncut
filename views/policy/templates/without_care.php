<?php
/**
 * @var \app\models\node\Policy $owner
 */
?>

<script src="js/pages/order.js"></script>
<script src="js/pages/without-care.js"></script>

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

                <div class="b-main-title__icon-box">
                    <p>
                        Защитите все одним полисом:
                    </p>
                    <ul class="u-clear-fix b-main-title__i-list">
                        <li>
                            <div class="b-main-title__i-list_pic">
                                <img src="i/new/pages/products/i-title-1.svg" alt="">
                            </div>
                            <div class="b-main-title__i-list_text">
                                <span>Квартиру или дом</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-main-title__i-list_pic">
                                <img src="i/new/pages/products/i-title-2.svg" alt="">
                            </div>
                            <div class="b-main-title__i-list_text">
                                <span>Мебель, технику, одежду и посуду</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-main-title__i-list_pic">
                                <img src="i/new/pages/products/i-title-3.svg" alt="">
                            </div>
                            <div class="b-main-title__i-list_text">
                                <span>Ответственность перед соседями</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-main-title__i-list_pic">
                                <img src="i/new/pages/products/i-title-4.svg" alt="">
                            </div>
                            <div class="b-main-title__i-list_text">
                                <span>Документы и мобильные устройства</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-main-title__i-list_pic">
                                <img src="i/new/pages/products/i-title-5.svg" alt="">
                            </div>
                            <div class="b-main-title__i-list_text">
                                <span>Деньги на банковских картах</span>
                            </div>
                        </li>
                        <li>
                            <div class="b-main-title__i-list_pic">
                                <img src="i/new/pages/products/i-title-6.svg" alt="">
                            </div>
                            <div class="b-main-title__i-list_text">
                                <span>Лечение в путешествиях</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="js-calc-result-blocks js-calc-top-result b-calc__result b-calc__result_link">
                <a href="#" class="b-calc__result_link-activate"><span>Активировать полис</span></a>
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

<div class="js-calc-result-blocks js-calc-fix-mobile-result b-calc__result b-calc__result_link b-calc__result_mobile">
    <a href="#" class="b-calc__result_link-activate"><span>Активировать полис</span></a>
    <a href="#" class="js-buy-polis-popup-link b-calc__result_link-mian">Хочу купить полис</a>
</div>

<?= $this->render('//policy/order-policy') ?>
<?php
/**
 * @var \app\models\node\Policy $owner
 */
?>
<link rel="stylesheet" href="css/jquery-ui.min.css" media="all">

<script src="js/libs/jquery-ui.js"></script>
<script src="js/pages/multipolis.js"></script>
<script src="js/pages/promo-code.js"></script>


<div class="js-top-result-fix b-bg b-bg__top">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(i/__tmp/bg-travel.jpg)"></div>
    </div>

    <section class="js-section-calc b-first-section b-first-section__multipolis">
        <div class="b-wrapper">
            <div class="b-product__wrapper">
                <div class="b-main-title">
                    <h2><?=\yii\helpers\Html::encode($owner->title)?></h2>
                    <?= \app\components\SbrHtmlPurifier::process($owner->preview_text) ?>
                </div>

                <form action="" class="js-calc b-calc b-calc__multipolis">

                    <div class="js-calc-section u-clear-fix b-calc__section">

                        <div class="u-clear-fix b-calc__section_box">

                            <ul class="u-clear-fix b-multipolis__section_title">
                                <li>Объект страхования</li>
                                <li>Страховая защита</li>
                                <li>Цена</li>
                            </ul>
                            <ul class="b-multipolis__section">

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>защита отделки помещений различными материалами от гипсокартона до лепнины, дверей и окон. а также страхование систем отопления, вентиляции, водопровода, и иного инженерного оборудования</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Отделку квартиры или дома</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_0" class="js-multipolis-price">700</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div class="js-multipolis-slider b-multipolis__slider"></div>
                                        <input class="js-multipolis-slider-input hidden" type="text" id="multipolisForm_opt-1" name="multipolisForm[opt-1]">
                                        <ul class="u-clear-fix b-multipolis__slider_values">
                                            <li class="js-multipolis-slider-vals" data-title="«Минимальный»" data-text-index="0,1,2">
                                                150 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Оптимальный»" data-text-index="0,1,2,3,4,5,6">
                                                300 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Максимальный»" data-text-index="0,1,2,3,4,5,6">
                                                600 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">«Минимальный»</h4>
                                            <ul>
                                                <li class="js-protect-text">Пожар</li>
                                                <li class="js-protect-text">Взрыв</li>
                                                <li class="js-protect-text">Залив</li>
                                                <li class="js-protect-text">Незаконные действия третьих лиц</li>
                                                <li class="js-protect-text">Стихийные бедствия</li>
                                                <li class="js-protect-text">Механическое повреждение</li>
                                                <li class="js-protect-text">Падение летательных аппаратов</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>забота о различных предметах интерьера, мебели, различных видах техники, бытовых приборов, аудио-, видео- и иных системах.</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Имущество в квартире или доме</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_1" class="js-multipolis-price">450</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div class="js-multipolis-slider b-multipolis__slider"></div>
                                        <input class="js-multipolis-slider-input hidden" type="text" id="multipolisForm_opt-2" name="multipolisForm[opt-2]">
                                        <ul class="u-clear-fix b-multipolis__slider_values">
                                            <li class="js-multipolis-slider-vals" data-title="«Минимальный»" data-text-index="0,1,2">
                                                100 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Оптимальный»" data-text-index="0,1,2,3,4,5,6">
                                                200 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Максимальный»" data-text-index="0,1,2,3,4,5,6">
                                                400 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">«Минимальный»</h4>
                                            <ul>
                                                <li class="js-protect-text">Пожар</li>
                                                <li class="js-protect-text">Взрыв</li>
                                                <li class="js-protect-text">Залив</li>
                                                <li class="js-protect-text">Незаконные действия третьих лиц</li>
                                                <li class="js-protect-text">Стихийные бедствия</li>
                                                <li class="js-protect-text">Механическое повреждение</li>
                                                <li class="js-protect-text">Падение летательных аппаратов</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>Сохранение хороших отношений с соседями в случае залива или причинения вреда по вашей неосторожности.</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Гражданская ответственность</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_2" class="js-multipolis-price">800</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div class="js-multipolis-slider b-multipolis__slider"></div>
                                        <input class="js-multipolis-slider-input hidden" type="text" id="multipolisForm_opt-3" name="multipolisForm[opt-3]">
                                        <ul class="u-clear-fix b-multipolis__slider_values">
                                            <li class="js-multipolis-slider-vals" data-title="«Минимальный»" data-text-index="0,1">
                                                100 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Оптимальный»" data-text-index="0,1,2">
                                                200 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Максимальный»" data-text-index="0,1,2">
                                                400 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">«Минимальный»</h4>
                                            <ul>
                                                <li class="js-protect-text">Ущерб имуществу</li>
                                                <li class="js-protect-text">Судебные расходы</li>
                                                <li class="js-protect-text">Вред жизни и здоровью</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>Возможность компенсировать потерю паспорта и водительского удостоверения, также телефона и ноутбука.</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Личные вещи</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_3" class="js-multipolis-price">800</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div class="js-multipolis-slider b-multipolis__slider"></div>
                                        <input class="js-multipolis-slider-input hidden" type="text" id="multipolisForm_opt-4" name="multipolisForm[opt-4]">
                                        <ul class="u-clear-fix b-multipolis__slider_values">
                                            <li class="js-multipolis-slider-vals" data-title="«Минимальный»" data-text-index="0">
                                                20 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Оптимальный»" data-text-index="1">
                                                40 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Максимальный»" data-text-index="1">
                                                80 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">«Минимальный»</h4>
                                            <ul>
                                                <li class="js-protect-text">Один страховой случай</li>
                                                <li class="js-protect-text">Без ограничения страховых случаев</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>Уверенность в защите денежных средств на банковской карте от незаконных списаний и противоправных действий.</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Банковские карты</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_4" class="js-multipolis-price">800</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div class="js-multipolis-slider b-multipolis__slider"></div>
                                        <input class="js-multipolis-slider-input hidden" type="text" id="multipolisForm_opt-5" name="multipolisForm[opt-5]">
                                        <ul class="u-clear-fix b-multipolis__slider_values">
                                            <li class="js-multipolis-slider-vals" data-title="«Минимальный»" data-text-index="0,2">
                                                20 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Оптимальный»" data-text-index="1,2,3">
                                                40 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Максимальный»" data-text-index="1,2,3,4">
                                                80 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">«Минимальный»</h4>
                                            <ul>
                                                <li class="js-protect-text">Один страховой случай</li>
                                                <li class="js-protect-text">Без ограничения страховых случаев</li>
                                                <li class="js-protect-text">Незаконное списание средств с карты</li>
                                                <li class="js-protect-text">Утрата карты</li>
                                                <li class="js-protect-text">Ограбление у банкомата</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>Поддержка при возникновении проблем со здоровьем, непредвиденных транспортных расходов и при необходимости получения юридической помощи или защите ответственности за рубежом.</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Путешествия по России</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_5" class="js-multipolis-price">300</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div data-title="365 дней по России" data-text-index="0,1" class="js-multipolis-slider-vals b-multipolis__slider_values b-multipolis__slider_single">
                                            <div>
                                                250 000<span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">365 дней по России</h4>
                                            <ul>
                                                <li class="js-protect-text active">Медицинские транспортные расходы</li>
                                                <li class="js-protect-text active">Репатриация в случае ухода из жизни</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="js-multipolis-item u-clear-fix b-multipolis__section_item">

                                    <div class="b-multipolis__label">
                                        <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                        <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                            <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                            <div class="b-checkbox__faq-box_text">
                                                <p>Помощи при внезапном заболевании или несчастном случае, включая оплату транспортных и сопроводительных расходов по лечению.</p>
                                            </div>
                                        </div>
                                        <label class="b-calc__label">
                                            <span>Здоровье</span>
                                        </label>
                                    </div>

                                    <div class="b-multipolis__price_box">
                                        <div class="b-multipolis__price">
                                            <div>
                                                <span data-id="multipolis_6" class="js-multipolis-price">800</span>
                                                <span class="b-rub">a</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="js-multipolis-slider-box b-multipolis__slider_box">
                                        <div class="js-multipolis-slider b-multipolis__slider"></div>
                                        <input class="js-multipolis-slider-input hidden" type="text" id="multipolisForm_opt-7" name="multipolisForm[opt-7]">
                                        <ul class="u-clear-fix b-multipolis__slider_values">
                                            <li class="js-multipolis-slider-vals" data-title="«Минимальный»" data-text-index="0">
                                                100 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Оптимальный»" data-text-index="0,1,2">
                                                300 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                            <li class="js-multipolis-slider-vals" data-title="«Максимальный»" data-text-index="0,1,2,3">
                                                500 000 <span class="b-rub">a</span>
                                                <a href="#" class="js-multipolis-slider-vals-faq"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-multipolis-text u-clear-fix b-multipolis__down-calc_text">
                                        <a href="#" class="js-multipolis-text-close b-multipolis__down-calc_text_close"></a>
                                        <div class="b-multipolis__down-calc_text-wrapper">
                                            <h4 class="js-protect-title">«Минимальный»</h4>
                                            <ul>
                                                <li class="js-protect-text">Травмы</li>
                                                <li class="js-protect-text">Госпитализация</li>
                                                <li class="js-protect-text">Инвалидность</li>
                                                <li class="js-protect-text">Уход из жизни</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </form>

                <div class="js-checkbox-faq-popup b-checkbox__faq"></div>

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

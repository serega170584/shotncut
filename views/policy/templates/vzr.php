<?php
/**
 * @var \app\models\node\Policy $owner
 */
?>
<script src="js/pages/travel.js"></script>
<script src="js/pages/promo-code.js"></script>

    <section class="js-min-full-page js-section-calc js-top-result-fix b-first-section b-first-section__vzr">
        <div class="b-wrapper">
            <div class="b-product__wrapper">
                <div class="b-main-title">
                    <h2><?=\yii\helpers\Html::encode($owner->title)?></h2>
                    <?= \app\components\SbrHtmlPurifier::process($owner->preview_text) ?>
                </div>

                <form action="<?=\yii\helpers\Url::toRoute('policy/calcvzr')?>" class="js-calc b-calc b-calc__travel">

                    <div class="js-calc-section u-clear-fix b-calc__section">
                        <label class="b-calc__label b-calc__label_short">Я хочу купить</label>

                        <div class="js-theme-dropdown b-dropdown__box b-dropdown__box_travel-theme">
                            <div class="b-dropdown b-dropdown_open first-open">
                                <div class="b-dropdown__arrow"></div>
                                <span class="b-dropdown__text js-link-stop"></span>
                                <ul class="b-dropdown__sub">
                                    <li data-email="range" data-value="0" class="b-dropdown__item">полис на одну поездку</li>
                                    <li data-email="single" data-value="1" class="b-dropdown__item">многоразовый полис</li>
                                </ul>
                            </div>
                            <input class="hidden js-change-calc-status js-input-for-select b-input" id="travelForm_theme" name="annualPolicy" type="text">
                        </div>

                        <div class="b-calendar__box">
                            <div class="u-clear-fix js-insert-calendar-text b-calendar__text open">
                                <span class="js-calendar-text-from b-calendar__text_1 active">c даты</span>
                                <span class="js-calendar-text-to b-calendar__text_2">по дату</span>
                                <span class="js-calendar-text-alone b-calendar__text_alone hidden">на 90 дней в году с <span>даты</span></span>
                            </div>
                            <div class="js-date-picker b-date-picker"></div>
                            <input hidden id="travelForm_dates-1" name="dates1" type="text" class="hidden js-change-calc-status js-dates-input js-dates-input-1 b-input">
                            <input hidden id="travelForm_dates-2" name="dates2" type="text" class="hidden js-dates-input js-dates-input-2 b-input">
                        </div>

                        <div class="js-calendar-faq b-calendar__box_faq">
                            Расскажите о поездке, узнайте стоимость страховки и получите полис уже через 7 минут
                        </div>
                    </div>

                    <div class="js-calc-section u-clear-fix b-calc__section hidden">
                        <label class="b-calc__label b-calc__label_short">для поездок</label>
                        <div class="b-dropdown__box b-dropdown__box_travel-where">
                            <div class="js-dropdown-city b-dropdown b-dropdown_open first-open">
                                <div class="b-dropdown__arrow"></div>
                                <span class="b-dropdown__text js-link-stop"></span>
                                <ul class="b-dropdown__sub">
                                    <li data-email="russia" data-value="2" class="b-dropdown__item">по России</li>
                                    <li data-email="world" data-value="0" class="b-dropdown__item">по всему миру, включая Шенген (кроме США и РФ)</li>
                                    <li data-email="usa" data-value="1" class="b-dropdown__item">в США</li>
                                </ul>
                            </div>
                            <input class="hidden js-select-next-show-input js-change-calc-status js-input-for-select b-input" id="travelForm_where" name="insuranceTerritory" type="text">
                        </div>
                    </div>

                    <div class="js-calc-section u-clear-fix b-calc__section hidden">
                        <label class="b-calc__label">со страховой защитой</label>
                        <div class="js-dropdown-prices-box b-dropdown__box b-dropdown__box_travel-money">
                            <div data-dropdown="russia" class="hidden b-dropdown">
                                <div class="b-dropdown__arrow"></div>
                                <span class="b-dropdown__text js-link-stop"></span>
                                <ul class="b-dropdown__sub">
                                    <li data-value="3" class="b-dropdown__item">
                                        15 000 $
                                        <div class="b-calc__section_money-faq">
                                            Этой суммы хватит для оплаты большинства видов медицинской помощи
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div data-dropdown="world" class="hidden b-dropdown">
                                <div class="b-dropdown__arrow"></div>
                                <span class="b-dropdown__text js-link-stop"></span>
                                <ul class="b-dropdown__sub">
                                    <li data-value="0" class="b-dropdown__item">
                                        30 000 €
                                        <div class="b-calc__section_money-faq">
                                            Необходимый минимум для оплаты медицинской помощи за границей
                                        </div>
                                    </li>
                                    <li data-value="1" class="b-dropdown__item">
                                        60 000 €
                                        <div class="b-calc__section_money-faq">
                                            Этой суммы хватит для оплаты большинства видов медицинской помощи
                                        </div>
                                    </li>
                                    <li data-value="2" class="b-dropdown__item">
                                        120 000 €
                                        <div class="b-calc__section_money-faq">
                                            Будьте уверены, что суммы страхового покрытия хватит для оплаты даже самого дорогостоящего лечения
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div data-dropdown="usa" class="hidden b-dropdown">
                                <div class="b-dropdown__arrow"></div>
                                <span class="b-dropdown__text js-link-stop"></span>
                                <ul class="b-dropdown__sub">
                                    <li data-value="1" class="b-dropdown__item">
                                        60 000 $
                                        <div class="b-calc__section_money-faq">
                                            Этой суммы хватит для оплаты большинства видов медицинской помощи
                                        </div>
                                    </li>
                                    <li data-value="2" class="b-dropdown__item">
                                        120 000 $
                                        <div class="b-calc__section_money-faq">
                                            Будьте уверены, что суммы страхового покрытия хватит для оплаты даже самого дорогостоящего лечения
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <input class="js-select-next-show-input hidden js-input-for-select b-input" id="travelForm_money" name="insuranceProgram" type="text">
                            <a href="#" class="js-calc-show-desc b-calc__section_desc-show">Что входит</a>
                        </div>
                        <div class="js-calc-desc-protection b-calc__section_desc">
                            <p>
                                В сумму страховой защиты входит:
                            </p>
                            <ul class="u-clear-fix">
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Медицинская помощь</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Медицинская транспортировка</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Репатриация</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Солнечные ожоги</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Стоматология</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Возвращение детей и присмотр за ними</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Визит родственников</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Оплата срочных сообщений</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Транспортные расходы</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Утеря/хищение документов</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Поисково-спасательные работы</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Проживание в отеле до транспортировки</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="js-checkbox-hover">
                                    <a href="#" class="js-checkbox-text-box-call">Переводчик</a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <p>
                                                Мы возмещаем расходы на вызов врача, организуем и оплатим вызов врача, амбулаторное и стационарное лечение (в т. ч. при солнечных ожогах), включая проведение операций, диагностических исследований, врачебных услуг, назначенных врачом медикаментов, перевязочных средств и средств фиксации (за исключением стоматологического лечения) в пределах € 60 000. п. 5.2.1 Условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="js-calc-section u-clear-fix b-calc__section hidden">

                        <div class="u-clear-fix b-calc__section_box">
                            <label class="b-calc__label">В полис будут вписаны:</label>
                            <div class="b-calc__section_column">
                                <div class="js-amount-box u-clear-fix b-amount__section">
                                    <label class="b-amount__section_label">
                                        <span>взрослые от 3 до 60 лет</span>
                                    </label>
                                    <div class="b-amount__box">
                                        <a href="#" class="js-amount-button b-amount-input__i b-amount-input__i_minus"></a>
                                        <a href="#" class="js-amount-button b-amount-input__i b-amount-input__i_plus"></a>
                                        <input class="js-any-num js-amount js-amount-adult b-input" id="travelForm_adult-amount" name="adultsAndChildren" type="text" value="1">
                                    </div>
                                </div>
                                <div class="js-amount-box u-clear-fix b-amount__section b-amount__box_zero">
                                    <label class="b-amount__section_label">
                                        <span>дети до 3 лет</span>
                                    </label>
                                    <div class="b-amount__box">
                                        <a href="#" class="js-amount-button b-amount-input__i b-amount-input__i_minus"></a>
                                        <a href="#" class="js-amount-button b-amount-input__i b-amount-input__i_plus"></a>
                                        <input class="js-any-num js-amount b-input" id="travelForm_children-amount" name="babes" type="text" value="нет">
                                    </div>
                                </div>
                                <div class="js-amount-box u-clear-fix b-amount__section b-amount__box_zero">
                                    <label class="b-amount__section_label">
                                        <span>взрослые старше 60 лет</span>
                                    </label>
                                    <div class="b-amount__box">
                                        <a href="#" class="js-amount-button b-amount-input__i b-amount-input__i_minus"></a>
                                        <a href="#" class="js-amount-button b-amount-input__i b-amount-input__i_plus"></a>
                                        <input class="js-any-num js-amount b-input" id="travelForm_old-amount" name="old" type="text" value="нет">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="u-clear-fix b-calc__section_box">
                            <label class="b-calc__label">Выберите опции:</label>
                            <div class="b-calc__section_column b-calc__section_column-check-box">
                                <div class="js-checkbox-hover b-checkbox__section">
                                    <input type="checkbox" id="travelForm_dop-opt-1" name="dopSport" value="1">
                                    <label for="travelForm_dop-opt-1" class="b-checkbox__label">
                                        <span class="b-checkbox__icon"></span>
                                        <span class="b-checkbox__text">
                                                Спортивный
                                            </span>
                                    </label>
                                    <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <h6>Активные виды спорта</h6>
                                            <p>
                                                Включены все зимние и летние виды спорта, в том числе горные лыжи, сноуборд, виндсерфинг и пр., кроме исключений указанных в п. 14.1.7 – 14.1.8 условий страхования
                                            </p>
                                            <h6>Защита спортинвентаря</h6>
                                            <p>
                                                Компенсируем стоимость поврежденного или утраченного при перевозке вашего спортивного оборудования в пределах 2 400 € п. 8.1.3  условий страхования
                                            </p>
                                            <h6>
                                                Ski-pass / Лавина
                                            </h6>
                                            <p>
                                                Компенсируем стоимость ski-pass, если трасса будет закрыта из-за лавин или вы не можете кататься из-за болезни или несчастного случая в пределах 500 € п. 12.1 условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-checkbox-hover b-checkbox__section">
                                    <input type="checkbox" id="travelForm_dop-opt-2" name="dopLoot" value="1">
                                    <label for="travelForm_dop-opt-2" class="b-checkbox__label">
                                        <span class="b-checkbox__icon"></span>
                                        <span class="b-checkbox__text">
                                                Защита багажа
                                            </span>
                                    </label>
                                    <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <h6>Активные виды спорта</h6>
                                            <p>
                                                Включены все зимние и летние виды спорта, в том числе горные лыжи, сноуборд, виндсерфинг и пр., кроме исключений указанных в п. 14.1.7 – 14.1.8 условий страхования
                                            </p>
                                            <h6>Защита спортинвентаря</h6>
                                            <p>
                                                Компенсируем стоимость поврежденного или утраченного при перевозке вашего спортивного оборудования в пределах 2 400 € п. 8.1.3  условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-checkbox-hover b-checkbox__section">
                                    <input type="checkbox" id="travelForm_dop-opt-3" name="dopLayer" value="1">
                                    <label for="travelForm_dop-opt-3" class="b-checkbox__label">
                                        <span class="b-checkbox__icon"></span>
                                        <span class="b-checkbox__text">
                                                Личный адвокат
                                            </span>
                                    </label>
                                    <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <h6>Активные виды спорта</h6>
                                            <p>
                                                Включены все зимние и летние виды спорта, в том числе горные лыжи, сноуборд, виндсерфинг и пр., кроме исключений указанных в п. 14.1.7 – 14.1.8 условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-checkbox-hover b-checkbox__section">
                                    <input type="checkbox" id="travelForm_dop-opt-4" name="dopTrauma" value="1">
                                    <label for="travelForm_dop-opt-4" class="b-checkbox__label">
                                        <span class="b-checkbox__icon"></span>
                                        <span class="b-checkbox__text">
                                                Особый случай
                                            </span>
                                    </label>
                                    <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <h6>Активные виды спорта</h6>
                                            <p>
                                                Включены все зимние и летние виды спорта, в том числе горные лыжи, сноуборд, виндсерфинг и пр., кроме исключений указанных в п. 14.1.7 – 14.1.8 условий страхования
                                            </p>
                                            <h6>Защита спортинвентаря</h6>
                                            <p>
                                                Компенсируем стоимость поврежденного или утраченного при перевозке вашего спортивного оборудования в пределах 2 400 € п. 8.1.3  условий страхования
                                            </p>
                                            <p>
                                                Компенсируем стоимость поврежденного или утраченного при перевозке вашего спортивного оборудования в пределах 2 400 € п. 8.1.3  условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-checkbox-hover b-checkbox__section">
                                    <input type="checkbox" id="travelForm_dop-opt-5" name="dopCancel" value="1">
                                    <label for="travelForm_dop-opt-5" class="b-checkbox__label">
                                        <span class="b-checkbox__icon"></span>
                                        <span class="b-checkbox__text">
                                                Предусмотрительный
                                            </span>
                                    </label>
                                    <a href="#" class="js-checkbox-text-box-call b-checkbox__faq-box_call"></a>
                                    <div class="hidden js-checkbox-text b-checkbox__faq-box">
                                        <a href="#" class="js-checkbox-text-box-close b-checkbox__faq-box_close"></a>
                                        <div class="b-checkbox__faq-box_text">
                                            <h6>Активные виды спорта</h6>
                                            <p>
                                                Включены все зимние и летние виды спорта, в том числе горные лыжи, сноуборд, виндсерфинг и пр., кроме исключений указанных в п. 14.1.7 – 14.1.8 условий страхования
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="js-stop-fix-top-result b-calc__section_box">
                            <div class="b-calc__last-info">
                                Осталось указать персональные данные и оплатить страховку – вы распечатаете готовый полис уже через <b>5 минут</b>
                            </div>
                        </div>

                    </div>

                    <div class="js-checkbox-faq-popup b-checkbox__faq"></div>

                </form>

            </div>

            <div class="js-calc-result-blocks js-calc-top-result b-calc__result">
                <div class="b-calc__result_pic" style="background-image: url(i/__tmp/product-result-1.jpg)"></div>
                <div class="u-clear-fix b-calc__result_wrapper">
                    <span class="js-calc-result-top-text b-text__bigger">Полис за 7 минут</span>
                    <div class=" b-calc__result_sum">
                        <span class="b-calc__result_sum-small">от </span><span class="js-calc-result-sum">75</span><span class="b-rub">c</span>
                    </div>
                    <div class="b-calc__result_text">
                        Укажите информацию
                        о поездке, чтобы купить полис
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

    <div class="js-bottom-result-fix-top b-wrapper">
        <div class="js-calc-bottom-result js-calc-result-blocks b-calc__result b-calc__result_bottom">
            <a href=".js-section-calc" class="js-scroll-to-block b-calc__result_scroll">
                Пересчитать
            </a>
            <div class="u-clear-fix b-calc__result_wrapper">
                <span class="js-calc-result-top-text b-text__bigger">Полис за 7 минут</span>
                <div class="b-calc__result_sum">
                    <span class="b-calc__result_sum-small">от </span><span class="js-calc-result-sum">75</span><span class="b-rub">c</span>
                </div>
                <div class="b-calc__result_text">
                    <a href=".js-section-calc" class="js-scroll-to-block b-link"><span class="b-link__text">Рассчитать</span></a>
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

<section id="how_to_buy" class="js-nav-block js-top-result-fix-stop  js-nav-block-for-fix b-bg b-travel-how-buy">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(<?=$owner->getMainImageUrl() ?: $owner->getPreviewImageUrl()?>)"></div>
    </div>

    <?=\app\components\widgets\ProductInlineMenu::widget()?>

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

<?= $this->render('//policy/promo-code') ?>
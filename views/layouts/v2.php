<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shot&Cut</title>

  <link rel="stylesheet" href="css/jquery-ui.min.css" media="all">
  <link rel="stylesheet" href="css/common.css" media="all">

  <script src="js/libs/jquery-3.2.1.min.js"></script>
  <script src="js/libs/jquery-ui.js"></script>
  <script src="js/libs/jquery.ui.touch-punch.min.js"></script>
  <script src="js/libs/phone-mask.js"></script>
  <script src="js/libs/slick.js"></script>
  <script src="js/libs/canvas-video-player.js"></script>
  <script src="js/common.js"></script>
  <script src="js/pages/calc.js"></script>
  <script src="js/pages/index.js"></script>

</head>
<body>
<?php $this->beginBody() ?>
<div class="js-index-bg b-index-bg__box">
  <div class="b-index-bg">
    <video loop autoplay muted controls="true" width='100%' height='100%' id="indexVideo" poster="" class="b-index-bg__video">
      <source src="video/index.webm" type="video/webm; codecs=&quot;vp8, vorbis&quot;">
      <source type="video/mp4" src="video/index.mp4">
    </video>
    <div class="js-canvas-box b-canvas__box">
      <img src="i/index/fake-video-1920-1080.gif" alt="">
      <canvas id="canvasVideo" class="b-canvas js-canvas"></canvas>
    </div>
  </div>
</div>

<header class="js-header b-header b-header__center">
  <div class="u-clear-fix b-wrapper">
    <a href="index.html" class="b-logo"></a>
    <div class="b-button__box">
      <a href="#" class="js-call-calc b-button">
        <span>Расчитать Стоимость</span>
      </a>
    </div>
  </div>
</header>

<div class="js-page-bar b-page-bar b-page-bar_l b-page-bar__hide">
  <a href="#" class="js-call-menu b-menu-call">menu</a>
  <a href="#" class="js-scroll-top b-scroll-top hidden">Наверх</a>
</div>
<div class="js-menu-overlay b-menu-overlay"></div>
<div class="b-menu__box">
  <a href="#" class="b-menu__logo"></a>
  <ul class="b-menu">
    <li>
      <a href="#">Работы</a>
    </li>
    <li>
      <a href="#">О нас</a>
    </li>
    <li>
      <a href="#" class="js-call-calc">Бриф онлайн</a>
    </li>
    <li>
      <a href="#">Блог</a>
    </li>
    <li>
      <a href="#">Контакты</a>
    </li>
  </ul>
  <div class="b-menu__footer">
    <p>
      <a href="tel:+79788441932">+7 (978) 844 19 32</a>
    </p>
    <p>
      <a href="mailto:shotncut.film@gmail.com">shotncut.film@gmail.com</a>
    </p>
  </div>
</div>

<div class="js-page-bar b-page-bar b-page-bar_r b-page-bar__hide">
  <div class="b-social__box">
    <ul class="u-clear-fix b-social">
      <li>
        <a href="#" target="_blank" class="b-social__link">Facebook</a>
      </li>
      <li>
        <a href="#" target="_blank" class="b-social__link">Youtube</a>
      </li>
      <li>
        <a href="#" target="_blank" class="b-social__link">Vimeo</a>
      </li>
      <li>
        <a href="#" target="_blank" class="b-social__link">Instagram</a>
      </li>
    </ul>
  </div>
</div>

<?= $content ?>

<footer class="b-footer">
  <div class="u-clear-fix b-wrapper">
    <div class="b-footer__logo">
      <a href="/"></a>
    </div>
    <div class="b-footer__contact">
      <a href="tel:+79788441932">+7 (978) 844 19 32</a>
      <span>Симферополь, ул. Данилова 43</span>
      <p>
        <a href="mailto:shotncut.film@gmail.com">shotncut.film@gmail.com</a>
      </p>
    </div>
    <div class="b-button__box">
      <a href="#" class="js-call-calc b-button">
        <span>Расчитать Стоимость</span>
        <p>Ознакомиться с услугами и узнать стоимость</p>
      </a>
    </div>
    <ul class="u-clear-fix b-social">
      <li>
        <a href="#" target="_blank" class="b-social__link">Facebook</a>
      </li>
      <li>
        <a href="#" target="_blank" class="b-social__link">Youtube</a>
      </li>
      <li>
        <a href="#" target="_blank" class="b-social__link">Vimeo</a>
      </li>
      <li>
        <a href="#" target="_blank" class="b-social__link">Instagram</a>
      </li>
    </ul>
  </div>
</footer>


<div class="js-popup-overlay b-popup__overlay">
  <a href="#" class="js-popup-close b-popup__close"></a>
  <div class="js-popup b-popup">

    <div class="js-popup-first b-popup__first">
      <h2>Расчет стоимости</h2>
      <p>Рассчет приблизительной стоимости проекта</p>
      <div class="b-button__box">
        <a href="#" class="js-call-calc-block b-button b-button_white">Заполнить бриф</a>
        <a href="#" class="js-call-scheme b-button">смотреть этапы работ</a>
      </div>
    </div>

    <div class="js-scheme b-scheme__box hidden">
      <div class="b-button__box">
        <a href="#" class="js-sheme-back b-button b-button_back">Назад</a>
      </div>
      <div class="b-scheme__overlay">
        <div class="b-scheme">
          <a href="#" class="js-point b-scheme__point b-scheme__point_bottom main" style="left: 31px; top: 3px;">
                            <span class="b-scheme__text">
                                <span>Заполняется клиентом. Содержит краткие пожелания относительно видео.</span>
                            </span>
          </a>

          <a href="#" class="js-point b-scheme__point b-scheme__point_2 b-scheme__point_bottom" style="left: 156px; top: 172px;">
                            <span class="b-scheme__text">
                                <span>Важнейший этап, который определяет каким должно быть готовое видео и включает планирование и подготовку.</span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 190px; top: 267px;">
                            <span class="b-scheme__text">
                                <span>
                                    Основа будущего видео.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 190px; top: 347px;">
                            <span class="b-scheme__text">
                                <span>
                                    Создание синопсиса и сценарного плана.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 63px; top: 427px;">
                            <span class="b-scheme__text">
                                <span>
                                    Может осуществляться клиентом самостоятельно, либо командой Shot'n'Cut с последующим согласованием.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 317px; top: 427px;">
                            <span class="b-scheme__text">
                                <span>
                                    Поиск и аренда локаций. При необходимости привлечение художника-постановщика.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 190px; top: 507px;">
                            <span class="b-scheme__text">
                                <span>
                                    Помимо составления shot-list мы прорисовываем раскадровки на каждый кадр, что помогает на всех последующих этапах. Особенно важны при проектах "под ключ".
                                </span>
                            </span>
          </a>

          <a href="#" class="js-point b-scheme__point b-scheme__point_2" style="left: 548px; top: 508px;">
                            <span class="b-scheme__text">
                                <span>
                                    Все что происходит непосредственно на съемочной площадке в день съемки.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 452px; top: 601px;">
                            <span class="b-scheme__text">
                                <span>
                                    Помимо съемочной смены оператора включает в себя работу ассистента и необходимое базовое оборудование (камера, штатив).
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 706px; top: 601px;">
                            <span class="b-scheme__text">
                                <span>
                                    Работа актеров (профессиональных/непрофессиональных) на съемочной площадке.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 452px; top: 681px;">
                            <span class="b-scheme__text">
                                <span>
                                    Системы стабилизации движения в кадре (трех-осевой стабилизатор и слайдер), а также, при необходимости, аренда другого необходимого оборудования. Аэросъемка.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 706px; top: 681px;">
                            <span class="b-scheme__text">
                                <span>
                                    Специалист, который корректирует игру актеров (особенно важен при работе с непрофессиональными актерами). Также привлекается стилист и визажист.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 578px; top: 778px;">
                            <span class="b-scheme__text">
                                <span>
                                    Студийный искусственный видео-свет, а также, при необходимости, аренда кино-освещения и работа гафера.
                                </span>
                            </span>
          </a>

          <a href="#" class="js-point b-scheme__point b-scheme__point_2 b-scheme__point_bottom" style="left: 938px; top: 172px;">
                            <span class="b-scheme__text">
                                <span>Завершающий этап</span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 841px; top: 266px;">
                            <span class="b-scheme__text">
                                <span>
                                    Согласовывается с клиентом.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 1095px; top: 266px;">
                            <span class="b-scheme__text">
                                <span>
                                    Цветовая коррекция сырого видео-маетриала согласно задачам ролика.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 841px; top: 346px;">
                            <span class="b-scheme__text">
                                <span>
                                    Покупка лицензионного аудиотрека, либо написание индивидуальной дорожки композитором.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 1095px; top: 346px;">
                            <span class="b-scheme__text">
                                <span>
                                    Работа с аудиобиблиотеками и интершумом.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 841px; top: 426px;">
                            <span class="b-scheme__text">
                                <span>
                                    При необходимости создание 2D и 3D анимации, рассчитывается индивидуально для каждого ТЗ.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 1095px; top: 426px;">
                            <span class="b-scheme__text">
                                <span>
                                    При необходимости, запись голоса диктора, с предварительным согласованием самого голоса.
                                </span>
                            </span>
          </a>
          <a href="#" class="js-point b-scheme__point" style="left: 1095px; top: 506px;">
                            <span class="b-scheme__text">
                                <span>
                                    Создание текста для диктора по ТЗ.
                                </span>
                            </span>
          </a>
        </div>
      </div>
    </div>

    <div class="u-clear-fix js-calc-box b-calc__box hidden">
      <div class="b-calc__sidebar">
        <div class="b-calc__sidebar-price">
          <div class="b-calc__sidebar-price_price">
            <span class="js-sidebar-price">37 000</span>
            <span class="b-rub">a</span>
          </div>
          <span class="b-calc__sidebar-price_label">* cумма может отличаться от итоговой </span>
        </div>
        <div class="b-calc__nav_box">
          <ul class="b-calc__nav">
            <li>
              <a href="1" class="js-calc-nav-link b-calc__nav_link b-calc__nav_link-1 active">Информация о проекте</a>
            </li>
            <li>
              <a href="8" class="js-calc-nav-link b-calc__nav_link b-calc__nav_link-2 disabled">Подготовителный этап</a>
            </li>
            <li>
              <a href="15" class="js-calc-nav-link b-calc__nav_link b-calc__nav_link-3 disabled">Съемка</a>
            </li>
            <li>
              <a href="18" class="js-calc-nav-link b-calc__nav_link b-calc__nav_link-4 disabled">Постпродакшн</a>
            </li>
            <li>
              <a href="25" class="js-calc-nav-link b-calc__nav_link b-calc__nav_link-5 disabled">Реализация</a>
            </li>
          </ul>
          <div class="b-calc__sidebar_scheme">
            <a href="#" class="js-call-scheme b-link b-link_dashed"><span class="b-link__text">Cмотреть этапы работ</span></a>
          </div>
        </div>
      </div>

      <form action="http://calc.php" class="js-calc-form b-calc">
        <div class="b-calc__wrapper">
          <div class="js-calc-steps">
            <div class="b-calc_steps">
              <span class="js-current-step">1</span> / <span class="js-all-step">22</span>
            </div>
            <div class="b-calc__item_box">

              <!--1 step-->

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Предполагаемые даты съемки</h2>
                <div class="b-calc__item_form">
                  <input type="text" id="calc_date" name="calc[date]" class="b-input">
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Тематика съемки</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-cof="1.3" type="radio" id="calc_type-1" name="calc[type]" class="js-calc-cof">
                    <label for="calc_type-1">
                      <span class="b-checkbox__i"></span>
                      реклама или имиджевое видео
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-cof="0.7" type="radio" id="calc_type-2" name="calc[type]" class="js-calc-cof">
                    <label for="calc_type-2">
                      <span class="b-checkbox__i"></span>
                      промо или корпоративное видео
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-cof="1" type="radio" id="calc_type-3" name="calc[type]" class="js-calc-cof">
                    <label for="calc_type-3">
                      <span class="b-checkbox__i"></span>
                      музыкальное видео
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-cof="1" type="radio" id="calc_type-4" name="calc[type]" class="js-calc-cof">
                    <label for="calc_type-4">
                      <span class="b-checkbox__i"></span>
                      food-съемка
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-cof="1" type="radio" id="calc_type-5" name="calc[type]" class="js-checkbox-other js-calc-cof">
                    <label for="calc_type-5">
                      <span class="b-checkbox__i"></span>
                      другое
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other visibility">
                    <input type="text" id="calc_type-other" name="calc[type-other]" class="b-input" placeholder="Укажите свой вариант">
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Целевая аудитория</h2>
                <div class="b-calc__item_form">
                  <input type="text" id="calc_audience" name="calc[audience]" class="b-input">
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Цели и задачи создания видео</h2>
                <div class="b-calc__item_form">
                  <input type="text" id="calc_aim" name="calc[aim]" class="b-input">
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Продолжительность готового видео</h2>
                <div class="b-calc__item_form">
                  <div class="b-slider__box">
                    <input type="text" id="calc_time" name="calc[time]" class="js-calc-time-input b-input hidden">
                    <span class="js-calc-time-text b-slider__text"></span>
                    <div class="js-slider-time b-slider"></div>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Срок сдачи готового видео</h2>
                <div class="b-calc__item_form">
                  <input type="text" id="calc_deadline" name="calc[deadline]" class="b-input">
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Референсы / примеры</h2>
                <p>
                  Пожалуйста, предоставьте ссылки на&nbsp;видео, которые вы&nbsp;считаете похожим по&nbsp;идее и&nbsp;стилю на&nbsp;то, что&nbsp;Вы задумали (те&nbsp;видео, которые Вам нравятся):
                </p>
                <div class="b-calc__item_form">
                  <input type="text" id="calc_example-1" name="calc[example-1]" class="b-input" placeholder="Пример 1">
                  <input type="text" id="calc_example-2" name="calc[example-2]" class="b-input" placeholder="Пример 2">
                  <input type="text" id="calc_example-3" name="calc[example-3]" class="b-input" placeholder="Пример 3">
                </div>
              </div>

              <!--2 step-->

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Кто ответственен за разработку идеи и концепции</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_idea-clients" name="calc[idea]">
                    <label for="calc_idea-clients">
                      <span class="b-checkbox__i"></span>
                      я (заказчик)
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="5000" type="checkbox" id="calc_idea-company" name="calc[idea]" class="js-calc-idea">
                    <label for="calc_idea-company">
                      <span class="b-checkbox__i"></span>
                      команда Shot'n'Cut
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Кто ответственен за разработку сценария</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_scenario-clients" name="calc[scenario]">
                    <label for="calc_scenario-clients">
                      <span class="b-checkbox__i"></span>
                      я (заказчик)
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="10000" type="checkbox" id="calc_scenario-company" name="calc[scenario]" class="js-calc-scenario">
                    <label for="calc_scenario-company">
                      <span class="b-checkbox__i"></span>
                      команда Shot'n'Cut
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Кто будет выступать в качестве героев в Вашем видео</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_heroes-no" name="calc[heroes]">
                    <label for="calc_heroes-no">
                      <span class="b-checkbox__i"></span>
                      герои для моего видео не требуются
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_heroes-not-prof" name="calc[heroes]" class="js-checkbox-other js-show-heroes">
                    <label for="calc_heroes-not-prof">
                      <span class="b-checkbox__i"></span>
                      непрофессиональные актеры
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other b-calc-other_hide visibility">
                    <input data-price="2000" type="number" id="calc_heroes-not-prof_amount" name="calc[heroes-not-prof]" class="js-input-num js-calc-heroes-amount b-input" placeholder="Укажите кол-во актеров">
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_heroes-prof" name="calc[heroes]" class="js-checkbox-other js-show-heroes">
                    <label for="calc_heroes-prof">
                      <span class="b-checkbox__i"></span>
                      актеры
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other b-calc-other_hide visibility">
                    <input data-price="6000" type="number" id="calc_heroes-prof_amount" name="calc[heroes-prof]" class="js-input-num js-calc-heroes-amount b-input" placeholder="Укажите кол-во актеров">
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item js-calc-items-hero b-calc__item disabled hidden">
                <h2>Кто занимается поиском героев</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_hero-search-clients" name="calc[hero-search]">
                    <label for="calc_hero-search-clients">
                      <span class="b-checkbox__i"></span>
                      я (заказчик)
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="5000" type="radio" id="calc_hero-search-company" name="calc[hero-search]" class="js-calc-hero-search">
                    <label for="calc_hero-search-company">
                      <span class="b-checkbox__i"></span>
                      команда Shot'n'Cut
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item js-calc-items-hero b-calc__item disabled hidden">
                <h2>Необходимо ли привлечение визажиста</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="5000" type="radio" id="calc_visagiste-yes" name="calc[visagiste]" class="js-calc-visagiste">
                    <label for="calc_visagiste-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_visagiste-no" name="calc[visagiste]">
                    <label for="calc_visagiste-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item js-calc-items-hero b-calc__item disabled hidden">
                <h2>Необходимо ли привлечение стилиста</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="5000" type="radio" id="calc_stylist-yes" name="calc[stylist]" class="js-calc-stylist">
                    <label for="calc_stylist-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_stylist-no" name="calc[stylist]">
                    <label for="calc_stylist-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Требуется ли создание раскадровок</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="300" type="radio" id="calc_storyboard-yes" name="calc[storyboard]" class="js-calc-storyboard">
                    <label for="calc_storyboard-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_storyboard-no" name="calc[storyboard]">
                    <label for="calc_storyboard-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <!--3 step-->

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Предполагаемое кол-во дней съемки</h2>
                <div class="b-calc__item_form">
                  <div class="b-slider__box">
                    <input type="text" id="calc_days" name="calc[days]" class="js-calc-days-input b-input hidden">
                    <span class="js-calc-days-text b-slider__text"></span>
                    <div class="js-slider-days b-slider"></div>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Оборудование</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="15000" type="checkbox" id="calc_equipment-1" name="calc[equipment]" class="js-calc-equipment">
                    <label for="calc_equipment-1">
                      <span class="b-checkbox__i"></span>
                      базовый набор (камера, оптика, штатив)
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="5000" type="checkbox" id="calc_equipment-2" name="calc[equipment]" class="js-calc-equipment">
                    <label for="calc_equipment-2">
                      <span class="b-checkbox__i"></span>
                      стабилизация и движение в кадре (Ronin, слайдер)
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="3000" type="checkbox" id="calc_equipment-3" name="calc[equipment]" class="js-calc-equipment">
                    <label for="calc_equipment-3">
                      <span class="b-checkbox__i"></span>
                      студийный свет
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="10000" type="checkbox" id="calc_equipment-4" name="calc[equipment]" class="js-calc-equipment">
                    <label for="calc_equipment-4">
                      <span class="b-checkbox__i"></span>
                      киноосвещение
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="12000" type="checkbox" id="calc_equipment-5" name="calc[equipment]" class="js-calc-equipment">
                    <label for="calc_equipment-5">
                      <span class="b-checkbox__i"></span>
                      аэросъемка
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_equipment-6" name="calc[type]" class="js-checkbox-other">
                    <label for="calc_equipment-6">
                      <span class="b-checkbox__i"></span>
                      прочее
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other visibility">
                    <input type="text" id="calc_equipment-other" name="calc[equipment-other]" class="b-input" placeholder="Укажите прочее оборудование">
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item js-calc-items-hero b-calc__item disabled hidden">
                <h2>Требуется ли специалист по работе с актерами</h2>
                <p>Требуется при съемке постановочных сцен с участием актеров (либо непрофессиональных актеров).</p>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="10000" type="radio" id="calc_team-yes" name="calc[team]" class="js-calc-team">
                    <label for="calc_team-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_team-no" name="calc[team]">
                    <label for="calc_team-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <!--4 step-->

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Монтаж</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="10000" type="radio" id="calc_montage-yes" name="calc[montage]" class="js-calc-montage">
                    <label for="calc_montage-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_montage-no" name="calc[montage]">
                    <label for="calc_montage-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Цветокоррекция</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="6000" type="radio" id="calc_color-yes" name="calc[color]" class="js-calc-color">
                    <label for="calc_color-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_color-no" name="calc[color]">
                    <label for="calc_color-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Sound design</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="5000" type="radio" id="calc_sound-yes" name="calc[sound]" class="js-calc-sound">
                    <label for="calc_sound-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_sound-no" name="calc[sound]">
                    <label for="calc_sound-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Музыка</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="2000" type="radio" id="calc_music-1" name="calc[music]" class="js-calc-music">
                    <label for="calc_music-1">
                      <span class="b-checkbox__i"></span>
                      покупка трека с аудистока
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input data-price="15000" type="radio" id="calc_music-2" name="calc[music]" class="js-calc-music">
                    <label for="calc_music-2">
                      <span class="b-checkbox__i"></span>
                      индивидуальное написание музыкального трека композитором
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_music-3" name="calc[music]" class="js-checkbox-other">
                    <label for="calc_music-3">
                      <span class="b-checkbox__i"></span>
                      прочее
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other visibility">
                    <input type="text" id="calc_music-other" name="calc[music-other]" class="b-input" placeholder="Укажите свой вариант">
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Закадровый голос (диктор)</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_speaker-yes" name="calc[speaker]" class="js-speaker-show">
                    <label for="calc_speaker-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox-speaker b-calc__item_inside hidden">
                    <div class="js-checkbox b-checkbox">
                      <input data-price="3000" type="checkbox" id="calc_speaker-rus" name="calc[speaker-lg]" class="js-calc-speaker">
                      <label for="calc_speaker-rus">
                        <span class="b-checkbox__i"></span>
                        русскоязычный диктор
                      </label>
                    </div>
                    <div class="js-checkbox b-checkbox">
                      <input data-price="13000" type="checkbox" id="calc_speaker-eng" name="calc[speaker-lg]" class="js-calc-speaker">
                      <label for="calc_speaker-eng">
                        <span class="b-checkbox__i"></span>
                        зарубежный диктор (native speaker)
                      </label>
                    </div>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_speaker-no" name="calc[speaker]" class="js-speaker-show">
                    <label for="calc_speaker-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Копирайтер</h2>
                <p>(написание текста для диктора)</p>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input data-price="3000" type="radio" id="calc_copywriter-yes" name="calc[copywriter]" class="js-calc-copywriter">
                    <label for="calc_copywriter-yes">
                      <span class="b-checkbox__i"></span>
                      да
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_copywriter-no" name="calc[copywriter]">
                    <label for="calc_copywriter-no">
                      <span class="b-checkbox__i"></span>
                      нет
                    </label>
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2>Графика и анимация</h2>
                <p>рассчитывается индивидуально под проект</p>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_animation-1" name="calc[animation]">
                    <label for="calc_animation-1">
                      <span class="b-checkbox__i"></span>
                      2D анимация
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_animation-2" name="calc[animation]">
                    <label for="calc_animation-2">
                      <span class="b-checkbox__i"></span>
                      3D анимация
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_animation-3" name="calc[animation]" class="js-checkbox-other">
                    <label for="calc_animation-3">
                      <span class="b-checkbox__i"></span>
                      прочее
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other b-calc-other_hide visibility">
                    <input type="text" id="calc_animation-other" name="calc[animation-other]" class="b-input" placeholder="Укажите свой вариант">
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_animation-4" name="calc[animation]">
                    <label for="calc_animation-4">
                      <span class="b-checkbox__i"></span>
                      не нужна
                    </label>
                  </div>
                </div>
              </div>

              <!--5 step-->

              <div class="js-calc-form-item b-calc__item current">
                <h2 class="b-calc__item_title">В процессе реализации для нас важно понимать, каким именно образом Вы планируете брендировать свой продукт в видео:</h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_branding-1" name="calc[branding]">
                    <label for="calc_branding-1">
                      <span class="b-checkbox__i"></span>
                      Визуально узнаваемая на протяжении всего видео реклама бренда/продукта. Видео обязательно должно начинаться и/или заканчиваться логотипом.
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_branding-2" name="calc[branding]">
                    <label for="calc_branding-2">
                      <span class="b-checkbox__i"></span>
                      Не явно, но видео должно начинаться и заканчиваться логотипом бренда, чтобы зрительно четко понимал, чей это ролик.
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_branding-3" name="calc[branding]">
                    <label for="calc_branding-3">
                      <span class="b-checkbox__i"></span>
                      Не явно. Видео не должно выглядеть как реклама. Главная цель – создать ролик, которым будут делиться с друзьями.
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="radio" id="calc_branding-4" name="calc[branding]" class="js-checkbox-other">
                    <label for="calc_branding-4">
                      <span class="b-checkbox__i"></span>
                      прочее
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other b-calc-other_hide visibility">
                    <input type="text" id="calc_branding-other" name="calc[branding-other]" class="b-input" placeholder="Укажите свой вариант">
                  </div>
                </div>
              </div>

              <div class="js-calc-form-item b-calc__item hidden">
                <h2 class="b-calc__item_title">Через какие каналы Вы планируете донести видео до целевой аудитории? </h2>
                <div class="b-calc__item_form">
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_social-1" name="calc[social]">
                    <label for="calc_social-1">
                      <span class="b-checkbox__i"></span>
                      соцсети
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_social-2" name="calc[social]">
                    <label for="calc_social-2">
                      <span class="b-checkbox__i"></span>
                      канал на Youtube/Vimeo
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_social-3" name="calc[social]">
                    <label for="calc_social-3">
                      <span class="b-checkbox__i"></span>
                      ТВ
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_social-4" name="calc[social]">
                    <label for="calc_social-4">
                      <span class="b-checkbox__i"></span>
                      реклама в общественных местах
                    </label>
                  </div>
                  <div class="js-checkbox b-checkbox">
                    <input type="checkbox" id="calc_social-5" name="calc[social]" class="js-checkbox-other">
                    <label for="calc_social-5">
                      <span class="b-checkbox__i"></span>
                      прочее
                    </label>
                  </div>
                  <div class="js-other-input b-calc-other b-calc-other_hide visibility">
                    <input type="text" id="calc_social-other" name="calc[social-other]" class="b-input" placeholder="Укажите свой вариант">
                  </div>
                </div>
              </div>

            </div>
            <div class="b-calc__arrows">
              <a href="#" class="js-calc-prev b-calc__arrows_l"></a>
              <a href="#" class="js-calc-next b-calc__arrows_r"></a>
            </div>
            <input type="text" id="calc_common-price" name="calc[common-price]" class="js-common-price-input b-input hidden">
          </div>
          <div class="js-calc-email b-calc__item_box b-calc__item_box-last hidden">
            <h2>Ваш email</h2>
            <input type="text" id="calc_email" name="calc[email]" class="js-required email b-input">
            <div class="b-button__box">
              <button type="submit" disabled="disabled" class="b-button b-button_white">Отправить бриф</button>
            </div>
            <p class="js-calc-error hidden">Возникла ошибка.<br>Повторите попытку позже.</p>
          </div>
        </div>
      </form>
    </div>

    <div class="js-calc-success b-calc-success hidden">
      <div class="b-calc-success__wrapper">
        <h2>
          <span class="js-calc-success-price"></span>
          <span class="b-rub">a</span>
        </h2>
        <p>Мы&nbsp;выслали расчет стоимости вам на&nbsp;почту. Наш менеджер свяжется с&nbsp;вами свяжимся в&nbsp;ближайшее время!</p>
        <div class="b-button__box">
          <a href="#" class="js-call-scheme b-button">смотреть этапы работ</a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $this->endBody() ?>
</body>
</html>


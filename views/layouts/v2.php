<?php
/**
 * @var string $content
 * @var \app\components\Controller $this
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo \yii\helpers\Html::csrfMetaTags(); ?>
  <base href="/static/">

    <title>Сбербанк страхование<?php if($this->title) {echo ' - '.\yii\helpers\Html::encode($this->title);} ?></title>

  <link rel="stylesheet" href="css/jquery.datepick.css" media="all">
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" media="all">
  <link rel="stylesheet" href="css/common.css" media="all">

  <script src="js/libs/jquery-3.2.1.min.js"></script>
  <script src="js/libs/jquery.plugin.js"></script>
  <script src="js/libs/jquery.datepick.js"></script>
  <script src="js/libs/jquery.datepick-ru.js"></script>
  <script src="js/libs/slick.js"></script>
  <script src="js/libs/phone-mask.js"></script>
  <script src="js/libs/jquery.mCustomScrollbar.js"></script>
  <script src="http://www.youtube.com/player_api"></script>

  <script src="js/common.js"></script>

  <link rel="shortcut icon" href="/favicon-16.ico" sizes="16x16">
  <link rel="shortcut icon" href="/favicon-48.ico" sizes="48x48">

  <!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TQX7VQ');</script><!-- End Google Tag Manager -->
  <!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TLLMLP');</script><!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQX7VQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->
<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLLMLP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->

<header class="js-header b-header">
  <div class="js-header-wrapper b-header__wrapper b-wrapper">

    <div class="u-clear-fix b-header__top">
      <a href="/" class="b-header__logo"></a>
      <div class="b-header__login_box">
        <a href="#" class="b-header__login">
          <span class="b-header__login_text">Войти</span>
          <span class="b-header__login_icon"></span>
        </a>
      </div>
      <ul class="u-clear-fix b-top-menu">
        <li>
          <a href="#">Обратная связь</a>
        </li>
        <li>
          <a href="#">Страховой случай</a>
        </li>
        <li>
          <a href="/activate">Активировать полис</a>
        </li>
      </ul>
      <div class="b-header__search">
        <a href="#" class="b-header__search_i"></a>
      </div>

      <div class="js-header-line b-header__line"></div>
    </div>

    <div class="u-clear-fix b-header__bottom">
      <ul class="u-clear-fix b-bottom-menu">
        <li>
          <a href="#menu-c1travel" class="js-product-tag">Путешествия</a>
        </li>
        <li>
          <a href="#menu-c1health" class="js-product-tag">Здоровье и жизнь</a>
        </li>
        <li>
          <a href="#menu-c1family" class="js-product-tag">Семья</a>
        </li>
        <li>
          <a href="#menu-c1build" class="js-product-tag">Недвижемость</a>
        </li>
        <li>
          <a href="#menu-c1finance" class="js-product-tag">Финансы</a>
        </li>
        <li>
          <a href="#menu-c1business" class="js-product-tag">Для бизнеса</a>
        </li>
      </ul>
    </div>
  </div>
  <?php echo \app\components\widgets\MainBurgerMenu::widget([]); ?>
</header>
<a href="#" class="js-toggle-menu b-menu-toggle">
  <span class="b-menu-toggle__line b-menu-toggle__line_1"></span>
  <span class="b-menu-toggle__line b-menu-toggle__line_2"></span>
  <span class="b-menu-toggle__line b-menu-toggle__line_3"></span>
</a>

<div class="b-content">
<?= $content ?>

</div>

<footer class="b-footer">
  <div class="b-wrapper">

    <div class="u-clear-fix b-information__section">
      <div class="b-information__tel">
        <span>ООО СК «Сбербанк Страхование жизни»</span>
        <h2><a href="tel:88005555595">8 800 555 55 95</a></h2>
      </div>
      <div class="b-information__tel">
        <span>ООО СК «Сбербанк Страхование»</span>
        <h2><a href="tel:88005555557">8 800 555 55 57</a></h2>
      </div>
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

    <div class="u-clear-fix b-footer__columns_box">
      <div class="b-footer__columns">
        <ul>
          <li>
            <a href="#">О нас</a>
          </li>
          <li>
            <a href="#">Команда</a>
          </li>
          <li>
            <a href="#">Вакансии</a>
          </li>
          <li>
            <a href="#">Реестр агентов</a>
          </li>
          <li>
            <a href="#">Раскрытие информации</a>
          </li>
          <li>
            <a href="#">Контакты</a>
          </li>
        </ul>
      </div>
      <div class="b-footer__columns">
        <ul>
          <li>
            <a href="#">Закупки</a>
          </li>
          <li>
            <a href="#">Финансовые показатели</a>
          </li>
          <li>
            <a href="#">Страховая документация</a>
          </li>
          <li>
            <a href="#">Действия по полису</a>
          </li>
          <li>
            <a href="#">Новости</a>
          </li>
        </ul>
      </div>
      <div class="b-footer__columns">
        <span class="b-footer__title">Сотрудникам Сбербанка</span>
        <ul>
          <li>
            <a href="#">Защита от клеща</a>
          </li>
          <li>
            <a href="#">Маяк</a>
          </li>
          <li>
            <a href="#">Верный выбор</a>
          </li>
        </ul>
        <span class="b-footer__title">Партнерские продукты</span>
        <ul>
          <li>
            <a href="#">Онкологическое страхование</a>
          </li>
        </ul>
      </div>
      <ul class="b-licence">
        <li>
          <span class="b-licence__title">ООО СК  «Сбербанк страхование»</span>
          <p>Лицензия Банка России СИ №4331 и СЛ №4331 выданы 05.08.2015 бессрочно</p>
        </li>
        <li>
          <span class="b-licence__title">ООО СК  «Сбербанк страхование жизни»</span>
          <p>Лицензия на осуществление страхования СЖ № 3692, Лицензия на осуществление страхования СЛ № 3692</p>
        </li>
      </ul>
    </div>

    <div class="u-clear-fix b-footer__bottom">
      <div class="b-footer__bottom_copy">
        © 2017 Сбербанк cтрахование
      </div>
      <div class="b-footer__bottom_made">
        <span>Сайт сделан</span> <a target="_blank" href="http://artutkin.ru/">в Артели Уткина</a> <span>в&nbsp;2017 году</span>
      </div>
      <div class="b-footer__bottom_middle">
        Дата обновления сведений на странице: 22 ноября, 2016 в 13:41
      </div>
    </div>

  </div>
</footer>

</body>
</html>

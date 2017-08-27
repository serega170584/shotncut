<?php
/** @var array $company */
/** @var app\models\node\Team[] $models */
/** @var string $comp_cr */
?>
<section class="b-top__section b-top__section_about">
    <div class="b-wrapper">
        <h1>О компании</h1>

        <div class="js-tabs-container b-main-tabs__section">
            <ul class="u-clear-fix b-main-tabs__tabs">
                <?php
                foreach ($company as $key => $item) {
                    $activeClass = '';
                    if ($comp_cr == $key) {
                        $activeClass = ' active';
                    }
                    ?>
                    <li>
                        <a href="#company<?= $key ?>" class="js-tabs b-main-tabs__tabs_link<?= $activeClass ?>"><?= $item ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <div class="js-about-menu-fix b-main-tabs__result_box">
                <div id="tab1" class="js-tabs-result b-main-tabs__result active">

                    <div class="u-clear-fix b-about-section">
                        <div class="js-about-menu-column b-about-section_l">
                            <div class="b-about-section__menu_wrapper">
                                <ul class="js-about-menu b-about-section__menu">
                                    <li>
                                        <a href="#" class="b-about-section__menu_link about">
                                            О нас
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link history">
                                            История
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link team active">
                                            Команда
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link info">
                                            Раскрытие информации
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link procurement">
                                            Закупки
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link agents">
                                            Реестр страховых агентов
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link careers">
                                            Вакансии
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link contacts">
                                            Контакты
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="b-about-section_r">
                            <h3>
                                Наша команда
                            </h3>

                            <ul class="b-accordion">
                                <li class="js-accordion-item b-accordion__item first-active active">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Ханнес Шарипутра Чопра
                                        <span>Генеральный директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            Если вы не активируете полис, то по умолчанию будет застраховано имущество лица, оплатившего страховой полис, по адресу его постоянной регистрации.
                                        </p>
                                        <p>
                                            Если вы не активируете полис, то по умолчанию будет застраховано имущество лица, оплатившего страховой полис, по адресу его постоянной регистрации.
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Джейхун Рахметов
                                        <span>Замееститель Генерального Директора - Финансовый Директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        В рамках базового покрытия: развлечения на воде с использованием водных велосипедов, каноэ, водных мотоциклов, буксируемых надувных средств и парашютов, посещение аквапарка, водное поло в бассейне, снорклинг, прогулки на яхте. Если вы планируете заниматься более активными видами спорта, то рекомендуем Вам приобрести пакет «Спортивный».
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Роман Сальков
                                        <span>Заместитель генерального директора - Директор по управлению продуктами и торговым коммуникациям</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        В рамках базового покрытия: развлечения на воде с использованием водных велосипедов, каноэ, водных мотоциклов, буксируемых надувных средств и парашютов, посещение аквапарка, водное поло в бассейне, снорклинг, прогулки на яхте. Если вы планируете заниматься более активными видами спорта, то рекомендуем Вам приобрести пакет «Спортивный».
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Владимир Новиков
                                        <span>Заместитель Генерального директора – Директор по рискам</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        В рамках базового покрытия: развлечения на воде с использованием водных велосипедов, каноэ, водных мотоциклов, буксируемых надувных средств и парашютов, посещение аквапарка, водное поло в бассейне, снорклинг, прогулки на яхте. Если вы планируете заниматься более активными видами спорта, то рекомендуем Вам приобрести пакет «Спортивный».
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Мария Титчева
                                        <span>Административный директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                        <p>
                                            Карьеру в страховании начала в 2008 году в группе компаний «Дженерали ППФ», где прошла путь от Ведущего юрисконсульта до Начальника юридического отдела.
                                        </p>
                                        <p>
                                            С 2011 по 2014 гг. – Руководитель юридического отдела компании «МетЛайф», а также Руководитель совместной рабочей группы по контролю за изменениями в законодательстве и реагированию на них Ассоциации Страховщиков Жизни и Комитета Всероссийского Союза Страховщиков по развитию страхования жизни.
                                        </p>
                                        <p>
                                            В 2014 году назначена на должность Административного директора в компании «Сбербанк страхование»
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Вадим Егоров
                                        <span>Директор по информационным технологиям</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Лариса Савинова
                                        <span>Главный Бухгалтер</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Мария Ушакова
                                        <span>PR директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
                <div id="tab2" class="js-tabs-result b-main-tabs__result">

                    <div class="u-clear-fix b-about-section">
                        <div class="js-about-menu-column b-about-section_l">
                            <div class="b-about-section__menu_wrapper">
                                <ul class="js-about-menu b-about-section__menu">
                                    <li>
                                        <a href="#" class="b-about-section__menu_link about">
                                            О нас
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link history">
                                            История
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link team active">
                                            Команда
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link info">
                                            Раскрытие информации
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link procurement">
                                            Закупки
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link agents">
                                            Реестр страховых агентов
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link careers">
                                            Вакансии
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="b-about-section__menu_link contacts">
                                            Контакты
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="b-about-section_r">
                            <h3>
                                Наша команда
                            </h3>

                            <ul class="b-accordion">
                                <li class="js-accordion-item b-accordion__item first-active active">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Ханнес Шарипутра Чопра
                                        <span>Генеральный директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            Если вы не активируете полис, то по умолчанию будет застраховано имущество лица, оплатившего страховой полис, по адресу его постоянной регистрации.
                                        </p>
                                        <p>
                                            Если вы не активируете полис, то по умолчанию будет застраховано имущество лица, оплатившего страховой полис, по адресу его постоянной регистрации.
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Джейхун Рахметов
                                        <span>Замееститель Генерального Директора - Финансовый Директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        В рамках базового покрытия: развлечения на воде с использованием водных велосипедов, каноэ, водных мотоциклов, буксируемых надувных средств и парашютов, посещение аквапарка, водное поло в бассейне, снорклинг, прогулки на яхте. Если вы планируете заниматься более активными видами спорта, то рекомендуем Вам приобрести пакет «Спортивный».
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Роман Сальков
                                        <span>Заместитель генерального директора - Директор по управлению продуктами и торговым коммуникациям</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        В рамках базового покрытия: развлечения на воде с использованием водных велосипедов, каноэ, водных мотоциклов, буксируемых надувных средств и парашютов, посещение аквапарка, водное поло в бассейне, снорклинг, прогулки на яхте. Если вы планируете заниматься более активными видами спорта, то рекомендуем Вам приобрести пакет «Спортивный».
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Владимир Новиков
                                        <span>Заместитель Генерального директора – Директор по рискам</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        В рамках базового покрытия: развлечения на воде с использованием водных велосипедов, каноэ, водных мотоциклов, буксируемых надувных средств и парашютов, посещение аквапарка, водное поло в бассейне, снорклинг, прогулки на яхте. Если вы планируете заниматься более активными видами спорта, то рекомендуем Вам приобрести пакет «Спортивный».
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Мария Титчева
                                        <span>Административный директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                        <p>
                                            Карьеру в страховании начала в 2008 году в группе компаний «Дженерали ППФ», где прошла путь от Ведущего юрисконсульта до Начальника юридического отдела.
                                        </p>
                                        <p>
                                            С 2011 по 2014 гг. – Руководитель юридического отдела компании «МетЛайф», а также Руководитель совместной рабочей группы по контролю за изменениями в законодательстве и реагированию на них Ассоциации Страховщиков Жизни и Комитета Всероссийского Союза Страховщиков по развитию страхования жизни.
                                        </p>
                                        <p>
                                            В 2014 году назначена на должность Административного директора в компании «Сбербанк страхование»
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Вадим Егоров
                                        <span>Директор по информационным технологиям</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Лариса Савинова
                                        <span>Главный Бухгалтер</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                    </div>
                                </li>
                                <li class="js-accordion-item b-accordion__item">
                                    <a href="#" class="js-accordion-link b-accordion__link">
                                        Мария Ушакова
                                        <span>PR директор</span>
                                    </a>
                                    <div class="js-accordion-text b-accordion__text">
                                        <p>
                                            В 2003 году окончила Московскую Государственную Юридическую Академию им. О.Е. Кутафина.
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
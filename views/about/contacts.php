<?php
/** @var array $company */
/** @var app\models\node\About[] $models */
/** @var string $comp_cr */
?>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script src="js/pages/contacts.js"></script>
<?php
$pointsList = [];
foreach ($models as $model_item) {
    $pointsList[] = '"company'.$model_item->rating.'": {"coords":"'.$model_item->text_6.'", "zoom":"'.$model_item->text_7.'"}';
}
?>
<script>
    var myPoints = {<?= implode(', ', $pointsList) ?>};
</script>
<section class="b-top__section b-top__section_about">
    <div class="b-wrapper">
        <h1>О компании</h1>
    </div>

    <div class="js-tabs-container b-main-tabs__section">
        <div class="b-wrapper">
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
        </div>

        <div class="js-about-menu-fix b-main-tabs__result_box">
            <div id="map" class="b-map"></div>
            <div class="b-wrapper">
                <?php
                foreach ($company as $key => $item) {
                    $activeClass = '';
                    if ($comp_cr == $key) {
                        $activeClass = ' active';
                    }
                    ?>
                    <div id="company<?= $key ?>" class="js-tabs-result b-main-tabs__result<?= $activeClass ?>">
                        <?php
                        foreach ($models as $model_item) {
                            if ($model_item->rating == $key) {
                               ?>
                                <div class="u-clear-fix b-about-section">
                                    <div class="js-about-menu-column b-about-section_l">
                                        <div class="b-about-section__menu_wrapper">
                                            <ul class="js-about-menu b-about-section__menu">
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/index', 'company' => $key]) ?>" class="b-about-section__menu_link about">
                                                        О нас
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/history', 'company' => $key]) ?>" class="b-about-section__menu_link history">
                                                        История
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/team', 'company' => $key]) ?>" class="b-about-section__menu_link team">
                                                        Команда
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/info', 'company' => $key]) ?>" class="b-about-section__menu_link info">
                                                        Раскрытие информации
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/procurement', 'company' => $key]) ?>" class="b-about-section__menu_link procurement">
                                                        Закупки
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/agents', 'company' => $key]) ?>" class="b-about-section__menu_link agents">
                                                        Реестр страховых агентов
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/careers', 'company' => $key]) ?>" class="b-about-section__menu_link careers">
                                                        Вакансии
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= \yii\helpers\Url::toRoute(['about/contacts', 'company' => $key]) ?>" class="b-about-section__menu_link contacts active">
                                                        Контакты
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-about-section_r">
                                        <div class="u-clear-fix b-contacts__box">
                                            <div class="b-contacts__column">
                                                <?= $model_item->preview_text ?>
                                            </div>
                                            <div class="b-contacts__column">
                                                <?= $model_item->text_1 ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</section>
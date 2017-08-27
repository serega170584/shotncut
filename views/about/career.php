<?php
/** @var array $company */
/** @var string $comp_cr */
/** @var app\models\node\Career[] $intro */
/** @var app\models\node\Career[] $models */
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
                <?php
                foreach ($company as $key => $item) {
                    $activeClass = '';
                    if ($comp_cr == $key) {
                        $activeClass = ' active';
                    }
                    ?>
                    <div id="company<?= $key ?>" class="js-tabs-result b-main-tabs__result<?= $activeClass ?>">

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
                                            <a href="<?= \yii\helpers\Url::toRoute(['about/careers', 'company' => $key]) ?>" class="b-about-section__menu_link careers active">
                                                Вакансии
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= \yii\helpers\Url::toRoute(['about/contacts', 'company' => $key]) ?>" class="b-about-section__menu_link contacts">
                                                Контакты
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="b-about-section_r">
                                <div class="b-text__wrapper">
                                    <h3>
                                        Вакансии
                                    </h3>
                                    <?php
                                    foreach ($intro as $intro_item) {
                                        if ($intro_item->rating == $key) {
                                            echo $intro_item->preview_text;
                                        }
                                    }
                                    ?>
                                </div>

                                <?php
                                if (!empty($models)) {
                                    ?>
                                <ul class="b-accordion">
                                    <?php
                                    $isFirst = true;
                                    foreach ($models as $model_item) {
                                        if ($model_item->rating == $key) {
                                            $activeClass = '';
                                            if ($isFirst) {
                                                $activeClass = ' first-active active';
                                            }
                                            ?>
                                            <li class="js-accordion-item b-accordion__item<?= $activeClass ?>">
                                                <a href="#" class="js-accordion-link b-accordion__link">
                                                    <?=\yii\helpers\Html::encode($model_item->title)?>
                                                </a>
                                                <div class="js-accordion-text b-accordion__text">
                                                    <div class="b-careers b-text__wrapper">
                                                        <table>
                                                            <thead>
                                                            <tr>
                                                                <td>З/П</td>
                                                                <td>Опыта работы</td>
                                                                <td>Тип занятости</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    if (!empty($model_item->text_1)) {
                                                                        ?>
                                                                         <?= \yii\helpers\Html::encode($model_item->text_1) ?><span class="b-rub">c</span>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </td>
                                                                <td><?= \yii\helpers\Html::encode($model_item->text_2) ?></td>
                                                                <td><?= \yii\helpers\Html::encode($model_item->text_3) ?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <?= $model_item->preview_text ?>
                                                    </div>
                                                    <div class="b-button__box">
                                                        <a href="#" class="js-сareer-call b-button">Откликнуться на вакансию</a>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="js-сareer-overlay b-popup__overlay">
            <a href="#" class="js-сareer-close b-popup__close"></a>
            <div class="js-сareer-popup b-popup b-popup__сareer">
                <h4>Резюме</h4>
                <form action="http://index.php" id="career-form" class="js-сareer-form b-сareer-form">
                    <div class="u-clear-fix b-сareer-form__column">
                        <div class="b-input__box">
                            <label for="сareer_name" class="b-label">Мое имя</label>
                            <input id="сareer_name" name="сareer[name]" class="js-required b-input" type="text">
                        </div>
                        <div class="b-input__box">
                            <label for="сareer_email" class="b-label">Моя электронная почта</label>
                            <input id="сareer_email" name="сareer[email]" class="js-required b-input email" type="email">
                        </div>
                    </div>
                    <div class="b-input__box b-input__box_file">
                        <label for="сareer_file" class="b-label">Мое резюме</label>
                        <div class="js-file-box b-input-file">
                            <input type="file" id="сareer_file" name="сareer[file]" class="js-file js-required">
                            <label class="b-input-file__label b-button b-button_small">Добавить файл</label>
                            <div class="js-file-insert b-input-file__text hidden"></div>
                        </div>
                    </div>
                    <div class="b-input__box">
                        <label for="сareer_message" class="b-label">Мое сообщение</label>
                        <textarea id="сareer_message" name="сareer[message]" class="b-input"></textarea>
                    </div>
                    <div class="b-button__box">
                        <button type="submit" class="b-button b-button_submit" disabled="disabled">Отправить</button>
                    </div>
                </form>
                <p class="js-сareer-form-error b-order-form__error hidden">
                    Возникла ошибка.<br>Повторите попытку позже.
                </p>
                <p class="js-сareer-form-success b-order-form__success hidden">
                    Спасибо!<br>В ближайшее время мы свяжемся с вами.
                </p>
            </div>

        </div>

    </div>

</section>
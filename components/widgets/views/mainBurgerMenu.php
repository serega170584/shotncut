<?php
/**
 * @var \yii\base\Widget $this
 * @var \app\models\category\Category[] $categories
 * @var \app\models\node\Policy[][] $policyByCat
 * @var \app\models\node\Policy[][][] $policyByCat2
 * @var \app\models\node\Policy[] $sberPolicy
 * @var \app\models\node\Policy[][] $partnersPolicy
 * @var \app\models\category\Category2[] $partners
 */
?>
<div class="js-header-main b-header-main">
    <div class="b-header-main__wrapper">
        <div class="u-clear-fix b-wrapper">
            <div class="b-header-main__l">
                <a href="#menu-main" class="js-header-tab-link b-header-main__link b-header-main__link_first active">
                    Сбербанк Страхование
                </a>
                <ul class="b-header-main__nav">
                    <?php
                    foreach ($categories as $category) {
                        if (empty($policyByCat[$category->id]) ||
                            (empty($policyByCat2[$category->id][app\models\category\Category2::ONLINE])
                                && empty($policyByCat2[$category->id][app\models\category\Category2::OFFLINE]))) {
                            continue;
                        }
                        if (count($policyByCat[$category->id]) == 1) {
                            ?>
                            <li>
                                <a href="<?=\yii\helpers\Url::toRoute(['policy/view', 'slug' => $policyByCat[$category->id][0]->alias])?>"
                                   class="b-header-main__link b-header-main__link_<?= $category->code ?>">
                                    <span class="b-link"><span class="b-link__text"><?=\yii\helpers\Html::encode($category->name)?></span></span>
                                </a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="#menu-c1<?= $category->code ?>"
                                   class="js-header-tab-link b-header-main__link b-header-main__link_<?= $category->code ?>">
                                    <?=\yii\helpers\Html::encode($category->name)?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <div class="b-header-main__l_tel">
                    <div class="b-header-main__tel">
                        <span>ООО СК «Сбербанк Страхование жизни»</span>
                        <a href="tel:88005555595">8 800 555 55 95</a>
                    </div>
                    <div class="b-header-main__tel">
                        <span>ООО СК «Сбербанк Страхование»</span>
                        <a href="tel:88005555557">8 800 555 55 57</a>
                    </div>
                </div>
                <?php
                if (count($sberPolicy) == 1) {
                    ?>
                    <a href="<?=\yii\helpers\Url::toRoute(['policy/view', 'slug' => $sberPolicy[0]->alias])?>"
                       class="b-header-main__link b-header-main__link_sberpolicy">
                        <span class="b-link"><span class="b-link__text">Сотрудникам Сбербанка</span></span>
                    </a>
                    <?php
                } elseif (count($sberPolicy) > 1) {
                    ?>
                        <a href="#menu-c1-sberpolicy"
                           class="js-header-tab-link b-header-main__link b-header-main__link_sberpolicy">
                            Сотрудникам Сбербанка
                        </a>
                    <?php
                }
                ?>
                <?php
                /** @var \app\models\node\Policy|null $firstItem */
                $firstItem = null;
                $partnersCount = array_reduce($partnersPolicy, function($carry, $item) use (&$firstItem) {
                    $firstItem = $item[0];
                    return $carry + count($item);
                }, 0);
                if ($partnersCount == 1 && $firstItem) {
                    ?>
                    <a href="<?=\yii\helpers\Url::toRoute(['policy/view', 'slug' => $firstItem->alias])?>"
                       class="b-header-main__link b-header-main__link_parnterspolicy">
                        <span class="b-link"><span class="b-link__text">Партнерские продукты</span></span>
                    </a>
                    <?php
                } elseif ($partnersCount > 1) {
                    ?>
                    <a href="#menu-c1-parnterspolicy"
                       class="js-header-tab-link b-header-main__link b-header-main__link_parnterspolicy">
                        Партнерские продукты
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="b-header-main__r">
                <div id="menu-main" class="js-header-tab b-header-main__tab b-header-main__tab_main active">
                    <div class="b-header-main__tel">
                        <span>ООО СК «Сбербанк Страхование жизни»</span>
                        <a href="tel:88005555595">8 800 555 55 95</a>
                    </div>
                    <div class="b-header-main__tel">
                        <span>ООО СК «Сбербанк Страхование»</span>
                        <a href="tel:88005555557">8 800 555 55 57</a>
                    </div>
                    <ul class="u-clear-fix b-header-main__list">
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">О нас</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Закупки</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Команда</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Финансовые показатели</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Вакансии</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Страховая документация</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Реестр агентов</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Действия по полису</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Раскрытие информации</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Новости</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="b-link"><span class="b-link__text">Контакты</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php
                foreach ($categories as $category) {
                    if (empty($policyByCat[$category->id])) {
                        continue;
                    }
                    ?><div id="menu-c1<?=$category->code?>" class="js-header-tab b-header-main__tab"><?php
                    if (!empty($policyByCat2[$category->id][\app\models\category\Category2::ONLINE])) {
                        ?><h6>Онлайн-оформление</h6>
                        <ul class="u-clear-fix b-header-main__list b-header-main__list_online"><?php
                        foreach ($policyByCat2[$category->id][\app\models\category\Category2::ONLINE] as $policy) {
                            ?>
                            <li>
                                <a href="<?=\yii\helpers\Url::to(['policy/view', 'slug' => $policy->alias])?>" class="js-header-product-link">
                                    <span class="b-link"><span class="b-link__text"><?=\yii\helpers\Html::encode($policy->title)?></span></span>
                                    <div data-pic="<?=$policy->getPreviewImageUrl()?>" class="js-header-product-get-text hidden">
                                        <?=\yii\helpers\Html::encode($policy->short_text)?>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?></ul><?php
                    }
                    if (!empty($policyByCat2[$category->id][\app\models\category\Category2::OFFLINE])) {
                        ?><h6>Оформление в офисе</h6>
                        <ul class="u-clear-fix b-header-main__list"><?php
                        foreach ($policyByCat2[$category->id][\app\models\category\Category2::OFFLINE] as $policy) {
                            ?>
                            <li>
                                <a href="<?=\yii\helpers\Url::to(['policy/view', 'slug' => $policy->alias])?>" class="js-header-product-link">
                                    <span class="b-link"><span class="b-link__text"><?=\yii\helpers\Html::encode($policy->title)?></span></span>
                                    <div data-pic="<?=$policy->getPreviewImageUrl()?>" class="js-header-product-get-text hidden">
                                        <?=\yii\helpers\Html::encode($policy->short_text)?>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?></ul><?php
                    }
                    ?></div><?php
                }
                ?>
                <?php
                if (!empty($sberPolicy)) {
                    ?><div id="menu-c1-sberpolicy" class="js-header-tab b-header-main__tab"><?php
                        ?><h6>Сотрудникам Сбербанка</h6>
                        <ul class="u-clear-fix b-header-main__list"><?php
                        foreach ($sberPolicy as $policy) {
                            ?>
                            <li>
                                <a href="<?=\yii\helpers\Url::to(['policy/view', 'slug' => $policy->alias])?>" class="js-header-product-link">
                                    <span class="b-link"><span class="b-link__text"><?=\yii\helpers\Html::encode($policy->title)?></span></span>
                                    <div data-pic="<?=$policy->getPreviewImageUrl()?>" class="js-header-product-get-text hidden">
                                        <?=\yii\helpers\Html::encode($policy->short_text)?>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?></ul><?php
                    ?></div><?php
                }
                ?>
                <?php
                if (!empty($partnersPolicy)) {
                    ?><div id="menu-c1-parnterspolicy" class="js-header-tab b-header-main__tab"><?php
                    foreach ($partners as $partner) {
                        ?><h6><?=\yii\helpers\Html::encode($partner->name)?></h6>
                        <ul class="u-clear-fix b-header-main__list"><?php
                        foreach ($partnersPolicy[$partner->id] as $policy) {
                            ?>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['policy/view', 'slug' => $policy->alias]) ?>" class="js-header-product-link">
                                    <span class="b-link"><span class="b-link__text"><?= \yii\helpers\Html::encode($policy->title) ?></span></span>
                                    <div data-pic="<?= $policy->getPreviewImageUrl() ?>" class="js-header-product-get-text hidden">
                                        <?= \yii\helpers\Html::encode($policy->short_text) ?>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?></ul><?php
                    }
                    ?></div><?php
                }
                ?>
            </div>
            <div class="js-header-circle b-header-main__circle">
                <div class="b-header-main__circle__text b-header-main__circle__text-main">
                    Наведите курсор на&nbsp;продукт, чтобы увидеть здесь краткую информацию
                </div>
                <div class="b-header-main__circle_insert">
                    <div class="js-header-circle-insert-pic b-header-main__circle_insert-pic"></div>
                    <div class="js-header-circle-insert-text b-header-main__circle__text"></div>
                </div>
            </div>
        </div>
    </div>
</div>
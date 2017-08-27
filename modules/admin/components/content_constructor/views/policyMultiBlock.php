<?php
if (isset($value) && is_array($value)):
    $count = $count ?? 0;
?>
<section id="how_it_works" class="js-bottom-result-fix-top js-nav-block js-top-result-fix-stop b-product-section">
    <div class="b-wrapper">
        <h3><?= \yii\helpers\Html::encode($value['header']) ?></h3>

        <?php if (!empty($value['text'])): ?>
        <div class="b-product-section__wrapper">
            <?= $value['text'] ?>
        </div>
        <?php endif; ?>

        <?php if (isset($value['lines']) && is_array($value['lines'])):
            $lines = array_values($value['lines']); ?>

        <div class="js-tabs-container b-main-tabs__section">
            <ul class="u-clear-fix b-main-tabs__tabs">
                <?php foreach($lines as $key=>$line): ?>
                <li>
                    <a href="#tab<?= $count . '_' . $key ?>" class="js-tabs b-main-tabs__tabs_link <?= $key ? '' : 'active' ?>"><?= \yii\helpers\Html::encode($line['header']) ?></a>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="b-product-section__wrapper b-main-tabs__result_box">
                <?php foreach($lines as $key=>$line): ?>
                <div id="tab<?= $count . '_' . $key ?>" class="js-tabs-result b-main-tabs__result <?= $key ? '' : 'active' ?>">
                    <?php if ($line['type'] === 'line' && is_array($line['lines'])) :?>
                        <?php foreach (array_values($line['lines']) as $subkey=>$subline): ?>

                            <?php if ($subline['type'] === 'text') :?>
                                <div class="b-text__wrapper">
                                    <?= \app\components\SbrHtmlPurifier::process($subline['text']) ?>
                                </div>

                            <?php elseif ($subline['type'] == 'list' && is_array($subline['lines'])): ?>
                                <div class="b-text__wrapper">
                                    <ul class="js-accordion-single b-accordion b-accordion__list">
                                <?php foreach (array_values($subline['lines']) as $listkey=>$listline): ?>
                                        <li class="js-accordion-item b-accordion__item <?= $listkey ? '' : 'first-active active' ?>">
                                            <div class="js-accordion-link b-accordion__link">
                                                <span class="b-accordion__link_wrapper"><span><?= \yii\helpers\Html::encode($listline['header']) ?></span></span>
                                            </div>
                                            <div class="js-accordion-text b-accordion__text">
                                                <?= \app\components\SbrHtmlPurifier::process($listline['text']) ?>
                                            </div>
                                        </li>
                                <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php elseif ($line['type'] === 'subs' && is_array($line['slides'])):
                        $slides = array_values($line['slides']); ?>
                    <div class="js-tabs-container u-clear-fix b-inside-tabs__section">
                        <ul class="b-inside-tabs__tabs">
                            <?php foreach ($slides as $key2=>$slide): ?>
                            <li>
                                <a href="#tab<?=  $count . '_' . $key.'_'.$key2 ?>" class="js-tabs b-inside-tabs__tabs_link <?= $key2 ? '' : 'active' ?>"><?= \yii\helpers\Html::encode($slide['header']) ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="b-inside-tabs__result_box">
                            <?php foreach ($slides as $key2=>$slide): ?>
                            <div id="tab<?=  $count . '_' . $key.'_'.$key2 ?>" class="js-tabs-result b-inside-tabs__result <?= $key2 ? '' : 'active' ?>">
                                <?php foreach (array_values($slide['lines']) as $subkey=>$subline): ?>

                                    <?php if ($subline['type'] === 'text') :?>
                                            <?= \app\components\SbrHtmlPurifier::process($subline['text']) ?>

                                    <?php elseif ($subline['type'] == 'list' && is_array($subline['lines'])): ?>
                                        <?php if (!empty($subline['header'])): ?>
                                            <h4><?= \yii\helpers\Html::encode($subline['header']) ?></h4>
                                        <?php endif; ?>
                                        <ul class="b-accordion">
                                            <?php foreach (array_values($subline['lines']) as $key3=>$slideLine): ?>
                                                <li class="js-accordion-item b-accordion__item <?= $key3 ? '' : 'first-active active' ?>">
                                                    <a href="#" class="js-accordion-link b-accordion__link"><?= \yii\helpers\Html::encode($slideLine['header']) ?></a>
                                                    <div class="js-accordion-text b-accordion__text">
                                                        <?= \app\components\SbrHtmlPurifier::process($slideLine['text']) ?>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                    <?php endif ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>

<?php
/**
 * @var array $categories
 * @var app\models\node\Video[] $video
 */
?>
<script src="js/common-sort-pages.js"></script>

<section class="b-top__section">
    <div class="b-wrapper">
        <h1>Финансовая грамотность</h1>
        <ul class="u-clear-fix b-common-sort">
            <li class="b-common-sort__item">
                <a href="#sort_all" class="js-common-sort active">Все</a>
            </li>
            <?php
            foreach ($categories as $key => $item) {
                ?>
                <li class="b-common-sort__item">
                    <a href="#category_<?= $key ?>" class="js-common-sort"><?= $item ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>

<section class="js-product-section b-products__section">
    <div class="b-wrapper">
        <div class="js-product-section-append u-clear-fix b-products__section_wrapper">

            <?php
            foreach ($video as $item) {

                $current_categories = [];
                $category_video_ids = $item->getCategoryVideoIds();
                foreach ($category_video_ids as $category_id) {
                    $current_categories[$category_id] = 'category_'.$category_id;
                }
                ?>
                <div data-sort="<?= implode(' ', $current_categories) ?>" class="js-product b-product financial_literacy">
                    <a href="<?= \yii\helpers\Url::toRoute(['video/view', 'slug' => $item->alias]) ?>" class="b-product__main">
                        <div class="b-product__type"></div>
                        <div class="b-product__text">
                            <h4><?=\yii\helpers\Html::encode($item->title)?></h4>
                        </div>
                        <div class="b-product__pic">
                            <div style="background-image: url(//img.youtube.com/vi/<?=\yii\helpers\Html::encode($item->preview_text)?>/0.jpg)"></div>
                        </div>
                    </a>
                    <ul class="u-clear-fix b-product__tags">
                        <?php
                        foreach ($categories as $key => $category) {
                            if (in_array($key, $category_video_ids)) { ?>
                                <li>
                                    <a href="#<?= $current_categories[$key] ?>" class="js-product-tag"><?= $category ?></a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="b-button__box b-button__box_show">
            <a href="#" data-action="/video/listmore?page=" class="js-show-more b-button b-button_yellow">Показать еще</a>
        </div>
    </div>
</section>

<section class="js-sort-visibility b-subscribe__section b-bg">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(i/new/back-images/bg-subscribe.jpg)"></div>
    </div>
    <div class="b-wrapper">
        <div class="b-subscribe__title">
            <h2>Узнавайте все первыми</h2>
            <p>Подпишитесь на рассылку и получайте  персональные предложения, актуальные финансовые советы и познавательные статьи и видео о финансовой граммотности</p>
        </div>
        <form action="" method="POST" id="subscribe_from" class="js-subscribe b-subscribe">
            <div class="u-clear-fix">
                <input type="text" class="js-required b-input" name="subscribe[name]" id="subscribe_name" placeholder="Мое имя">
                <input type="email" class="js-required b-input email" name="subscribe[email]" id="subscribe_email" placeholder="Электронная почта">
            </div>
            <div class="b-button__box">
                <button type="submit" disabled="disabled" class="b-button">Подписаться</button>
            </div>
            <div class="js-subscribe-error b-subscribe__error hidden">
                Возникла ошибка.<br>Повторите попытку позже.
            </div>
        </form>
        <h4 class="js-subscribe-success b-subscribe__success hidden">
            Подписка оформлена.
        </h4>
    </div>
</section>
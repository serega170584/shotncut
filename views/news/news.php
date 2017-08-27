<?php
/**
 * @var array $company_name
 * @var array $company_html_link_address
 * @var app\models\node\News[] $news
 */
?>
<script src="js/common-sort-pages.js"></script>

<section class="b-top__section">
    <div class="b-wrapper">
        <h1>Новости</h1>
        <ul class="u-clear-fix b-common-sort">
            <li class="b-common-sort__item">
                <a href="#sort_all" class="js-common-sort active">Все</a>
            </li>
            <?php
            foreach ($company_name as $key => $item) {
                ?>
                <li class="b-common-sort__item">
                    <a href="#company_<?= $key ?>" class="js-common-sort"><?= $item ?></a>
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
            foreach ($news as $item) {
?>
                <div data-sort="company_<?= $item->rating ?>" class="js-product b-product news">
                    <a href="<?= \yii\helpers\Url::toRoute(['news/view', 'slug' => $item->alias]) ?>" class="b-product__main">
                        <div class="b-product__type"></div>
                        <div class="b-product__text">
                            <h4><?=\yii\helpers\Html::encode($item->title)?></h4>
                            <div class="b-product__date"><?= Yii::$app->formatter->asDatetime($item->created_at, 'd MMMM'); ?></div>
                            <p><?=\app\components\SbrHtmlPurifier::process($item->preview_text)?></p>
                        </div>
                    </a>
                    <ul class="u-clear-fix b-product__tags">
                        <li>
                            <a href="#company_<?= $item->rating ?>" class="js-product-tag"><?= $item->getCompanyName() ?></a>
                        </li>
                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="b-button__box b-button__box_show">
            <a href="#" data-action="/news/listmore?page=" class="js-show-more b-button b-button_yellow">Показать еще</a>
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
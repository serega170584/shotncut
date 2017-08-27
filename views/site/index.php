<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\category\Category[] $strah_category
 * @var \app\models\category\CategoryVideo[] $video_category
 * @var \app\models\node\Node[] $nodes
 */
?>
<script src="js/subscribe.js"></script>
<script src="js/feedback.js"></script>
<script src="js/index.js"></script>

<section class="b-index-top">
    <div class="js-index-carousel b-index-carousel__box">
        <div class="js-index-carousel-item b-index-carousel b-bg">
            <div class="b-bg__pic" style="background-image: url(i/__tmp/bg-travel.jpg)"></div>
            <div class="b-wrapper">
                <div class="b-product-section__wrapper">
                    <h2>Спокойный отдых на&nbsp;природе по&nbsp;цене&nbsp;кофе</h2>
                </div>
                <div class="b-index-carousel__rotate">
                    <div class="b-index-carousel__rotate-wrapper">
                        <div class="b-calc__result_index">
                            <div class="b-calc__result_index-wrapper">
                                <span>Распечатаете полис уже через</span>
                                <b>3 мин</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b-calc__result b-calc__result_bottom calculated">
                    <div class="u-clear-fix b-calc__result_wrapper">
                                <span class="js-calc-result-top-text b-text__bigger">
                                    Защита от клеща<br>на&nbsp;6&nbsp;месяцев
                                </span>
                        <div class="b-calc__result_sum">
                            <span class="b-calc__result_sum-small">от </span><span class="js-calc-result-sum">225</span><span class="b-rub">c</span>
                        </div>
                        <div class="b-button__box">
                            <a href="#" class="b-button b-button_white">Купить полис</a>
                        </div>
                    </div>
                </div>
                <div class="js-index-carousel-dots-text hidden">Защита от клеща</div>
            </div>
        </div>
        <div class="js-index-carousel-item b-index-carousel b-bg">
            <div class="b-bg__pic" style="background-image: url(i/__tmp/bg-product-2.jpg)"></div>
            <div class="b-wrapper">
                <div class="b-product-section__wrapper">
                    <h2>Обеспечение финансовой защиты заемщика по&nbsp;ипотеке</h2>
                </div>
                <div class="b-index-carousel__rotate">
                    <div class="b-index-carousel__rotate-wrapper">
                        <div class="b-calc__result_index">
                            <div class="b-calc__result_index-wrapper">
                                <span>Распечатаете полис уже через</span>
                                <b>3 мин</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b-calc__result b-calc__result_bottom calculated">
                    <div class="u-clear-fix b-calc__result_wrapper">
                                <span class="js-calc-result-top-text b-text__bigger">
                                    Защита от клеща на&nbsp;6&nbsp;месяцев
                                </span>
                        <div class="b-calc__result_sum">
                            <span class="b-calc__result_sum-small">от </span><span class="js-calc-result-sum">225</span><span class="b-rub">c</span>
                        </div>
                        <div class="b-button__box">
                            <a href="#" class="b-button b-button_white">Купить полис</a>
                        </div>
                    </div>
                </div>
                <div class="js-index-carousel-dots-text hidden">Защищённый заёмщик</div>
            </div>
        </div>
    </div>

</section>

<section class="js-sort-section b-index-sort__section">
    <div class="js-sort-section-overlay b-index-sort__section_overlay"></div>

    <div class="b-index-sort__container">
        <div class="u-clear-fix b-wrapper">
            <div class="js-sort-popup u-clear-fix b-index-sort__popup">
                <a href="#" class="js-sort-popup-close b-index-sort__popup_close"></a>
                <div class="js-sort-box b-index-sort__box b-index-sort__box_green b-index-sort__box_big">
                    <div class="b-index-sort">
                        <input checked class="js-sort" type="checkbox" name="category[]" value="all" id="sort_all">
                        <label for="sort_all" class="b-index-sort__label">
                            Программы страхования
                            <span class="b-index-sort__icon"><span></span></span>
                        </label>
                    </div>
                    <?php foreach ($strah_category as $category): ?>
                        <div class="b-index-sort">
                            <input checked class="js-sort" type="checkbox" name="category[]" value="<?=$category->code?>" id="cat_<?=$category->code?>">
                            <label for="cat_<?=$category->code?>" class="b-index-sort__label">
                                <?=yii\helpers\Html::encode($category->name)?>
                                <span class="b-index-sort__icon"><span></span></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="js-sort-box b-index-sort__box b-index-sort__box_big">
                    <div class="b-index-sort">
                        <input checked class="js-sort" type="checkbox" name="video[]" value="all" id="financial_literacy_all">
                        <label for="financial_literacy_all" class="b-index-sort__label">
                            Финансовая грамотность
                            <span class="b-index-sort__icon"><span></span></span>
                        </label>
                    </div>
                    <?php foreach ($video_category as $category): ?>
                        <div class="b-index-sort">
                            <input checked class="js-sort" type="checkbox" name="video[]" value="<?=$category->code?>" id="video_<?=$category->code?>">
                            <label for="video_<?=$category->code?>" class="b-index-sort__label">
                                <?=yii\helpers\Html::encode($category->name)?>
                                <span class="b-index-sort__icon"><span></span></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="js-sort-box b-index-sort__box b-index-sort__box_big">
                    <div class="b-index-sort">
                        <input checked class="js-sort" type="checkbox" name="news[]" value="all" id="news_all">
                        <label for="news_all" class="b-index-sort__label">
                            Новости
                            <span class="b-index-sort__icon"><span></span></span>
                        </label>
                    </div>
                    <div class="b-index-sort">
                        <input checked class="js-sort" type="checkbox" name="news[]" value="0" id="news_0">
                        <label for="news_0" class="b-index-sort__label">
                            Сбербанк страхование
                            <span class="b-index-sort__icon"><span></span></span>
                        </label>
                    </div>
                    <div class="b-index-sort">
                        <input checked class="js-sort" type="checkbox" name="news_2" value="1" id="news_1">
                        <label for="news_1" class="b-index-sort__label">
                            Сбербанк страхование жизни
                            <span class="b-index-sort__icon"><span></span></span>
                        </label>
                    </div>
                </div>
            </div>
            <a href="#" class="js-sort-call-popup b-index-sort__call"></a>
        </div>
    </div>
</section>

<section class="js-product-section b-products__section">
    <div class="b-wrapper">
        <div class="js-product-section-append u-clear-fix b-products__section_wrapper">
            <?=$this->render('productList', ['nodes' => $nodes]);?>
        </div>
        <div class="b-button__box b-button__box_show">
            <a href="#" data-action="/site/listmore?page=" class="js-show-more b-button">Показать еще</a>
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

<section class="b-specs__section">
    <div class="b-wrapper">
        <h2>Спецакции</h2>
        <div class="js-specs-carousel u-clear-fix b-specs__carousel">
            <a href="#" class="b-specs">
                <div class="b-specs__pic" style="background-image: url(i/__tmp/specs-1.jpg)"></div>
                <div class="b-specs__text">
                    <h4>Бонусы «Спасибо» всем</h4>
                </div>
                <span class="b-link"><span class="b-link__text">spasibosberbank.ru</span></span>
            </a>
            <a href="#" class="b-specs b-specs_white">
                <div class="b-specs__pic" style="background-image: url(i/__tmp/bg-product.jpg)"></div>
                <div class="b-specs__text">
                    <h4>Сохрани жизнь природы</h4>
                    <p>Национальный проект Сбербанк Страхования Жизни</p>
                </div>
                <span class="b-link"><span class="b-link__text">sohraniprirodu.ru</span></span>
            </a>
            <a href="#" class="b-specs">
                <div class="b-specs__pic" style="background-image: url(i/__tmp/specs-2.jpg)"></div>
                <div class="b-specs__text">
                    <h4>Экономим с другом</h4>
                    <p>Программа привилегий сотрудников</p>
                </div>
                <span class="b-link"><span class="b-link__text">s-drugom.ru</span></span>
            </a>
            <a href="#" class="b-specs">
                <div class="b-specs__pic" style="background-image: url(i/__tmp/specs-1.jpg)"></div>
                <div class="b-specs__text">
                    <h4>Бонусы «Спасибо» всем</h4>
                </div>
                <span class="b-link"><span class="b-link__text">spasibosberbank.ru</span></span>
            </a>
            <a href="#" class="b-specs b-specs_white">
                <div class="b-specs__pic" style="background-image: url(i/__tmp/bg-product.jpg)"></div>
                <div class="b-specs__text">
                    <h4>Сохрани жизнь природы</h4>
                    <p>Национальный проект Сбербанк Страхования Жизни</p>
                </div>
                <span class="b-link"><span class="b-link__text">sohraniprirodu.ru</span></span>
            </a>
            <a href="#" class="b-specs">
                <div class="b-specs__pic" style="background-image: url(i/__tmp/specs-2.jpg)"></div>
                <div class="b-specs__text">
                    <h4>Экономим с другом</h4>
                    <p>Программа привилегий сотрудников</p>
                </div>
                <span class="b-link"><span class="b-link__text">s-drugom.ru</span></span>
            </a>
        </div>
    </div>
</section>



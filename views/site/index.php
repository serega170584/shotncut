<?php
$this->registerJs('alert("123");', yii\web\View::POS_END);
?>

<a href="#" class="js-index-scroll b-index-scroll">
    Подробнее
    <span class="b-index-scroll__i"></span>
</a>

<div class="js-content b-content">
    <div class="js-index-marker"></div>

    <section class="js-index-title js-window-height b-index-title">
        <div class="b-wrapper">
            <div class="b-title">
                <?= \bizley\quill\Quill::widget(['name' => 'editor',
                    'value' => 'aasdasdasdasdasdasd',
                    'toolbarOptions' => [['bold', 'italic', 'underline'], [['color' => []]]]
                ]) ?>
                <h1>Продакшн студия</h1>
                <p>Корпоративное, вирусное и рекламное видео для компаний из России, Англии, США и Европы.</p>
            </div>
        </div>
    </section>
    <div class="js-bg-animation-stop"></div>

    <section class="b-index-product__section">
        <div class="b-wrapper">
            <div class="js-index-product-box u-clear-fix b-index-product__box">
                <a href="#" class="js-index-product b-index-product advertising">
                    <div class="b-index-product__line b-index-product__line_1"></div>
                    <div class="b-index-product__line b-index-product__line_2"></div>
                    <div class="b-index-product__line b-index-product__line_3"></div>
                    <div class="b-index-product__line b-index-product__line_4"></div>
                    <div class="b-index-product__text">
                        <h4>Реклама</h4>
                        <p>Текст который будет описывать данный топик</p>
                    </div>
                </a>
                <a href="#" class="js-index-product b-index-product long documentary">
                    <div class="b-index-product__line b-index-product__line_1"></div>
                    <div class="b-index-product__line b-index-product__line_2"></div>
                    <div class="b-index-product__line b-index-product__line_3"></div>
                    <div class="b-index-product__line b-index-product__line_4"></div>
                    <div class="b-index-product__text">
                        <h4>Корпоративное видео</h4>
                        <p>Текст который будет описывать данный топик</p>
                    </div>
                </a>
                <a href="#" class="js-index-product b-index-product food">
                    <div class="b-index-product__line b-index-product__line_1"></div>
                    <div class="b-index-product__line b-index-product__line_2"></div>
                    <div class="b-index-product__line b-index-product__line_3"></div>
                    <div class="b-index-product__line b-index-product__line_4"></div>
                    <div class="b-index-product__text">
                        <h4>Food-съемка</h4>
                        <p>Текст который будет описывать данный топик</p>
                    </div>
                </a>
                <a href="#" class="js-index-product b-index-product long nocomers">
                    <div class="b-index-product__line b-index-product__line_1"></div>
                    <div class="b-index-product__line b-index-product__line_2"></div>
                    <div class="b-index-product__line b-index-product__line_3"></div>
                    <div class="b-index-product__line b-index-product__line_4"></div>
                    <div class="b-index-product__text">
                        <h4>Некоммерческое видео</h4>
                        <p>Текст который будет описывать данный топик</p>
                    </div>
                </a>
                <a href="#" class="js-index-product b-index-product fashion">
                    <div class="b-index-product__line b-index-product__line_1"></div>
                    <div class="b-index-product__line b-index-product__line_2"></div>
                    <div class="b-index-product__line b-index-product__line_3"></div>
                    <div class="b-index-product__line b-index-product__line_4"></div>
                    <div class="b-index-product__text">
                        <h4>Fashion</h4>
                        <p>Текст который будет описывать данный топик</p>
                    </div>
                </a>
                <a href="#" class="js-index-product b-index-product all">
                    <div class="b-index-product__line b-index-product__line_1"></div>
                    <div class="b-index-product__line b-index-product__line_2"></div>
                    <div class="b-index-product__line b-index-product__line_3"></div>
                    <div class="b-index-product__line b-index-product__line_4"></div>
                    <div class="b-index-product__text">
                        <h4>Другое</h4>
                        <p>Текст который будет описывать данный топик</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="js-clients-section b-clients__section">
        <div class="b-wrapper">
            <h2>Наши клиенты</h2>
            <div class="js-clients-carousel b-clients-carousel">
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-1.png" alt="Floris">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-2.png" alt="Wilmax England">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-3.png" alt="Checkroom">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-4.svg" alt="Простокосмос">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-5.png" alt="De sent daniel">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-6.png" alt="Brow bar">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-7.png" alt="Red wine design">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-8.png" alt="Hook">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-9.png" alt="Сделано руками">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-10.png" alt="Wine room">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-11.png" alt="Stylpasta">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-12.png" alt="Fuga">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-13.png" alt="Rакета">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-14.png" alt="Shark taxi">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-15.png" alt="Just wok">
                        </a>
                    </div>
                </div>
                <div class="b-clients-carousel__item">
                    <div class="b-table">
                        <a href="#">
                            <img src="i/clients/client-16.svg" alt="Treblab">
                        </a>
                    </div>
                </div>
            </div>
            <div class="js-clients-bg b-clients__bg"></div>
        </div>
    </section>
</div>
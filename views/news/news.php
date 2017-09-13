<?php
/** @var app\models\node\News[] $news */
?>

<div class="js-content b-content">
    <section class="b-top__section">
        <div class="b-wrapper">
            <div class="b-title">
                <h1>Блог</h1>
                <p>Новости и события из жизни Shot’n’Cut</p>
            </div>
        </div>
    </section>

    <section class="b-blog__section">
        <div class="b-wrapper">
            <div class="js-blog-append u-clear-fix b-blog__box">
                <?php
                foreach ($news as $item) {
                    ?>
                    <a href="<?= \yii\helpers\Url::toRoute(['news/view', 'slug' => $item->alias]) ?>" class="b-blog">
                        <span class="b-blog__date"><?= Yii::$app->formatter->asDatetime($item->created_at, 'd MMMM'); ?></span>
                        <h3><?=\yii\helpers\Html::encode($item->title)?></h3>
                        <div class="js-blog-pic b-blog__pic">
                            <div class="b-blog__pic_img" style="background-image: url(<?= $item->getPreviewThumbUrl() ?>)"></div>
                            <div class="b-blog__pic_line b-blog__pic_line_1"></div>
                            <div class="b-blog__pic_line b-blog__pic_line_2"></div>
                            <div class="b-blog__pic_line b-blog__pic_line_3"></div>
                            <div class="b-blog__pic_line b-blog__pic_line_4"></div>
                        </div>
                        <div class="b-blog__text">
                            <?=\app\components\SbrHtmlPurifier::process($item->preview_text)?>
                        </div>
                        <div class="b-button__box">
                            <span class="b-button b-button_small">Читать</span>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="b-button__box b-button__box_more">
                <a href="#" data-action="http://index.php" class="js-show-blog b-button">Показать еще</a>
            </div>
        </div>
    </section>

</div>
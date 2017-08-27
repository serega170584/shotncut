<?php
use app\models\category\CategoryVideo;
?>
<div id="video-popup" class="b-popup popup_sb2 b-news-popup g-hidden b-art-video-popup" data-popup="true" data-popup-descriptor="news-article"
     data-popup-identificator="yclpveyjlv">
    <span class="b-popup-closer-background" data-popup-closer="true"></span>
    <div class="b-popup-inside">
        <div class="b-popup-controls">
            <button class="b-popup-controls-button b-popup-controls-close-button" data-popup-closer="true">Закрыть</button>
        </div>
        <article class="b-news-article g-cleared">
            <div class="video-popup-inner">
                <h2 class="js__nw_cat"></h2>
                <div class="video-popup-media">
                    <img class="js__vid_img" src="" alt="">
                    <div class="mediav js__vid_media"></div>
                </div>
                <h4 class="video-popup-media-title js__nw_title"></h4>
                <h4 class="video-popup-text-title js__nw_title"></h4>
                <div class="text"></div>
            </div>
        </article>
        <div class="block__inner_clearfix"></div>
    </div>
</div>


<div class="videos_hidden_content">
    <?php
    foreach ($videos as $item) { ?>
        <div class="news_item" data-id="<?=$item->id?>">
            <div class="news_item__title"><?=$item->title?></div>
            <div class="news_item__cat"><?= $item->vidCategory ?></div>
            <div class="news_item__preview_text"><?=$item->preview_text?></div>
            <div class="news_item__detail_text"><?=$item->detail_text?></div>
            <div class="news_item__date"><?php echo Yii::$app->formatter->asDate($item->created_at, 'php:d F Y'); ?></div>
        </div>
    <?php } ?>
</div>
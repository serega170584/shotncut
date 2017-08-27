<?php
use app\models\node\Node;
?>
<div id="news-popup" class="b-popup popup_sb2 b-news-popup g-hidden" data-popup="true" data-popup-descriptor="news-article" data-popup-identificator="yclpveyjlv">
    <span class="b-popup-closer-background" data-popup-closer="true"></span>
    <div class="b-popup-inside">
        <div class="b-popup-controls">
            <button class="b-popup-controls-button b-popup-controls-previous-button js__prev_news" style="display: inline-block;">Предыдущая новость</button>
            <button class="b-popup-controls-button b-popup-controls-next-button js__next_news" style="display: inline-block;">Следующая новость</button>
            <button class="b-popup-controls-button b-popup-controls-close-button" data-popup-closer="true">Закрыть</button>
        </div>
        <article class="b-news-article g-cleared">
            <div class="article_im">
                <h1 class="js__nw_title"></h1>
                <div class="soc">
                    <div class="soc_inn">
                        <div class="date"></div>
                        <div class="tx">Поделиться</div>
                        <div class="links">
                            <?php if (0) { ?>
                                <!--
                                <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                <script src="//yastatic.net/share2/share.js"></script>
                                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki" data-title="" data-description="" data-url="" data-image=""></div>
    -->
                                <!--
                                <a onclick="" class="soc_ico_vk" href="#"></a>
                                <a onclick="" class="soc_ico_fb" href="#"></a>
                                <a onclick="" class="soc_ico_odn" href="#"></a>
                                -->
                                <?php
                            } ?>
                        </div>
                        <div class="company"></div>
                    </div>
                </div>
            </div>
            <div class="text"></div>
        </article>
        <div class="block__inner_clearfix"></div>
    </div>
</div>


 
<div class="news_hidden_content">
    <?php
    $comp = Node::getCompany();
    foreach ($news as $item) { ?>
        <div class="news_item" data-id="<?=$item->id?>">
            <div class="news_item__company"><?='ООО '.$comp[intval($item->rating)]?></div>
            <div class="news_item__title"><?=$item->title?></div>
            <div class="news_item__preview_text"><?=$item->title?></div>
            <div class="news_item__preview_text2"><?=\yii\helpers\StringHelper::truncate(strip_tags($item->detail_text),100,'...');?></div>
            <div class="news_item__detail_text"><?=$item->detail_text?></div>
            <div class="news_item__date"><?php echo Yii::$app->formatter->asDate($item->created_at, 'php:d F Y'); ?></div>
            <?php if ($item->previewThumbUrl) { ?>
                <img src="<?=$item->previewThumbUrl?>" class="previewThumbUrl" alt="">
                <?php
            } ?>
            <?php if ($item->detailThumbUrl) { ?>
                <img src="<?=$item->detailThumbUrl?>" class="detailThumbUrl" alt="">
                <?php
            } ?>
        </div>
    <?php } ?>
    <div class="homeurl" data-url="http://<?=$_SERVER['HTTP_HOST']?>"></div>

</div>
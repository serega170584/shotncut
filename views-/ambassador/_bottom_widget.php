<?php
use app\models\node\Article;
use yii\bootstrap\Html;

if($article->category): ?>
    <?php

    $articles = Article::find()
        ->active()
        ->byCategory($article->category_id)
        ->notId($article->id)
        ->limit(2)
        ->all();
    if($articles):
    ?>
    <div class="si-related-articles">
        <div class="container container_s_m">
            <div class="si-related-articles__topbar">
                <div class="r r_a_c">
                    <div class="r__c">
                        <div class="si-related-articles__more"><span>Другие статьи из темы </span>
                            <a href="#" class="si-link si-link_theme_action"><?php echo $article->category->name; ?></a>
                        </div>
                    </div>
                    <div class="r__c r__c_r">
                        <?php //<div class="si-stats-button si-stats-button_type_rss"><span class="si-stats-button__text">Подписаться на тему:</span><span class="si-stats-button__icon"></span></div>?>
                    </div>
                </div>
            </div>
        </div>
        <div class="si-related-articles__list">
            <?php foreach($articles as $a): ?>
                <?php
                $image_url = $article->detailPicture ?
                    Yii::$app->imager->getThumbUrl($article->detailPicture->fsPath, 2480, 1280) : null;

                $date_created = Yii::$app->formatter->asDate($article->created_at, 'php:j F');
                ?>
            <div style="<?php if($image_url): ?>background-image: url('<?php echo $image_url; ?>')<?php endif; ?>" class="si-related-article">
                <div class="container container_s_m">
                    <div class="si-related-article__name"><?php echo Html::encode($a->title); ?></div>
                    <div class="si-related-article__stats">
                        <div class="r r_s_s r_a_b">
                            <div class="r__c">
                                <div class="si-article-stats si-article-stats_theme_a">
                                    <div class="si-article-stats__item si-article-stats__item_type_comments"><a href="#" class="si-article-stats__link"><span class="si-article-stats__icon"></span><span class="si-article-stats__counter">24</span></a></div>
                                    <div class="si-article-stats__item si-article-stats__item_type_likes"><a href="#" class="si-article-stats__link"><span class="si-article-stats__icon"></span><span class="si-article-stats__counter">234</span></a></div>
                                </div>
                            </div>
                            <div class="r__c">
                                <div class="si-related-article__author"><?php echo Html::encode($a->author->name); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
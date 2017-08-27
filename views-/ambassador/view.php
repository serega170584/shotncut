<?php
/** @var \app\models\node\Article $article */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->params['breadcrumbs'] = [
    [
        'label' => 'Статьи',
        'url' => ['/ambassador', 'id' => $article->author->user_id]
    ],
    [
        'label' => $article->title
    ]
];

$user_profile = $article->author;
$avatar_img = Yii::$app->imager->getThumbImg($user_profile->avatarImage->fsPath, 220, 220);
$date_created = Yii::$app->formatter->asDate($article->created_at, 'php:j F');

$detail_img_url = $article->detailPicture ?
    Yii::$app->imager->getThumbUrl($article->detailPicture->fsPath, 2560, 1600) : null;


//add yandex share lib
$this->registerJsFile('//yastatic.net/share2/share.js');
?>
<div class="si-layout__body si-layout__body_accentuated">
    <div style="<?php echo $detail_img_url ? "background-image: url('{$detail_img_url}')" : ''; ?>" class="si-article-hero">
        <div class="container container_s_m">

            <?php echo $this->render('/layouts/_breadcrumbs'); ?>
            <div class="si-article-hero__user">
                <div class="si-user">
                    <a href="<?php echo \yii\helpers\Url::to(['/ambassador', 'id' => $article->author->user_id]); ?>">
                        <div class="si-user__avatar">
                            <div class="si-avatar si-avatar_s_l"><?php echo $avatar_img; ?></div>
                        </div>
                        <div class="si-user__sentence">
                            <div class="si-article-hero__user-name"><?php echo Html::encode($user_profile->name)?></div>
                            <div class="si-article-hero__counter"><?php echo Html::encode($user_profile->countArticles); ?> публикаций</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="si-article-hero__name"><?php echo Html::encode($article->title); ?></div>
            <div class="si-article-hero__bottom">
                <div class="r r_s_s r_a_b">
                    <div class="r__c">
                        <div class="si-article-hero__published"><?php echo Html::encode($date_created); ?></div>
                    </div>
                    <div class="r__c">
                        <div class="si-article-stats si-article-stats_theme_a">
                            <div class="si-article-stats__item si-article-stats__item_type_comments"><a href="#" class="si-article-stats__link"><span class="si-article-stats__icon"></span><span class="si-article-stats__counter">24</span></a></div>
                        </div>
                    </div>
                    <div class="r__c">
                        <div data-services="vkontakte,facebook,odnoklassniki" data-bare="true" class="si-socials ya-share2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container container_s_m">
        <div class="r r_s_m r_a_b">
            <div class="r__c r__c_md_3">
                <?php echo $this->render('_left_widget', ['article' => $article]); ?>
            </div>
            <div class="r__c r__c_md_8">
                <div class="si-article__sentence">
                    <?php echo HtmlPurifier::process($article->preview_text); ?>
                </div>
                <div class="si-article__wysiwyg">
                    <?php echo $article->renderArticle($this); ?>
                    <?php if($article->tags): ?>
                    <div class="si-article__tags">
                        <div class="si-tags si-tags_theme_light">
                            <?php foreach($article->tags as $tag): ?>
                                <div class="si-tags__item">
                                    <a href="#" class="si-tags__link"><div class="si-tags__text"><?php echo Html::encode($tag->name); ?></div></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="si-article-share">
                        <div class="r r_a_c">
                            <div class="r__c">
                                <div class="si-article-share__caption">Поделиться статьей:</div>
                            </div>
                            <div class="r__c">
                                <div data-services="vkontakte,facebook,odnoklassniki" data-bare="true" data-size="l" class="si-socials ya-share2"></div>
                            </div>
                        </div>
                    </div>
                    <?php /*<div class="si-article-replies">
                        <div class="si-article-replies__head">
                            <div class="r r_a_c">
                                <div class="r__c">
                                    <div class="si-article-replies__caption">Комментарии</div>
                                </div>
                                <div class="r__c r__c_r">
                                    <div class="r r_s_s">
                                        <div class="r__c">
                                            <div class="si-stats-button si-stats-button_type_likes"><span class="si-stats-button__icon"></span><span class="si-stats-button__text">32</span></div>
                                        </div>
                                        <div class="r__c">
                                            <div class="si-stats-button si-stats-button_type_comments"><span class="si-stats-button__icon"></span><span class="si-stats-button__text">12</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="si-article-replies__body">
                            <div class="si-replies">
                                <div class="si-replies__item">
                                    <div class="si-replies__avatar">
                                        <div class="si-avatar si-avatar_s_m"><img src="//unsplash.it/160/160/?random" alt=""></div>
                                    </div>
                                    <div class="si-replies__body">
                                        <div class="si-replies__username">Лариса Горячева</div>
                                        <div class="si-replies__text">Где, как не в Бразилии, можно попробовать настоящий кофе?</div>
                                        <div class="si-replies__details">
                                            <div class="r r_s_s">
                                                <div class="r__c">21 июля в 23:35</div>
                                                <div class="r__c"><a href="#">Ответить</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="si-replies__item">
                                    <div class="si-replies__avatar">
                                        <div class="si-avatar si-avatar_s_m"><img src="//unsplash.it/160/160/?random&amp;id=2" alt=""></div>
                                    </div>
                                    <div class="si-replies__body">
                                        <div class="si-replies__username">Лариса Горячева</div>
                                        <div class="si-replies__text">Министерство туризма и частный сектор инвестирует в инфраструктуру и развитие туризма в Бразилии. Это видно по хорошим дорогам, увеличению рабочих мест в туризме деревушки. А также серфинг, рыбалка, рафтинг, наблюдение за китами и ещё много чего интересного. </div>
                                        <div class="si-replies__details">
                                            <div class="r r_s_s">
                                                <div class="r__c">21 июля в 23:35</div>
                                                <div class="r__c"><a href="#">Ответить</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="si-replies">
                                <div class="si-replies__item">
                                    <div class="si-replies__avatar">
                                        <div class="si-avatar si-avatar_s_m"><img src="//unsplash.it/160/160/?random&amp;id=2" alt=""></div>
                                    </div>
                                    <div class="si-replies__body">
                                        <div class="si-replies__username">Лариса Горячева</div>
                                        <div class="si-replies__text">Министерство туризма и частный сектор инвестирует в инфраструктуру и развитие туризма в Бразилии. Это видно по хорошим дорогам, увеличению рабочих мест в туризме деревушки. А также серфинг, рыбалка, рафтинг, наблюдение за китами и ещё много чего интересного. </div>
                                        <div class="si-replies__details">
                                            <div class="r r_s_s">
                                                <div class="r__c">21 июля в 23:35</div>
                                                <div class="r__c"><a href="#">Ответить</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="si-article-join">
                                <div class="si-layout-section si-layout-section_s_xs">
                                    <div class="si-article-join__caption">Присоединяйтесь к семье SberLife</div>
                                    <div class="si-article-join__text">чтобы участвовать в обсуждениях</div>
                                </div>
                                <div class="si-layout-section si-layout-section_s_xs"><a href="#" class="sb-button sb-button_s_m sb-button_theme_green"><span style="text-transform: none;" class="sb-button__text">Стать участником</span></a></div>
                                <div class="si-layout-section si-layout-section_s_xs"><a href="#" class="si-link si-link_theme_action"><span class="si-link__text">Залогиниться</span></a></div>
                            </div>
                        </div>
                    </div>*/?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->render('_bottom_widget', ['article' => $article]); ?>
</div>
<?php
/** @var \yii\web\View $this */
/** @var \app\modules\admin\models\User $ambassador */

use yii\bootstrap\Html;
use yii\helpers\Json;

$this->params['breadcrumbs'] = [
    [
        'label' => 'Авторы',
        'url' => ['/ambassador']
    ],
    [
        'label' => $ambassador->profile->name
    ]
];

$this->title = 'Статьи - '.$ambassador->profile->name;

$cover_img_url = $ambassador->profile->coverImage ?
    Yii::$app->imager->getThumbUrl($ambassador->profile->coverImage->fsPath, 700, 528) : null;

$cover_img_url = Html::encode($cover_img_url);

//add yandex share lib
$this->registerJsFile('//yastatic.net/share2/share.js');

$this->registerJs("
    window.data = ".Json::encode(['author' => $ambassador->profile]).";
", \yii\web\View::POS_HEAD);

?>
<div class="si-layout__body si-layout__body_accentuated">
    <div ng-controller="EditorController as vm" class="si-container">
        <?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <div class="si-spacer si-spacer_s_m">
            <div class="r r_s_m">
                <div class="r__c r__c_md_8">
                    <div class="si-editor-person" style="<?php echo $cover_img_url ? "background-image: url({$cover_img_url})" : '' ?>">
                        <div class="si-editor-person__content">
                            <div class="si-editor-person__name"><?php echo strtr(Html::encode($ambassador->profile->name), [' ' => '<br>']); ?></div>
                            <div class="si-editor-person__additional">
                                <div class="r r_s_m r_a_c">
                                    <?php if($ambassador->profile->status): ?>
                                        <div class="r__c">
                                            <div class="si-editor-person__qoute">“<?php echo Html::encode($ambassador->profile->status); ?>”</div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="r__c r__c_r">
                                        <div data-services="vkontakte,facebook,odnoklassniki" data-bare="true" class="si-socials ya-share2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="r__c r__c_md_4">
                    <div class="si-editor-details">
                        <?php if($ambassador->profile->location): ?>
                        <div class="si-editor-details__r si-editor-details__r_data">
                            <div class="si-editor-details__c">Город:</div>
                            <div class="si-editor-details__d"><?php echo Html::encode($ambassador->profile->location); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($ambassador->profile->birth_date): $birth_date = Yii::$app->formatter->asDate($ambassador->profile->birth_date, 'php:j F, Y г.'); ?>
                        <div class="si-editor-details__r si-editor-details__r_data">
                            <div class="si-editor-details__c">Дата рождения:</div>
                            <div class="si-editor-details__d"><?php echo $birth_date; ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($ambassador->profile->tags): ?>
                        <div class="si-editor-details__r si-editor-details__r_interests">
                            <div class="si-editor-details__c">Интересы:</div>
                            <div class="si-editor-details__d">

                                <div class="si-tags si-tags_theme_dark">
                                    <?php foreach($ambassador->profile->tags as $tag): ?>
                                        <div class="si-tags__item"><a href="#" class="si-tags__link">
                                                <div class="si-tags__text"><?php echo Html::encode($tag->name); ?></div></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($ambassador->profile->bio): ?>
                        <div class="si-editor-details__r si-editor-details__r_text">
                            <div class="si-editor-details__c">О себе:</div>
                            <div class="si-editor-details__d"><?php echo Html::encode($ambassador->profile->bio); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="si-spacer si-spacer_s_m">
            <div class="si-editor-filter">
                <form class="si-editor-filter__form r r_s_m">
                    <div class="si-editor-filter__left r__c">
                        <div class="si-editor-search">
                            <div class="si-editor-search__control">
                                <div tags="true" placeholder="Выберите теги" url="/api/tags?type=article" class="si-select-ajax si-select-ajax_theme_a">
                                    <select multiple ng-model="vm.tags" ng-change="vm.filter()">
                                    </select>
                                </div>
                                <button type="submit" class="si-editor-search__action"></button>
                            </div>
                        </div>
                    </div>
                    <div class="si-editor-filter__right r__c">
                        <div class="si-select si-select_theme_a">
                            <select ng-model="vm.option" ng-change="vm.filter()" ng-options="option.name for option in vm.options track by option.id"></select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="si-spacer si-spacer_s_m">
            <div isotope-container class="si-isotope si-isotope__container">
                <div ng-repeat="article in vm.articles | orderBy:vm.option.id" isotope-item style="height: 560px;" class="si-isotope__item si-isotope__item_s_s">
                    <si-editor-article data="article"></si-editor-article>
                </div>
            </div>
        </div>
        <div class="si-spacer si-spacer_s_m">
            <div ng-hide="vm.isEnd()" class="si-layout-section si-layout-section_a_c"><a href="#" ng-click="vm.nextPage()" class="sb-button sb-button_s_m sb-button_theme_a"><span class="sb-button__text">Загрузить еще</span></a></div>
        </div>
    </div>
</div>
<?/*
<div class="si-layout__body si-layout__body_accentuated">
    <div class="si-layout-section si-layout-section_s_s">
        <div class="container container_s_m">
            <?php echo $this->render('/layouts/_breadcrumbs'); ?>
        </div>
    </div>
    <div class="si-layout-section si-layout-section_s_s">
        <div class="container container_s_m">
            <div class="r r_s_m">
                <div class="r__c r__c_md_8">
                    <div class="si-editor-person" style="<?php echo $cover_img_url ? "background-image: url({$cover_img_url})" : '' ?>">
                        <div class="si-editor-person__content">
                            <div class="si-editor-person__name"><?php echo strtr(Html::encode($ambassador->profile->name), [' ' => '<br>']); ?></div>
                            <div class="si-editor-person__additional">
                                <div class="r r_s_m r_a_c">
                                    <?php if($ambassador->profile->status): ?>
                                    <div class="r__c">
                                        <div class="si-editor-person__qoute">“<?php echo Html::encode($ambassador->profile->status); ?>”</div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="r__c r__c_r">
                                        <div data-services="vkontakte,facebook,odnoklassniki" data-bare="true" class="si-socials ya-share2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="r__c r__c_md_4">
                    <div class="si-editor-details">
                        <?php if($ambassador->profile->location): ?>
                        <div class="si-editor-details__r">
                            <div class="si-editor-details__c">Город:</div>
                            <div class="si-editor-details__d"><?php echo Html::encode($ambassador->profile->location); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($ambassador->profile->birth_date): $birth_date = Yii::$app->formatter->asDate($ambassador->profile->birth_date, 'php:j F, Y г.'); ?>
                        <div class="si-editor-details__r">
                            <div class="si-editor-details__c">Дата рождения:</div>
                            <div class="si-editor-details__d"><?php echo $birth_date; ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($ambassador->profile->tags): ?>
                        <div class="si-editor-details__r">
                            <div class="si-editor-details__c">Интересы:</div>
                            <div class="si-editor-details__d">
                                <div class="si-tags si-tags_theme_dark">
                                    <?php foreach($ambassador->profile->tags as $tag): ?>
                                    <div class="si-tags__item"><a href="#" class="si-tags__link">
                                            <div class="si-tags__text"><?php echo Html::encode($tag->name); ?></div></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($ambassador->profile->bio): ?>
                        <div class="si-editor-details__r">
                            <div class="si-editor-details__c">О себе:</div>
                            <div class="si-editor-details__d"><?php echo Html::encode($ambassador->profile->bio); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div ng-controller="EditorController">
        <div class="si-layout-section si-layout-section_s_s">
            <div class="container container_s_m">
                <form ng-submit="filter()">
                    <div class="r r_s_m">
                        <div class="r__c r__c_md_10">
                            <div class="si-editor-search">
                                <div class="si-editor-search__control">
                                    <div tags="true" placeholder="Выберите теги" url="/api/tags?type=article" class="si-select-ajax si-select-ajax_theme_a">
                                        <select multiple ng-model="tags" ng-change="filter()">
                                        </select>
                                    </div>
                                    <button type="submit" class="si-editor-search__action"></button>
                                </div>
                            </div>
                        </div>
                        <div class="r__c r__c_md_2">
                            <div class="si-select si-select_theme_a">
                                <select ng-model="order" ng-change="filter()">
                                    <option value="created_at">По дате</option>
                                    <option value="rating">По рейтингу</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="si-layout-section si-layout-section_s_s">
            <div class="container container_s_m">
                <div class="r r_s_m">
                    <div class="r__c r__c_md_4" ng-repeat="article in articles | orderBy:'order'" ng-show="articles.length">
                        <a href="{{article.url}}" class="si-post-card si-post-card_has_author">
                            <div class="si-post-card__head">
                                <div class="si-post-card__background" ng-style="{'background-image': 'url('+article.previewThumbUrl+')'}"></div>
                                <div class="si-post-card__overlay"></div>
                                <div class="si-post-card__tag">
                                    <span class="si-post-card__tag-icon si-post-card__tag-icon_category_{{article.category.code}}"></span>
                                    <span class="si-post-card__tag-text" ng-bind="article.category.name"></span>
                                </div>
                            </div>
                            <div class="si-post-card__body">
                                <div class="si-post-card__caption" ng-bind="article.title"></div>
                                <div class="si-post-card__text" ng-bind-html="article.preview_text"></div>
                            </div>
                            <div class="si-post-card__footer">
                                <div class="r r_s_m r_a_b">
                                    <div class="r__c">
                                        <div class="si-post-card__timestamp">{{article.created_at | dateToISO | date:'d MMMM yyyy'}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="si-post-card__author">
                                <div class="si-post-card__author-avatar">
                                    <img ng-src="{{article.author.avatar_image_url}}" alt="" />
                                </div>
                                <div class="si-post-card__author-name" ng-bind="article.author.name"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="si-layout-section si-layout-section_s_m si-layout-section_a_c">
                <div class="container container_s_m">
                    <a href="#" class="sb-button sb-button_s_m sb-button_theme_a" ng-hide="isEnd()" ng-click="nextPage()" ><span class="sb-button__text">Загрузить еще</span></a>
                </div>
            </div>
        </div>
    </div>
</div>*/?>

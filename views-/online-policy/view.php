<?php
/** @var \app\models\node\Policy $model */
$html = $model->renderArticle($this);


$lnk1 = '';
if (trim(@$model->link)) { 
    $lnk1 = '<a href="'.@$model->link.'" class="sb-button sb-button_s_m sb-button_theme_white"><span class="sb-button__text">Оформить 
    полис</span></a>';
} 

$html = str_replace('[[link1]]', $lnk1, $html);


 


$lnk2 = '';
if (trim(@$model->link2)) {
    $lnk2 = '<a href="'.@$model->link2.'" class="sb-button sb-button_s_m sb-button_theme_white policy__sb-button_prod"><span 
    class="sb-button__text">Продлить полис</span></a>';
}
$html = str_replace('[[link2]]', $lnk2, $html);

?>
<div class="si-layout__body">
    <?php echo $html; ?>
    <div class="si-good-section">
        <div class="container container_s_m">
            <div class="si-layout-section">
                <div class="si-good-section-update">
                    <span class="si-good-section-update__c">Дата обновления сведений на странице: </span>
                    <span class="si-good-section-update__d"><?php echo Yii::$app->formatter->asDate($model->updated_at, 'php:d F, Y в H:i'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if (0) { ?>
    <div class="si-layout__body">
        <?php echo \app\components\widgets\LeftMenuPolicyWidget::widget([
            'items' => !empty($this->params['leftMenuItems']) ? $this->params['leftMenuItems'] : []
        ]); ?>
        <div style="<?php if($main_image_url): ?> background-image: url('<?php echo Html::encode($main_image_url)?>')<?php endif; ?>" class="si-good-section si-good-section-hero">
            <div class="container container_s_m">
                <div class="si-good-section-hero__overlay"></div>
                <div class="si-good-section-hero__content">
                    <div class="si-good-section-hero__caption"><?php echo Html::encode($model->title); ?></div>
                    <div class="si-good-section-hero__text"><?php echo Html::encode(strip_tags($model->preview_text)); ?></div>
                    <div class="si-good-section-hero__action"><a href="#" class="sb-button sb-button_s_m sb-button_theme_white"><span class="sb-button__text">Оформить полис</span></a></div>
                </div><a href="#" class="si-good-section__anchor"></a>
            </div>
        </div>
        <?php echo $policy_content; ?>
        <div class="si-good-section">
            <div class="container container_s_m">
                <div class="si-layout-section">
                    <div class="si-good-section-update">
                        <span class="si-good-section-update__c">Дата обновления сведений на странице: </span>
                        <span class="si-good-section-update__d"><?php echo Yii::$app->formatter->asDate($model->updated_at, 'php:d F, Y в H:i'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/ng-template" id="siGoodAccordionTemplate">
        <div ng-transclude ng-cloack class="si-good-accordion"></div>
    </script>
    <script type="text/ng-template" id="siGoodAccordionPaneTemplate">
        <div ng-class="{'active': active}" ng-transclude class="si-good-accordion__pane"></div>
    </script>
    <script type="text/ng-template" id="siGoodTabsTemplate">
        <div class="si-good-tabs">
            <div class="r r_s_m">
                <div class="r__c r__c_md_4">
                    <div class="si-good-tabs-nav">
                        <div ng-repeat="tab in tabs.tabs" class="si-good-tabs-nav__item"><a ng-click="tabs.select(tab)" ng-class="{'active': tab.active}" class="si-good-tabs-nav__button sb-button sb-button_s_s"><span ng-bind="tab.title" class="sb-button__text"></span></a></div>
                    </div>
                </div>
                <div ng-transclude class="r__c r__c_md_8"></div>
            </div>
        </div>
    </script>
    <script type="text/ng-template" id="siGoodTabsPaneTemplate">
        <div ng-show="active" ng-transclude class="si-good-tabs__pane"></div>
    </script>
    <script type="text/ng-template" id="siGoodSliderTemplate">
        <div class="si-good-slider">
            <div class="container container_s_m">
                <div ng-transclude class="si-good-slider-carousel"></div>
                <div class="si-good-slider-tabs">
                    <div class="r">
                        <div ng-repeat="slide in slider.slides" class="si-good-slider-tabs__item"><a ng-click="slider.select(slide)" ng-class="{'si-active': slide.active}" class="si-good-slider-tabs__link si-link"><span ng-bind="slide.name" class="si-link__text"></span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script type="text/ng-template" id="siGoodSliderSlideTemplate">
        <div ng-transclude class="si-good-slider-slide"></div>
    </script>
    <?php
} ?>

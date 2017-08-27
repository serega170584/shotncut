<?php
use yii\helpers\Html;

if($value && !empty($value['blocks'])): ?>
    <div id="anchor-location" class="si-good-section">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="r r_s_m">
                    <div class="r__c r__c_md_4">
                        <div class="si-good-caption">
                            <div class="si-good-caption__text"><?php echo Html::encode($value['header']); ?></div>
                        </div>
                    </div>
                    <div class="r__c r__c_md_8">
                        <div class="r r_s_m">
                            <?php foreach($value['blocks'] as $block): ?>
                            <div class="r__c r__c_md_4">
                                <div class="si-good-buy-feature"><?php if(!empty($block['image'])): ?><img src="<?php echo Html::encode($block['image']); ?>" alt=""><?php endif; ?>
                                    <div class="si-good-buy-feature__text">
                                        <?php echo \yii\helpers\HtmlPurifier::process($block['text']); ?>
                                    </div>
                                    <?php echo \yii\helpers\HTMLPurifier::process($block['add']); ?>
                                    <?php if(!empty($block['link']['text']) && !empty($block['link']['url'])): ?>
                                        <a href="<?php echo Html::encode($block['link']['url']); ?>" class="si-link si-link_theme_action"><span class="si-link__text"><?php echo Html::encode($block['link']['text']); ?></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-location" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_location sb-icon"></span><span class="si-link__text">Как оформить?</span></a>'; ?>
<?php endif; ?>
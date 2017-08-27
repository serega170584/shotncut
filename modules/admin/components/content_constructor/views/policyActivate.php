<?php if($value && $value['text']): ?>
    <div id="anchor-power" class="si-good-section si-good-section_background_green">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="sb-good-activate">
                    <div class="r r_s_m">
                        <div class="r__c r__c_1_3">
                            <div class="si-good-caption">
                                <div class="si-good-caption__text">Активировать <br> полис</div>
                            </div>
                        </div>
                        <div class="r__c r__c_2_3">
                            <div class="sb-wysiwyg">
                                <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m"><?php echo strip_tags($value['text'], '<br>'); ?></div>
                            </div>
                            <a target="_blank" href="<?php echo \yii\helpers\Html::encode($value['url']); ?>" class="sb-button sb-button_s_m sb-button_theme_white"><span class="sb-button__text">Активировать</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->params['leftMenuItems'][] = '<a href="#anchor-power" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_power sb-icon"></span><span class="si-link__text">Активировать полис</span></a>'; ?>
<?php endif; ?>
<?php if($value && $value['text']): ?>
<div id="anchor-about" class="si-good-section">
    <div class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-good-caption si-good-caption_accentuated">
                <div class="si-good-caption__text">Для чего нужен <br> продукт?</div>
            </div>
        </div>
        <div class="si-layout-section si-layout-section_s_m">
            <div style="margin-top: -48px;" class="r r_s_m">
                <div class="r__c r__c_md_4"></div>
                <div class="r__c r__c_md_8">
                    <div class="sb-wysiwyg">
                        <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m"><?php echo strip_tags($value['text']); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php $this->params['leftMenuItems'][] = '<a href="#anchor-about" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_about sb-icon"></span><span class="si-link__text">О полисе</span></a>'; ?>
<?php endif; ?>
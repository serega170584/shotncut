<?php if($value && $value['text']): ?>
    <div style="padding-bottom: 0;" class="si-good-section">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="si-good-caption si-good-caption_accentuated">
                    <div class="si-good-caption__text">Как это работает?</div>
                </div>
            </div>
            <div class="si-layout-section si-layout-section_s_m">
                <div class="r r_s_m">
                    <div class="r__c r__c_md_4"></div>
                    <div class="r__c r__c_md_8">
                        <div class="sb-wysiwyg">
                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                <?php echo \yii\helpers\HtmlPurifier::process($value['text']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
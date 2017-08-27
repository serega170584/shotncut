<?php if($value && !empty($value['slides'])): ?>
<div id="anchor-actions" class="si-good-section si-good-section_background_grey">
    <div class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-good-caption si-good-caption_accentuated">
                <div class="si-good-caption__text">Действия при страховом случае</div>
            </div>
        </div>
        <div class="si-layout-section si-layout-section_s_m">
            <si-good-tabs>
                <?php foreach($value['slides'] as $slide): $index = 1;?>
                    <si-good-tabs-pane title="<?php echo \yii\bootstrap\Html::encode($slide['header']); ?>">
                        <si-good-accordion class="si-good-accordion_theme_2">
                            <?php foreach($slide['lines'] as $i => $line): ?>
                                <si-good-accordion-pane>
                                    <div class="si-good-accordion__head">
                                        <div class="si-good-accordion__badge"><?php
                                            echo intval($index);
//                                            echo sprintf('%02d', $index);
                                        ?></div>
                                        <div class="si-good-accordion__caption"><?php echo \yii\helpers\Html::encode($line['header'])?></div>
                                    </div>
                                    <div class="si-good-accordion__body">
                                        <div class="sb-wysiwyg">
                                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                                <?php echo \yii\helpers\HtmlPurifier::process($line['text']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </si-good-accordion-pane>
                            <?php $index++; endforeach; ?>
                        </si-good-accordion>
                    </si-good-tabs-pane>
                <?php endforeach; ?>
            </si-good-tabs>
        </div>
    </div>
</div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-actions" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_action sb-icon"></span><span class="si-link__text">Страховой случай</span></a>'; ?>
<?php endif; ?>
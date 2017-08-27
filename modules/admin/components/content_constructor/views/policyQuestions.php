<?php if ($value && !empty($value['lines'])): ?>
<div id="anchor-answers" class="si-good-section">
    <div class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-good-caption si-good-caption_accentuated">
                <div class="si-good-caption__text">Ответы на вопросы</div>
            </div>
        </div>
        <div class="si-layout-section si-layout-section_s_m">
            <si-good-accordion class="si-good-accordion_theme_1">
                <?php foreach($value['lines'] as $line): ?>
                <si-good-accordion-pane>
                    <div class="si-good-accordion__head">
                        <div class="si-good-accordion__caption"><?php echo \yii\helpers\Html::encode($line['header']); ?></div>
                    </div>
                    <div class="si-good-accordion__body">
                        <div class="sb-wysiwyg">
                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                <?php echo \yii\helpers\HtmlPurifier::process($line['text']); ?>
                            </div>
                        </div>
                    </div>
                </si-good-accordion-pane>
                <?php endforeach; ?>
            </si-good-accordion>
        </div>
    </div>
</div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-answers" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_answers sb-icon"></span><span class="si-link__text">Вопросы и ответы</span></a>'; ?>
<?php endif; ?>
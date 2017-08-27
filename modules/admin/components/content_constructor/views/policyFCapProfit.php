<?php if($value && $value['text']): ?>
    <div class="si-good-section-zaem family__sect5" id="anchor-f_cap__profit">
        <div class="container container_s_m">
            <div class="si-good-caption__text family__sect5_icon_attention">
                <?php echo \yii\helpers\Html::encode($value['header']); ?>
            </div>
            <div class="family__text">
                <?php echo \yii\helpers\HtmlPurifier::process($value['text']); ?>
            </div>
            <div class="block__inner_clearfix"></div>
        </div>
    </div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-f_cap__profit" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_about sb-icon"></span><span class="si-link__text">Дополнительная выгода</span></a>'; ?>
<?php endif; ?>
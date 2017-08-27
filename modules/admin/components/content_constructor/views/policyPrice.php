<?php if($value && $value['text']): ?>
    <div id="anchor-coins" class="si-good-section">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="si-good-caption">
                    <div class="si-good-caption__text"><?php echo \yii\helpers\Html::encode($value['header']); ?></div>
                </div>
            </div>
            <div class="si-layout-section si-layout-section_s_m ">
                <div class="sb-good-table">
                    <?php echo \yii\helpers\HtmlPurifier::process($value['text']); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-coins" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_coins sb-icon"></span><span class="si-link__text">Стоимость</span></a>'; ?>
<?php endif; ?>
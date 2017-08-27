<?php if($value && !empty($value['files'])): ?>
    <div id="anchor-files" class="si-good-section si-good-section_background_grey">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="si-good-caption">
                    <div class="si-good-caption__text">Документация</div>
                </div>
            </div>
            <div class="si-layout-section si-layout-section_s_m">
                <div class="r r_s_m">
                    <?php foreach($value['files'] as $file):  if(!$file['title']) continue; ?>
                        <div class="r__c r__c_md_4">
                            <a target="_blank" href="<?php echo \yii\helpers\Html::encode($file['url']); ?>" class="si-good-doc"><?php echo \yii\helpers\Html::encode($file['title']); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-files" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_files sb-icon"></span><span class="si-link__text">Документы</span></a>'; ?>
<?php endif; ?>
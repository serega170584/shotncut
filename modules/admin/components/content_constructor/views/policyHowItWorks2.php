<?php
use yii\helpers\Html;
//print_r($value);

if($value && !empty($value['blocks'])): ?>

    <div class="si-good-section HowItWorks2-section" id="anchor-HowItWorks2">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="r r_s_m">
                    <div class="r__c r__c_md_4">
                        <div class="si-good-caption">
                            <div class="si-good-caption__text"><?php echo Html::encode($value['header']); ?></div>
                        </div>
                    </div>

                    <div class="r__c r__c_md_8">
                        <?php if ($value['text']) { ?>
                            <div class="sb-wysiwyg">
                                <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                    <?php echo \yii\helpers\HtmlPurifier::process($value['text']); ?>
                                </div>
                            </div>
                        <?php } ?>  
                        <div class="r__c r__c_md_8 mobile-none HowItWorks2__im1">
                            <?php if(!empty($value['blocks'][0])): ?><img src="<?php echo Html::encode($value['blocks'][0]['image']); ?>" alt=""  style="margin-top: 60px;margin-bottom: 25px;"><?php endif; ?>
                            <div class="r r_s_m"></div>
                        </div>
                        <div class="podushka-how-works desktop-none">
                            <div style="float:left"><?php if(!empty($value['blocks'][1])): ?><img src="<?php echo Html::encode($value['blocks'][1]['image']); ?>" alt=""><?php endif; ?></div>
                            <div class="zaem-how-works__desc">

                                <?php
                                for($i=2;$i<5;$i++) {
                                    ?>
                                    <div class="sb-wysiwyg" >
                                        <div class="sb-wysiwyg__p sb-wysiwyg__p_s_s"><?php echo \yii\helpers\HtmlPurifier::process
                                            ($value['blocks'][$i]['text']); ?></div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="r r_s_m mobile-none">
                    <div class="r__c r__c_md_4"></div>
                    <?php
                    for($i=2;$i<5;$i++) {
                        ?>
                        <div class="r__c r__c_md_<?=($i==4)?'2':'3'?> coll">
                            <div class="sb-wysiwyg">
                                <div class="sb-wysiwyg__p sb-wysiwyg__p_s_s"><?php echo \yii\helpers\HtmlPurifier::process
                                    ($value['blocks'][$i]['text']); ?></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="r r_s_m r_s_m-risks--mobile">
                    <div class="r__c r__c_md_4"></div>
                    <div class="r__c r__c_md_8"><div class="sb-wysiwyg">
                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m"><hr></div></div></div>
                    <div class="r__c r__c_md_4"></div>


                    <?php if ($value['text_2']) { ?>
                        <?php if ($value['header_2']) { ?>
                            <div class="r__c r__c_md_2 r__c_md_2-risks--mobile">
                                <div class="sb-wysiwyg">
                                    <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                        <p><?php echo Html::encode($value['header_2']); ?>:</p></div>
                                </div>
                            </div>
                            <?php
                        } ?>
                        <div class="r__c r__c_md_4">
                            <div class="sb-wysiwyg-podushka">
                                <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                    <?php echo \yii\helpers\HtmlPurifier::process($value['text_2']); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>


                </div>

            </div>

        </div>
    </div>

    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-HowItWorks2" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_about sb-icon"></span><span class="si-link__text">'.(($value['header'])?Html::encode($value['header']):'Как это работает?').'</span></a>'; ?>

<?php endif; ?>
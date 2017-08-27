<div id="anchor-coins_2" class="si-good-section-zaem si-good-section_background_green si-good-section_background_green--zaem">
    <div class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">

            <div class="si-good-caption si-good-caption_accentuated mobile-none">
                <div class="si-good-caption__text si-good-caption__text--podushka"><?php echo \yii\helpers\Html::encode($value['header']); ?></div>

            </div>
            <div class="desktop-none price-desc">
                <div><img src="/assets/images/icon-rub.png"></div>
                <div><p><?php echo \yii\helpers\Html::encode($value['header']); ?></p></div>
            </div>
            <?php if ($value['text']) { ?>
                <div class="r__c r__c_md_10">
                    <div class="sb-wysiwyg">
                        <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                            <?php echo \yii\helpers\HtmlPurifier::process($value['text']); ?>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <div class="desktop-none price-calc-body price-calc-body--zaem-mobile">
            <div class=" price-calc">
                <div style="text-align:center;line-height: 1.5;margin-bottom: 20px;"><?php echo \yii\helpers\Html::encode($value['header_2']); ?></div>
                <input type="text" maxlength="10" max="6" class="input-zaem--mobile insurable-list__count-zaem insurable-list__count-zaem--mobile" id="input-zaem-mob" placeholder="">
                <span class="input-zaem--mobile-rub" ><span class="price-ruble">&#8381;</span></span>
            </div>

            <div style="" class="hr-zaem-mobile"></div>
            <div class="price-calc-body-inn">
                <div class="sb-wysiwyg">
                    <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                        <div class="text-price" style="float:none;color: #b7b8ba; text-align:center">Срок действия:</div>
                        <div class="text-price-total" style="font-size:22px; float:none;text-align: center;margin-top: 6px;">1<span class="text-price-units__cell" style="float:none"> год</span></div>
                        <div class="text-price" style="float:none;color: #b7b8ba; text-align:center">Итоговая стоимость:</div><div class="text-price-total" style="font-size:22px; float:none;text-align: center;margin-top: 6px;" id="input-zaem-result-mob">8 500<span class="text-price-units__cell" style="float:none"> руб</span></div>


                    </div>
                </div>
            </div>
        </div>
        <div class="si-layout-section-price si-layout-section_s_m mobile-none">
            <!--  <div class="r__c-price r__c_md_12">
                <div class="sb-wysiwyg-podushka-price">
                  <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">-->
            <div class="r__c-price-zaem">
                <div class="r r_s_m">
                    <div class="r__c r__c_md_4-zaem">
                        <div class="sb-wysiwyg">
                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                <div class="text-price-zaem"><?php echo \yii\helpers\Html::encode($value['header_2']); ?></div>
                                <input type="text" maxlength="7" max="6" class="input-zaem insurable-list__count-zaem" id="input-zaem"
                                       placeholder="840000">
                                <div class="input--zaem" ></div>
                            </div>
                        </div>
                    </div>

                    <hr class="zaem">

                    <div class="r__c r__c_md_3-zaem">
                        <div class="sb-wysiwyg">
                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                <div class="text-price-zaem--desc">Срок действия</div>
                                <div class="text-price-zaem--sum">1 год</div>
                            </div>
                        </div>
                    </div>


                    <div class="r__c r__c_md_3-zaem">
                        <div class="sb-wysiwyg">
                            <div class="sb-wysiwyg__p sb-wysiwyg__p_s_m">
                                <div class="text-price-zaem--desc">Итоговая стоимость</div><div class="text-price-zaem--sum" id="input-zaem-result">8 500 &#8381;<!--<span class="text-price__currency--zaem"></span><div style="position: relative"></div>--></div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<?php
$js = <<<JS


$(document).ready(function(){
    var input = document.getElementById('input-zaem');
      document.getElementById('input-zaem-result').innerHTML = "8400 ";
      var newSpan = document.createElement('span');
      newSpan.className = "text-price__currency--zaem";
      document.getElementById('input-zaem-result').appendChild(newSpan);
      input.oninput = function() {
        var value = Math.round(input.value/100);
        //input.value = input.value/100;
        //console.log(input);
        document.getElementById('input-zaem-result').innerHTML = value;
        document.getElementById('input-zaem-result').appendChild(newSpan);
      };

      var input2 = document.getElementById('input-zaem-mob');
      document.getElementById('input-zaem-result-mob').innerHTML = "8400 ";
      var newSpan2 = document.createElement('span');
      newSpan2.className = "text-price-units__cell--mobile";
      document.getElementById('input-zaem-result-mob').appendChild(newSpan2).innerHTML = ' руб.';
      input2.oninput = function() {
        var value2 = Math.round(input2.value/100);
        //input.value = input.value/100;
        //console.log(input2);
        document.getElementById('input-zaem-result-mob').innerHTML = value2;
        document.getElementById('input-zaem-result-mob').appendChild(newSpan2);
      };
});



JS;
$this->registerJs($js);
?>

<?php $this->params['leftMenuItems'][] =
    '<a href="#anchor-coins_2" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_coins sb-icon"></span><span class="si-link__text">'.\yii\helpers\Html::encode($value['header']).'</span></a>'; ?>


<?php if (0) { ?>
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
            '<a href="#anchor-coins_2" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_coins sb-icon"></span><span class="si-link__text">Стоимость</span></a>'; ?>
    <?php endif; ?>
    <?php
} ?>

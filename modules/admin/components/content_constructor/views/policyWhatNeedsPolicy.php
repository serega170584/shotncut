<?php if($value && $value['text']): ?>
    <div class="si-good-section" id="anchor-wh_nd_pl">
        <div class="container container_s_m">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="family__sect2_bg">
                    <div class="family__sect2_inn">
                        <div class="si-good-caption__text"><?php echo \yii\helpers\Html::encode($value['header']); ?></div>

                        <div class="family__sect2_text">
                            <?php echo \yii\helpers\HtmlPurifier::process($value['text']); ?>
                        </div>
                        <div class="family__sect2_list">

                            <div class="family__sect2_item">
                                <div class="ico ico_1"></div>
                                <h2>Здоровье</h2>
                                <div class="tx">
                                    Без здоровья невозможно обеспечить себя работой
                                </div>
                            </div>

                            <div class="family__sect2_item">
                                <div class="ico ico_2"></div>
                                <h2>Работа</h2>
                                <div class="tx">
                                    Без работы невозможно получать достаточный <br>доход
                                </div>

                            </div>

                            <div class="family__sect2_item">
                                <div class="ico ico_3"></div>
                                <h2>Доход</h2>
                                <div class="tx">
                                    Без дохода невозможно обеспечить достойный уровень жизни семьи и близких
                                </div>
                            </div>

                            <div class="family__sect2_item">
                                <div class="ico ico_4"></div>
                                <h2>Семья</h2>
                                <div class="tx">
                                    Финансовое благополучие -
                                    неотъемлемый критерий
                                    полноценности семьи
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block__inner_clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->params['leftMenuItems'][] =
        '<a href="#anchor-wh_nd_pl" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_about sb-icon"></span><span class="si-link__text">Для чего нужен полис</span></a>'; ?>
<?php endif; ?>

<?php
$js = <<<JS
$(document).ready(function(){
    $('.js_fam_tabs_links a').on('click', function(event) {

        if (!$(this).hasClass('active')) {

            var wrap = $(this).closest('.js_fam_tabs_wrap');

            if (wrap.hasClass('proceed')) {
                return;
            }

            var el_nm = $(this).parent().index();

            wrap.find('.js_fam_tabs_links a').removeClass('active');
            $(this).addClass('active');

            var hg1 = wrap.find('.js_fam_tab.active').outerHeight();
            var hg2 = wrap.find('.js_fam_tab:nth-child('+(el_nm+1)+')').outerHeight();

            wrap.find('.js_fam_tabs').height(hg1);
            wrap.addClass('proceed');

            wrap.find('.js_fam_tab.active').stop().fadeOut(200, function() {});

            wrap.find('.js_fam_tab:nth-child('+(el_nm+1)+')').stop().fadeIn(200, function() {

                wrap.find('.js_fam_tabs').stop().animate({'height': hg2}, 200, function () {
                    wrap.removeClass('proceed');
                });

                wrap.find('.js_fam_tab').removeClass('active');
                $(this).addClass('active');
            });
        }
        event.preventDefault();
    });
});
JS;
$this->registerJs($js);
?>
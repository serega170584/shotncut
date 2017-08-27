<?php
$comp_cr = Yii::$app->request->get('company', 0);
?>

<div class="si-layout__body si-layout__about">

    <div class="block">
        <div class="block__inner">
            <div class="page-title">
                <div class="page-title__title"><span><?=$model->title?></span></div>
<!--                <div class="page-title__number">--><?//=$model->text_3?><!--</div>-->
            </div>

            <?php echo $this->render('_nav'); ?>

            <div class="page-content">
                <div class="page-content__aside">
                    <div class="contacts-info">

                        <?php if (trim($model->preview_text)) { ?>
                            <div class="contacts-info__item">
                                <div class="contacts-info__text">
                                    <div class="contacts-info__title">По всем вопросам</div>
                                    <?=trim($model->preview_text)?>
                                </div>
                            </div>
                            <?php
                        } ?>

                        <?php if (trim($model->text_1)) { ?>
                            <div class="contacts-info__item">
                                <div class="contacts-info__text">
                                    <div class="contacts-info__title">PR-отдел</div>
                                    <?=trim($model->text_1)?>
                                </div>
                            </div>
                            <?php
                        } ?>

                        <?php if (trim($model->text_2)) { ?>
                            <div class="contacts-info__item">
                                <div class="contacts-info__text">
                                    <div class="contacts-info__title">Документы</div>
                                    <?=trim($model->text_2)?>
                                </div>
                            </div>
                            <?php
                        } ?>

                    </div>
                </div>
                <div class="page-content__content" data-map-container-descriptor="general" data-map-container="true">
                    <div id="yamap" class="b-map contacts-map" data-map-descriptor="contacts" data-map="true"></div>
                </div>
            </div>
            <div class="page-content">
                <div class="page-content__content">
                    <div class="contacts-blocks">

                        <?php if (trim($model->text_4.$model->text_5)) { ?>
                            <div class="contacts-blocks__item contacts-blocks__item_green" style="min-height: 260px;">
                                <div class="contacts-blocks__phone-numbers">
                                    <div class="contacts-blocks__phone icon icon_phone"><?=$model->text_4?></div>
                                    <div class="contacts-blocks__phone-description">Центр поддержки клиентов</div>
                                    <div class="contacts-blocks__phone"><?=$model->text_5?></div>
                                    <div class="contacts-blocks__phone-description">Горячая линия</div>
                                </div>
<!--                            <a href="#" class="btn btn_white btn_size_m contacts-blocks__btn">Перезвоните мне</a>-->

                            </div>
                            <?php
                        } ?>
<!--
                        <div class="contacts-blocks__item contacts-blocks__item_white">
                            <div class="contacts-blocks__title">У вас остались вопросы?</div>
                            <div class="contacts-blocks__description">Задайте их нам через форму обратной связи и мы обязательно ответим.</div>
                            <a href="#" class="btn btn_gray btn_size_m contacts-blocks__btn">Перезвоните мне</a>
                        </div>
                        -->
                        <div class="contacts-blocks__item contacts-blocks__item_transparent">
                            <div class="contacts-blocks__title">Поделитесь своими идеями!</div>
                            <div class="contacts-blocks__description">Ваше обращение будет рассмотрено Генеральным директором компании.</div>
                            <a onclick="feedbak_on_show();" href="#"ng-dialog="/templates/feedback.dialog.tpl.php" ng-dialog-close-previous=""  class="btn btn_green btn_size_m contacts-blocks__btn ng-isolate-scope">Обратиться</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$about_map_pos      = trim($model->text_6)?trim($model->text_6):'55.719972, 37.628262';
$about_map_zoom     = trim($model->text_7)?trim($model->text_7):'16';
$about_map_addr     = trim($model->text_8)?trim($model->text_8):'г. Москва, Адрес';

$js = <<<JS

//var about_map_pos   = [55.719972, 37.628262];
//var about_map_zoom  = 16;
//var about_map_addr  = 'г. Москва, ул. Павловская дом 7';

var about_map_pos   = [$about_map_pos];
var about_map_zoom  = $about_map_zoom;
var about_map_addr  = '$about_map_addr';

JS;
$this->registerJs($js,  yii\web\View::POS_HEAD);

$this->registerJsFile('http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru_RU',  ['position' => yii\web\View::POS_END]);
?>

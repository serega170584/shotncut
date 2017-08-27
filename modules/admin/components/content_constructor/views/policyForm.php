<?php
$phone = '8 (800) 555 55 95';
if (trim($value['header'])) {
    $phone = trim($value['header']);
}
$phone_lnk = preg_replace('~\D+~','',$phone);
?>

<div class="si-good-section si-good-section_background_green ttt_<?=$value['header']?>">
    <div class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="sb-good-declare">
                <div class="si-layout-section si-layout-section_s_m">
                    <div class="r r_s_m">
                        <div class="r__c r__c_1_2">
                            <div class="sb-wysiwyg">
                                <div class="sb-wysiwyg__p sb-wysiwyg__p_s_l">Заявить об убытке Вы можете позвонив <br> по телефону горячей линии:</div>
                            </div>
<!--                            <a href="tel:88005555595" class="sb-good-declare__phone">8 (800) 555 55 95</a>-->
                            <a href="tel:<?=$phone_lnk?>" class="sb-good-declare__phone"><?=$phone?></a>
                        </div>
                        <div class="r__c r__c_1_2" ng-controller="siGoodFormController">
                            <div class="sb-wysiwyg">
                                <div class="sb-wysiwyg__p sb-wysiwyg__p_s_l">Или оставьте ваш номер телефона, <br> мы перезвоним Вам:</div>
                            </div>
                            <form class="sb-good-declare__form si-good-form js__good-declare__form" novalidate>
                                <input type="hidden" ng-model="request.url" ng-init="request.url = '<?php echo \yii\helpers\Url::current([], true); ?>'" />
                                <input type="hidden" ng-model="request.subject" ng-init="request.subject = '<?php echo 'Заявка на полис - ' . $this->title; ?>'" />
                                <div class="r r_s_m">
                                    <div class="r__c r__c_2_3">
                                        <input type="text" ng-model="request.phone" ui-mask="+7 (999) 999-9999" ui-mask-placeholder-char=" " name="inp__phone" required class="sb-input sb-input_s_m">
                                    </div>
                                    <div class="r__c r__c_1_3">
                                        <!--<button type="submit" ng-click="send()" ng-disabled="!request.phone" class="sb-button sb-button_s_m sb-button_theme_yellow"><span class="sb-button__text">Отправить</span></button>-->
                                        <button type="submit" class="sb-button sb-button_s_m sb-button_theme_yellow"><span class="sb-button__text">Отправить</span></button>
                                    </div>
                                    <div class="r__c r__c_1_3 f_success">
                                        Отправлено
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
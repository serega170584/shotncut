<div class="si-feedbak si-feedbak-modal">
    <div class="si-feedbak__section si-feedbak__section_one">
        <div class="si-layout-section si-layout-section_s_l">
            <div class="sb-wysiwyg sb-wysiwyg__p sb-wysiwyg__p_s_s">
                <h2>Обратная связь</h2>
                <p><b>Ваше мнение очень важно для нас!</b></p>

                <p>Мы&nbsp;рады Вашим идеям и&nbsp;предложениям по&nbsp;работе компании.</p>

                <p>Каждое обращение будет рассмотрено руководством компании и&nbsp;мы&nbsp;обязательно ответим Вам в&nbsp;течение 2-х дней</p>

            </div>
        </div>
    </div>
    <div class="si-feedbak__section">
        <div class="si-layout-section si-layout-section_s_l">
            <form id="feedbak__form" class="si-feedbak__form" action="">
                <div class="js__si-feedbak__form-felds">

                <div class="si-layout-section si-layout-section_s_s">
                    <div class="r r_s_m">
                        <div class="r__c r__c_md_4">
                            <div class="si-form__label">Компания:</div>
                        </div>
                        <div class="r__c r__c_md_8">

                            <select name="inp__company" class="chosen-select" style="width: 100%;">
                                <option value="1" selected="selected">ООО СК "Сбербанк Страхование"</option>
                                <option value="2">ООО СК "Сбербанк Страхование жизни"</option>
                            </select>
                        </div>
                    </div>
                </div>
                    
                <div class="si-layout-section si-layout-section_s_s">
                    <div class="r r_s_m">
                        <div class="r__c r__c_md_4">
                            <div class="si-form__label">Имя и фамилия:</div>
                        </div>
                        <div class="r__c r__c_md_8">
                            <input type="text" name="inp__fio" value="" class="si-input si-input_theme_b">
                        </div>
                    </div>
                    <div class="r r_s_m inp__error_out">
                        <div class="r__c r__c_md_4">&nbsp;</div>
                        <div class="r__c r__c_md_8">
                            <div class="inp__error inp__error_fio"></div>
                        </div>
                    </div>
                </div>
                <div class="si-layout-section si-layout-section_s_s">
                    <div class="r r_s_m">
                        <div class="r__c r__c_md_4">
                            <div class="si-form__label">Контактный телефон:</div>
                        </div>
                        <div class="r__c r__c_md_8">
                            <input type="text" name="inp__phone" value=""
                                   class="si-input si-input_theme_b js__inp_phone_din"
                                   placeholder="+7 (999) 999-99-99">
                        </div>
                    </div>
                    <div class="r r_s_m inp__error_out">
                        <div class="r__c r__c_md_4">&nbsp;</div>
                        <div class="r__c r__c_md_8">
                            <div class="inp__error inp__error_phone"></div>
                        </div>
                    </div>
                </div>
                <div class="si-layout-section si-layout-section_s_s">
                    <div class="r r_s_m">
                        <div class="r__c r__c_md_4">
                            <div class="si-form__label">E-mail адрес:</div>
                        </div>
                        <div class="r__c r__c_md_8">
                            <input type="text" name="inp__email" value="" class="si-input si-input_theme_b">
                        </div>
                    </div>
                    <div class="r r_s_m inp__error_out">
                        <div class="r__c r__c_md_4">&nbsp;</div>
                        <div class="r__c r__c_md_8">
                            <div class="inp__error inp__error_email"></div>
                        </div>
                    </div>
                </div>
<!--                <div class="si-layout-section si-layout-section_s_l">-->
                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">Тема обращения:</div>
                            </div>
                            <div class="r__c r__c_md_8">
                                <input type="text" name="inp__tema" value="" class="si-input si-input_theme_b">
                            </div>
                        </div>
                        <div class="r r_s_m inp__error_out">
                            <div class="r__c r__c_md_4">&nbsp;</div>
                            <div class="r__c r__c_md_8">
                                <div class="inp__error inp__error_tema"></div>
                            </div>
                        </div>
                    </div>
                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">Cообщение:</div>
                            </div>
                            <div class="r__c r__c_md_8">
                                <textarea name="inp__message" class="si-input si-input_type_textarea si-input_theme_b" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="r r_s_m inp__error_out">
                            <div class="r__c r__c_md_4">&nbsp;</div>
                            <div class="r__c r__c_md_8">
                                <div class="inp__error inp__error_message"></div>
                            </div>
                        </div>
                    </div>
<!--                </div>-->

                    <div class="si-layout-section si-layout-section_s_s" style="margin-bottom: 0;">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">Каптча:</div>
                            </div>
                            <div class="r__c r__c_md_8">
                                <div class="" id="feedbak_recaptcha"></div>
                            </div>
                        </div>
                        <div class="r r_s_m inp__error_out">
                            <div class="r__c r__c_md_4">&nbsp;</div>
                            <div class="r__c r__c_md_8">
                                <div class="inp__error inp__error_recaptcha"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="r r_s_m f_success" style="">
                    Спасибо! Ваше сообщение отправлено
                </div>

                <div class="js__si-feedbak__form-felds_2">
                    <div class="si-layout-section si-layout-section_s_l" style="margin-top: 0;"><hr></div>

                    <div class="si-layout-section si-layout-section_a_c">
                        <button style="width: 162px;"
                                class="sb-button sb-button_theme_e sb-button_s_m"
                                type="submit"><span class="sb-button__text">Отправить</span></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


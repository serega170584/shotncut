<div class="si-feedbak si-resume">
    <div class="si-feedbak__section si-feedbak__section_one">
        <div class="si-layout-section si-layout-section_s_l">
            <div class="sb-wysiwyg sb-wysiwyg__p sb-wysiwyg__p_s_s">

                <h2>Резюме</h2>

                <p class="b-form-description-paragraph">Поля, отмеченные «<span class="si-resume-ob">*</span>» обязательны для заполнения. В большом поле для текста опишите ваш вопрос, мы обязательно ответим на него! Спасибо за письмо!</p>

            </div>
        </div>
    </div>
    <div class="si-feedbak__section">
        <div class="si-layout-section si-layout-section_s_l">
            <form id="resume__form" class="si-feedbak__form" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="inp__vakans" name="inp__vakans" value="">
                <input type="hidden" class="inp__company" name="inp__company" value="">

                <div class="js__si-feedbak__form-felds">

                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">Фамилия <span class="ob">*</span> :</div>
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
                                <div class="si-form__label">Имя <span class="ob">*</span> :</div>
                            </div>
                            <div class="r__c r__c_md_8">
                                <input type="text" name="inp__name" value="" class="si-input si-input_theme_b">
                            </div>
                        </div>
                        <div class="r r_s_m inp__error_out">
                            <div class="r__c r__c_md_4">&nbsp;</div>
                            <div class="r__c r__c_md_8">
                                <div class="inp__error inp__error_name"></div>
                            </div>
                        </div>
                    </div>

                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">Отчество <span class="ob">*</span> :</div>
                            </div>
                            <div class="r__c r__c_md_8">
                                <input type="text" name="inp__mname" value="" class="si-input si-input_theme_b">
                            </div>
                        </div>
                        <div class="r r_s_m inp__error_out">
                            <div class="r__c r__c_md_4">&nbsp;</div>
                            <div class="r__c r__c_md_8">
                                <div class="inp__error inp__error_mname"></div>
                            </div>
                        </div>
                    </div>

                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">E-mail <span class="ob">*</span> :</div>
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



                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_8">
                                <div class="si-form__label">Файл резюме <span class="ob">*</span> :</div>
                                <div class="resume_f_group">
                                    <p>Прикрепите необходимый файл.<br>Допустимые форматы: .doc, .docx, .odf, .pdf, .html, .txt</p>
                                    <img src="/assets/images/resume_icons.jpg">
                                </div>
                            </div>

                            <div class="r__c r__c_md_4">

                                <div class="butts resume__up_file">

                                    <button class="sb-button sb-button_theme_e sb-button_s_m lnk_upfile"
                                            type="button"><span class="sb-button__text">Добавить</span></button>

                                    <input id="chek_up_file" class="upfile_inp" type="file" name="file" value="Отправить">

                                    <div class="resume__up_file_name js__resume_file_name">
                                        <div class="js__resume_file_name_inn"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="r r_s_m inp__error_out">
                            <div class="r__c r__c_md_12">
                                <div class="inp__error inp__error_file"></div>
                            </div>
                        </div>
                    </div>

                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_4">
                                <div class="si-form__label">Ваш комментарий:</div>
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
                    Спасибо! Ваше резюме отправлено
                </div>

                <div class="js__si-feedbak__form-felds_2">
                    <div class="si-layout-section si-layout-section_s_l" style="margin-top: 0;"><hr></div>

                    <div class="si-layout-section si-layout-section_a_c">
                        <button style="width: 200px;"
                                class="sb-button sb-button_theme_e sb-button_s_m"
                                type="submit"><span class="sb-button__text">Отправить резюме</span></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


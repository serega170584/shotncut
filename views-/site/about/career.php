<?php
$comp_cr = Yii::$app->request->get('company', 0);
?>

<div class="si-layout__body si-layout__about">
    <div class="block">
        <div class="block__inner">
            <div class="page-title">
                <div class="page-title__title"><span>Карьера</span></div>
            </div>

            <?php echo $this->render('_nav'); ?>

            <div class="page-content page-content-career">

                <?php if (trim($data['intro']->preview_text)) { ?>
                    <div class="block">
                        <div class="block__inner_career">
                            <div class="text career-text">
                                <?=trim($data['intro']->preview_text)?>

    <!--
                                <p>
                                    Мы внимательно следим за тем, кто присоединяется к нашей команде. В одном мы уверены точно – эти люди соответствуют нашим
                                    внутренним ценностям: Клиентоориентированность, Профессионализм, Инновационность, Порядочность, Удовольствие, Лидерство.
                                    Если Вы
                                    разделяете наши ценности и чувствуете в себе силы решать сложные и интересные задачи – присоединяйтесь к нам.
                                </p>
                                -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (count($data['models'])) { ?>
                    <div class="block">
                        <div class="block__inner block__inner_career_list">
                            <div class="page-title">
                                <div class="page-title__title"><span>Вакансии</span></div>
                            </div>

                                <div class="accordion-list">

                                    <?php
                                    foreach($data['models'] as $item) {
                                        ?>
                                        <div class="accordion-list__item js-accordeon">
                                            <div class="accordion-list__header js-accordeon-title">
                                                <div class="accordion-list__title"><?=$item->title?></div>
                                            </div>
                                            <div class="accordion-list__body js-accordeon-body">
                                                <div class="accordion-list__body-inner vacancy">
                                                    <div class="vacancy__text text text_left">
                                                        <div class="vacancy__info">
                                                            <div class="vacancy__info-item">
                                                                <b>Уровень з/п: </b>
                                                                <span><?=trim($item->text_1)?$item->text_1:'Не указана'?></span>
                                                            </div>
                                                            <div class="vacancy__info-item">
                                                                <b>Опыт работы: </b>
                                                                <span><?=trim($item->text_2)?$item->text_2:'Не указано'?></span>
                                                            </div>
                                                            <div class="vacancy__info-item">
                                                                <b>Тип занятости: </b>
                                                                <span><?=trim($item->text_3)?$item->text_3:'Не указано'?></span>
                                                            </div>
                                                        </div>

                                                        <?=$item->preview_text?>

<!--
                                                        <b>Обязанности</b>
                                                        <p>Наше обещание клиентам:</p>
                                                        <p>Мы работаем для того, чтобы помочь гражданам России не бояться планировать свое будущее, перестать жить
                                                            только сегодняшним днем. Благодаря нашим продуктам мечты, устремления и обещания, данные себе и своим
                                                            близким, будут реализованы.
                                                            Несмотря ни на что.</p>
                                                        <p>Какие задачи предстоит решать:</p>
                                                        <ul>
                                                            <li>Определение характеристик целевых групп, анализ предпочтений, участие в исследование потребителей;
                                                            </li>
                                                            <li>Проводить сравнительный анализ существующих на рынке аналогов;</li>
                                                            <li>Оформление идеи продукта (предварительное описание или паспорт продукта), оценка бизнес-потенциала и
                                                                необходимых ресурсов для реализации;
                                                            </li>
                                                            <li>Согласование идеи и дизайна продукта на Продуктовом комитете;</li>
                                                            <li>Проработка и создание дополнительных продуктовых сервисов;</li>
                                                            <li>Подготовка и согласование предложений по оптимизации и совершенствованию существующей продуктовой
                                                                линейки;
                                                            </li>
                                                            <li>Организация и координация работ задействованных подразделений Компании (разработка страховой
                                                                документации, маркетинговых и учебных материалов, реализация в IT-системах);
                                                            </li>
                                                            <li>Подготовка и согласование описания бизнес-процессов по продукту;</li>
                                                        </ul>

                                                        <b>Требования</b>
                                                        <p>У специалиста, которого мы хотим видеть в нашей команде:</p>
                                                        <ul>
                                                            <li>Высшее финансовое или техническое образование;</li>
                                                            <li>Microsoft Word, Microsoft Excel, Microsoft PowerPoint, Microsoft Outlook, Microsoft Projec на уровне
                                                                пользователя;
                                                            </li>
                                                            <li>Знание законодательных и иные нормативные правовые акты, регламентирующие основы страховой
                                                                деятельности в РФ;
                                                            </li>
                                                        </ul>

                                                        <b>Условия</b>
                                                        <p>Что мы даем нашим сотрудникам:</p>
                                                        <ul>
                                                            <li>Стабильность и возможность участия в интересных проектах;</li>
                                                            <li>Конкурентный доход и бонусы от личных результатов;</li>
                                                            <li>Опытная команда менеджеров и плотное взаимодействие в рамках группы Сбербанк обеспечивает постоянное
                                                                профессиональное совершенствование сотрудников;
                                                            </li>
                                                            <li>Развитую систему внутрикорпоративного обучения;</li>
                                                            <li>Светлый и уютный офис, в двух минутах от м. Шаболовская;</li>
                                                            <li>И возможность делать жизни сотен тысяч людей в России лучше!</li>
                                                        </ul>

-->

                                                        <a data-vakans="<?=$item->title?>" onclick="feedbak_on_show();" ng-dialog="/templates/resume.dialog.tpl.php" ng-dialog-close-previous="" href="#" class="btn btn_green btn_size_m vacancy__btn js__resume">Отправить резюме</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <!--
                                                                <div class="accordion-list__item js-accordeon">
                                                                    <div class="accordion-list__header js-accordeon-title">
                                                                        <div class="accordion-list__title">Продукт-менеджер</div>
                                                                    </div>
                                                                    <div class="accordion-list__body js-accordeon-body">
                                                                        <div class="accordion-list__body-inner vacancy">
                                                                            <div class="vacancy__text text text_left">
                                                                                <div class="vacancy__info">
                                                                                    <div class="vacancy__info-item">
                                                                                        <b>Уровень з/п: </b>
                                                                                        <span>Не указана</span>
                                                                                    </div>
                                                                                    <div class="vacancy__info-item">
                                                                                        <b>Опыт работы: </b>
                                                                                        <span>2-3 года</span>
                                                                                    </div>
                                                                                    <div class="vacancy__info-item">
                                                                                        <b>Тип занятости: </b>
                                                                                        <span>полный</span>
                                                                                    </div>
                                                                                </div>
                                                                                <b>Обязанности</b>
                                                                                <p>Наше обещание клиентам:</p>
                                                                                <p>Мы работаем для того, чтобы помочь гражданам России не бояться планировать свое будущее, перестать жить
                                                                                    только сегодняшним днем. Благодаря нашим продуктам мечты, устремления и обещания, данные себе и своим
                                                                                    близким, будут реализованы.
                                                                                    Несмотря ни на что.</p>
                                                                                <p>Какие задачи предстоит решать:</p>
                                                                                <ul>
                                                                                    <li>Определение характеристик целевых групп, анализ предпочтений, участие в исследование потребителей;
                                                                                    </li>
                                                                                    <li>Проводить сравнительный анализ существующих на рынке аналогов;</li>
                                                                                    <li>Оформление идеи продукта (предварительное описание или паспорт продукта), оценка бизнес-потенциала и
                                                                                        необходимых ресурсов для реализации;
                                                                                    </li>
                                                                                    <li>Согласование идеи и дизайна продукта на Продуктовом комитете;</li>
                                                                                    <li>Проработка и создание дополнительных продуктовых сервисов;</li>
                                                                                    <li>Подготовка и согласование предложений по оптимизации и совершенствованию существующей продуктовой
                                                                                        линейки;
                                                                                    </li>
                                                                                    <li>Организация и координация работ задействованных подразделений Компании (разработка страховой
                                                                                        документации, маркетинговых и учебных материалов, реализация в IT-системах);
                                                                                    </li>
                                                                                    <li>Подготовка и согласование описания бизнес-процессов по продукту;</li>
                                                                                </ul>

                                                                                <b>Требования</b>
                                                                                <p>У специалиста, которого мы хотим видеть в нашей команде:</p>
                                                                                <ul>
                                                                                    <li>Высшее финансовое или техническое образование;</li>
                                                                                    <li>Microsoft Word, Microsoft Excel, Microsoft PowerPoint, Microsoft Outlook, Microsoft Projec на уровне
                                                                                        пользователя;
                                                                                    </li>
                                                                                    <li>Знание законодательных и иные нормативные правовые акты, регламентирующие основы страховой
                                                                                        деятельности в РФ;
                                                                                    </li>
                                                                                </ul>

                                                                                <b>Условия</b>
                                                                                <p>Что мы даем нашим сотрудникам:</p>
                                                                                <ul>
                                                                                    <li>Стабильность и возможность участия в интересных проектах;</li>
                                                                                    <li>Конкурентный доход и бонусы от личных результатов;</li>
                                                                                    <li>Опытная команда менеджеров и плотное взаимодействие в рамках группы Сбербанк обеспечивает постоянное
                                                                                        профессиональное совершенствование сотрудников;
                                                                                    </li>
                                                                                    <li>Развитую систему внутрикорпоративного обучения;</li>
                                                                                    <li>Светлый и уютный офис, в двух минутах от м. Шаболовская;</li>
                                                                                    <li>И возможность делать жизни сотен тысяч людей в России лучше!</li>
                                                                                </ul>
                                                                                <a data-vakans="Продукт-менеджер" onclick="feedbak_on_show();" ng-dialog="/templates/resume.dialog.tpl.php" ng-dialog-close-previous="" href="#" class="btn btn_green btn_size_m vacancy__btn js__resume">Отправить резюме</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-list__item js-accordeon">
                                                                    <div class="accordion-list__header js-accordeon-title">
                                                                        <div class="accordion-list__title">Продукт-менеджер 222</div>
                                                                    </div>
                                                                    <div class="accordion-list__body js-accordeon-body">
                                                                        <div class="accordion-list__body-inner vacancy">
                                                                            <div class="vacancy__text text text_left">
                                                                                <div class="vacancy__info">
                                                                                    <div class="vacancy__info-item">
                                                                                        <b>Уровень з/п: </b>
                                                                                        <span>Не указана</span>
                                                                                    </div>
                                                                                    <div class="vacancy__info-item">
                                                                                        <b>Опыт работы: </b>
                                                                                        <span>2-3 года</span>
                                                                                    </div>
                                                                                    <div class="vacancy__info-item">
                                                                                        <b>Тип занятости: </b>
                                                                                        <span>полный</span>
                                                                                    </div>
                                                                                </div>
                                                                                <b>Обязанности</b>
                                                                                <p>Наше обещание клиентам:</p>
                                                                                <p>Мы работаем для того, чтобы помочь гражданам России не бояться планировать свое будущее, перестать жить только
                                                                                    сегодняшним днем. Благодаря нашим продуктам мечты, устремления и обещания, данные себе и своим близким, будут
                                                                                    реализованы.
                                                                                    Несмотря ни на что.</p>
                                                                                <p>Какие задачи предстоит решать:</p>
                                                                                <ul>
                                                                                    <li>Определение характеристик целевых групп, анализ предпочтений, участие в исследование потребителей;</li>
                                                                                    <li>Проводить сравнительный анализ существующих на рынке аналогов;</li>
                                                                                    <li>Оформление идеи продукта (предварительное описание или паспорт продукта), оценка бизнес-потенциала и
                                                                                        необходимых ресурсов для реализации;
                                                                                    </li>
                                                                                    <li>Согласование идеи и дизайна продукта на Продуктовом комитете;</li>
                                                                                    <li>Проработка и создание дополнительных продуктовых сервисов;</li>
                                                                                    <li>Подготовка и согласование предложений по оптимизации и совершенствованию существующей продуктовой
                                                                                        линейки;
                                                                                    </li>
                                                                                    <li>Организация и координация работ задействованных подразделений Компании (разработка страховой документации,
                                                                                        маркетинговых и учебных материалов, реализация в IT-системах);
                                                                                    </li>
                                                                                    <li>Подготовка и согласование описания бизнес-процессов по продукту;</li>
                                                                                </ul>

                                                                                <b>Требования</b>
                                                                                <p>У специалиста, которого мы хотим видеть в нашей команде:</p>
                                                                                <ul>
                                                                                    <li>Высшее финансовое или техническое образование;</li>
                                                                                    <li>Microsoft Word, Microsoft Excel, Microsoft PowerPoint, Microsoft Outlook, Microsoft Projec на уровне
                                                                                        пользователя;
                                                                                    </li>
                                                                                    <li>Знание законодательных и иные нормативные правовые акты, регламентирующие основы страховой деятельности в
                                                                                        РФ;
                                                                                    </li>
                                                                                </ul>

                                                                                <b>Условия</b>
                                                                                <p>Что мы даем нашим сотрудникам:</p>
                                                                                <ul>
                                                                                    <li>Стабильность и возможность участия в интересных проектах;</li>
                                                                                    <li>Конкурентный доход и бонусы от личных результатов;</li>
                                                                                    <li>Опытная команда менеджеров и плотное взаимодействие в рамках группы Сбербанк обеспечивает постоянное
                                                                                        профессиональное совершенствование сотрудников;
                                                                                    </li>
                                                                                    <li>Развитую систему внутрикорпоративного обучения;</li>
                                                                                    <li>Светлый и уютный офис, в двух минутах от м. Шаболовская;</li>
                                                                                    <li>И возможность делать жизни сотен тысяч людей в России лучше!</li>
                                                                                </ul>
                                                                                <a data-vakans="Продукт-менеджер 222" onclick="feedbak_on_show();" ng-dialog="/templates/resume.dialog.tpl.php" ng-dialog-close-previous="" href="#" class="btn btn_green btn_size_m vacancy__btn">Отправить резюме</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                -->
                                </div>


                        </div>
                    </div>
                    <?php
                } ?>
            </div>





            <?php if (0) { ?>
                <div class="navbar_sub_content js__about_navbar_sub_cont">
                    <div class="accordion-list active">
                        <?php
                        foreach($models as $item) { ?>
                            <div class="accordion-list__item js-accordeon">
                                <div class="accordion-list__header accordion-list__header_info js-accordeon-title">
                                    <?php if ($item->previewThumbUrl) { ?>
                                        <img src="<?=$item->previewThumbUrl?>" alt="" class="accordion-list__header-img">
                                        <?php
                                    } ?>
                                    <div class="accordion-list__info">
                                        <div class="accordion-list__info-title"><?=$item->title?></div>
                                        <div class="accordion-list__info-description"><?=$item->preview_text?></div>
                                    </div>
                                </div>
                                <div class="accordion-list__body js-accordeon-body">
                                    <div class="accordion-list__body-inner">
                                        <div class="text person-text">
                                            <?=$item->detail_text?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } ?>

        </div>
    </div>
</div>
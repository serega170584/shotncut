<div ng-controller="siMainController as vm" class="si-layout__body si-layout__body_accentuated">
    <div class="si-hero">
        <div class="si-hero__overlay">
            <video autoplay loop muted>
                <source src="/assets/videos/SBER_Strahovanie.mp4" type="video/mp4">
            </video>
        </div>
        <div class="si-hero__container">
            <div class="si-layout-section si-layout-section_s_m">
                <div class="si-hero__text">Живите, как любите!<br>А мы Вас поддержим!</div>
            </div>
            <?php /*<div class="si-layout-section si-layout-section_s_m">
                <div class="r r_s_m r_j_c">
                    <div class="r__c"><a class="sb-button sb-button_s_m sb-button_theme_a"><span class="sb-button__text">Стать участником</span></a></div>
                    <div class="r__c"><a href="#si-menu-how-works" si-menu-toggle class="sb-button sb-button_s_m sb-button_theme_b"><span class="sb-button__text">Как это работает</span></a></div>
                </div>
            </div>*/?>
        </div>
    </div>
    <div class="si-container">
        <div class="si-spacer si-spacer_s_m  si-spacer si-spacer-first-temp first_prod_menu_outer">
            <div class="si-panel si-panel_s_s first_prod_menu">

                <div class="r r_s_s">
                    <div ng-repeat="type in vm.types" class="r__c">
                        <a data-type="{{type.code}}" href="#" ng-click="vm.filter(type)" ng-class="{'si-tag-button_active': type.active}" class="si-tag-button si-tag-button_theme_a js__first_prod_menu_it"><span ng-bind="type.name" class="si-tag-button__text"></span></a>
                    </div>
                </div>
            </div>


            <!--            <div class="si-panel si-panel_s_s first_prod_menu_list">-->

            <div class="news_list__header_filtr">
                <div class="news_list__header_toggle_view js_news_toggle_view">
                    <a class="js_news_tooltip ico_news_toggle_view_1 active" title="Вид плиткой" href="#"></a>
                    <a class="js_news_tooltip ico_news_toggle_view_2" title="Вид списком" href="#"></a>
                </div>
                <div class="news_list__header_toggle_date js_toggle_date">
                    <input readonly="readonly" id="news_toggle_date" type="text" placeholder="Новости по месяцам" />
                </div>
            </div>
            <!--
                            <div class="r r_s_s">
                                <div class="r__c" style="margin-left: 20px;">
                                    <a class="si-tag-button si-tag-button_theme_a js__first_news_list" href="#"><span
                                            class="si-tag-button__text">списком</span></a>
                                </div>
                            </div>-->
            <!--            </div>-->

        </div>
        <div class="block__inner_clearfix"></div>


        <!--  Новости фильтр по компании   -->
        <div style="display: none;" class="si-spacer si-spacer_s_m js__first_nw_menu_outer js__first_prod_menu_sub_nw">
            <div style="padding-left: .5rem;" class="r">

                <div class="r__c"><a data-nwcomp="1" href="#" class="si-tag-button si-tag-button_theme_b"><span
                            class="si-tag-button__text">ООО СК «Сбербанк страхование»</span></a></div>

                <div class="r__c"><a data-nwcomp="2" href="#" class="si-tag-button si-tag-button_theme_b"><span
                            class="si-tag-button__text">ООО СК «Сбербанк страхование жизни»</span></a></div>

            </div>
        </div>
        <div class="block__inner_clearfix"></div>



        <div style="display: none;" class="si-spacer si-spacer_s_m js__first_prod_menu_outer js__first_prod_menu_sub_2">
            <div style="padding-left: .5rem;" class="r">

                <div class="r__c"><a data-cat="all" href="#" class="si-tag-button si-tag-button_theme_b si-tag-button_active"><span
                            class="si-tag-button__text">Все</span></a></div>

                <?php
                $i = 0;
                foreach($data['category2'] as $cat) {
                    ?>
                    <div class="r__c"><a data-cat="<?=$cat->id?>" href="#" class="si-tag-button si-tag-button_theme_b"><span
                                class="si-tag-button__text"><?=$cat->name?></span></a></div>
                    <?php
                    $i++;
                }
                ?>
            </div>
        </div>


        <div style="display: none;" class="si-spacer si-spacer_s_m js__first_prod_menu_outer js__first_prod_menu_sub">
            <div style="padding-left: .5rem;" class="r">
                <!--
                                <div class="r__c"><a data-cat="all" href="#" class="si-tag-button si-tag-button_theme_b si-tag-button_active"><span
                                            class="si-tag-button__text">Все</span></a></div>
                                -->
                <?php
                $i = 0;
                foreach($data['category'] as $cat) {
                    ?>
                    <div class="r__c"><a data-cat="<?=$cat->id?>" href="#" class="si-tag-button si-tag-button_theme_b"><span
                                class="si-tag-button__text"><?=$cat->name?></span></a></div>
                    <?php
                    $i++;
                }
                ?>
            </div>
        </div>



        <div style="display: none;" class="si-spacer si-spacer_s_m js__first_video_menu">
            <div style="padding-left: .5rem;" class="r">
                <div class="r__c"><a data-cat="all" href="#" class="si-tag-button si-tag-button_theme_b si-tag-button_active"><span
                            class="si-tag-button__text">Все</span></a></div>
                <?php
                foreach($data['category_video'] as $cat_id => $cat_item) {
                    ?>
                    <div class="r__c"><a data-cat="<?=$cat_id?>" href="#" class="si-tag-button si-tag-button_theme_b"><span
                                class="si-tag-button__text"><?=$cat_item?></span></a></div>
                    <?php
                }
                ?>
            </div>
        </div>



        <div style="display: none;" class="si-spacer si-spacer_s_m">
            <div style="padding-left: .5rem;" class="r">
                <div class="r__c"><a href="#" class="si-tag-button si-tag-button_theme_b si-tag-button_active"><span class="si-tag-button__text">Все</span></a></div>
                <div class="r__c"><a href="#" class="si-tag-button si-tag-button_theme_b"><span class="si-tag-button__text">Образование</span></a></div>
                <div class="r__c"><a href="#" class="si-tag-button si-tag-button_theme_b"><span class="si-tag-button__text">Путешествия</span></a></div>
                <div class="r__c"><a href="#" class="si-tag-button si-tag-button_theme_b"><span class="si-tag-button__text">Квартира и дом</span></a></div>
                <div class="r__c"><a href="#" class="si-tag-button si-tag-button_theme_b"><span class="si-tag-button__text">Здоровье и жизнь</span></a></div>
            </div>
        </div>



        <div class="si-spacer si-spacer_s_m prod_all_list js__prod_outer">
            <div isotope-container class="si-isotope si-isotope__container">
                <div data-nwcomp="{{node.comp_num}}"
                     data-pub-m="{{node.pub_dat_m}}"
                     data-pub-y="{{node.pub_dat_y}}"
                     data-cat="{{node.category.id}}" data-cat2="{{node.category2.id}}" data-videocat="{{node.videocat}}" data-type="{{node.type.code}}" ng-repeat="node in vm.nodes" isotope-item style="" class="si-isotope__item si-isotope__item_s_s type_{{node.type.code}} js__prod_item">
                    <si-node data="node"></si-node>
                </div>
            </div>
        </div>
        <!--
                <div ng-hide="vm.page == vm.pages" class="si-spacer si-spacer_s_m">
                    <div class="si-layout-section si-layout-section_a_c"><a href="#" ng-click="vm.getNodes()" class="sb-button sb-button_s_m sb-button_theme_a"><span class="sb-button__text">Загрузить еще</span></a></div>
                </div>
        -->
        <div class="si-spacer si-spacer_s_m">
            <div class="si-layout-section si-layout-section_a_c"><a style="display: none;" href="#" class="sb-button sb-button_s_m sb-button_theme_a js__prod_more"><span class="sb-button__text">Показать еще</span></a></div>
        </div>

    </div>
</div>


<?php
echo $this->render('news_modal', ['news' => $data['news']]);
echo $this->render('video_modal', ['videos' => $data['videos']]);
?>



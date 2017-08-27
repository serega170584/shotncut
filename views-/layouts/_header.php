<?php
use app\models\category\CategoryMenu;
$cat = CategoryMenu::findOne(['depth' => 0]);

$child_1 = $cat->children;
?>


<div class="si-menu">

<div id="si-menu" class="si-menu__pane si-menu__pane_theme_a">
    <div class="si-layout-section">
        <div class="si-menu__topbar">
            <div class="container container_s_m">
                <div class="r r_s_m r_a_c">
                    <div class="r__c"><a href="tel:" class="si-link si-link_theme_c"><span class="si-link__text">8 (800) 555-55-95</span></a></div>
                    <div class="r__c"><a href="tel:" class="si-link si-link_theme_c"><span class="si-link__text">8 (800) 555-55-57</span></a></div>
                    <div class="r__c"><a href="#" ng-dialog="/templates/feedback.dialog.tpl.php" ng-dialog-close-previous class="sb-button sb-button_theme_d"><span class="sb-button__text">Обратная связь</span></a></div>
                    <div class="r__c r__c_r"><a target="_blank" href="https://www.sberbank.ru/ru/about/today/oib" class="si-link si-link_theme_d"><span class="si-icon"><svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 15.5s-5.5-4.687-5.5-9.375C2.5 3.019 4.962.5 8 .5s5.5 2.519 5.5 5.625C13.5 10.813 8 15.5 8 15.5zm0-12a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z" fill-rule="evenodd"/></svg></span><span class="si-link__text">Офисы продаж</span></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="si-layout-section si-layout-section_s_m">
        <div class="container container_s_m">
            <div si-menu-navigation class="r r_s_m">
                <div class="r__c r__c_md_4">
                    <ul si-menu-navigation-pane data-level="0" data-ng-show="active" class="si-menu-navigation">

                        <?php
                        $child_2 = [];

                        foreach ($child_1 as $i => $node) {

                            $is_child = $node->children;

                            if($is_child) {
                                $child_2[] = $node;
                            }
                            ?>
                            <li si-menu-navigation-toggle <?=($is_child)?'data-toggle="#p'.$node->id.'"':''?> class="si-menu-navigation__item">
                                <a href="<?=$node->link?>" class="si-menu-navigation__link <?=($node->gray)?'grey':''?>"><?=$node->name?></a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php if (0) { ?>
                            <li si-menu-navigation-toggle data-toggle="#p1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Физическим лицам</a></li>
                            <li si-menu-navigation-toggle data-toggle="#p2" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Для бизнеса</a></li>
                            <li si-menu-navigation-toggle data-toggle="#p3" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link grey">Твоя команда поддержки</a></li>
                            <li si-menu-navigation-toggle data-toggle="#p4" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link grey">Компания</a></li>

                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link grey">Партнерам</a></li>
                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link"></a></li>
                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link"></a></li>				<li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link"></a></li>
                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link"></a></li>
                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link"></a></li>				<li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link"></a></li>
                            <?php
                        } ?>
                    </ul>
                </div>

                <?php if (count($child_2)) { ?>
                    <div class="r__c r__c_md_8">
                        <div class="r r_s_m">
                            <!--  МЕНЮ 1 УРОВНЯ -->
                            <div class="r__c r__c_md_4">
                                <?php

                                $child_3 = [];
                                $child_4 = [];

                                foreach ($child_2 as $i => $node) {

                                    $child_2_2 = $node->children;

                                    if($child_2_2) {
                                        $child_3[] = $node;
                                    }

                                    if ($child_2_2) {
                                        ?>
                                        <ul si-menu-navigation-pane data-level="<?=($node->depth)?>" data-ng-show="active" id="p<?= $node->id ?>"
                                            class="si-menu-navigation">
                                            <?php
                                            foreach ($child_2_2 as $node2) {
                                                $is_child = $node2->children;

                                                if ($is_child) {
                                                    $child_4[] = $node2;
                                                }
                                                ?>
                                                <li si-menu-navigation-toggle <?= ($is_child) ? 'data-toggle="#p' . $node2->id . '"' : '' ?>
                                                    class="si-menu-navigation__item">
                                                    <a href="<?=$node2->link?>" class="si-menu-navigation__link <?=($node2->gray)?'grey':''?>"><?=$node2->name?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <?php
                                    }
                                }
                                ?>
                                <?php if (0) { ?>
                                    <ul si-menu-navigation-pane data-level="1" data-ng-show="active" id="p1" class="si-menu-navigation">
                                        <li si-menu-navigation-toggle data-toggle="#p1_1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Купить онлайн</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p1_2" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">В офисе Сбербанка</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p1_3" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">У партнеров</a></li>
                                    </ul>
                                    <ul si-menu-navigation-pane data-level="1" data-ng-show="active" id="p2" class="si-menu-navigation">
                                        <li si-menu-navigation-toggle data-toggle="#p2_1" class="si-menu-navigation__item"><a href="#"
                                                                                                                              class="si-menu-navigation__link">В офисе Сбербанка2</a></li>
                                    </ul>
                                    <!--<ul si-menu-navigation-pane data-level="1" data-ng-show="active" id="p3" class="si-menu-navigation">
                                        <li si-menu-navigation-toggle data-toggle="#p3_1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Наши эксперты</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p3_2" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Финансовая грамотность</a></li>
                                    </ul>
                                    <ul si-menu-navigation-pane data-level="1" data-ng-show="active" id="p4" class="si-menu-navigation">
                                        <li si-menu-navigation-toggle data-toggle="#p4_1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Вакансии</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p4_2" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Новости</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p4_3" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">О нас</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p4_4" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Команда</a></li>
                                        <li si-menu-navigation-toggle data-toggle="#p4_5" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Контакты</a></li>
                                    </ul>-->
                                    <?php
                                } ?>
                            </div>


                            <?php if (count($child_4)) { ?>

                                <!--  МЕНЮ 2 УРОВНЯ -->
                                <div class="r__c r__c_md_4">
                                    <?php

                                    $child_5 = [];
                                    $child_6 = [];

                                    foreach ($child_4 as $node) {

                                        $child_4_2 = $node->children;

                                        if($child_4_2) {
                                            $child_5[] = $node;
                                        }

                                        $child4 = $node->children;

                                        if ($child_4_2) {
                                            ?>
                                            <ul si-menu-navigation-pane data-level="<?=($node->depth)?>" data-ng-show="active" id="p<?= $node->id ?>" class="si-menu-navigation">
                                                <?php
                                                foreach ($child_4_2 as $node2) {
                                                    $is_child = $node2->children;

                                                    if ($is_child) {
                                                        $child_6[] = $node2;
                                                    }
                                                    ?>
                                                    <li si-menu-navigation-toggle <?= ($is_child) ? 'data-toggle="#p' . $node2->id . '"' : '' ?>
                                                        class="si-menu-navigation__item"><a href="<?=$node2->link?>" class="si-menu-navigation__link <?=($node2->gray)?'grey':''?>"><?=$node2->name?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php if (0) { ?>
                                        <ul si-menu-navigation-pane data-level="2" data-ng-show="active" id="p1_1" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=38" class="si-menu-navigation__link">Страхование путешественников Онлайн</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=34" class="si-menu-navigation__link">Страхование ипотеки онлайн - имущество</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=5" class="si-menu-navigation__link">Защита дома Онлайн</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=6" class="si-menu-navigation__link">Защита карт Онлайн</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=33" class="si-menu-navigation__link">Защита от клеща Онлайн</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=25" class="si-menu-navigation__link">Мультиполис Онлайн</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=8" class="si-menu-navigation__link">Защита близких Онлайн</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=7" class="si-menu-navigation__link">Глава семьи Онлайн</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="2" data-ng-show="active" id="p1_2" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle data-toggle="#p1_2_1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Кредитное страхование</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_2_2" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Ипотечное страхование</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_2_3" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Вложить и заработать</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_2_4" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Накопить и сохранить</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_2_5" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Жизнь и здоровье</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="2" data-ng-show="active" id="p1_3" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle data-toggle="#p1_3_1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Сетелем банк</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_3_2" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Ростелеком</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_3_3" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Росбанк</a></li>
                                            <li si-menu-navigation-toggle data-toggle="#p1_3_4" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Евросеть</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="2" data-ng-show="active" id="p2_1" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle data-toggle="#p2_1_1" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Страхование имущества, ответственности</a></li>

                                        </ul>
                                    <?php } ?>
                                </div>


                                <!--  МЕНЮ 3 УРОВНЯ -->
                                <?php
                                if (count($child_6)) {?>
                                    <div class="r__c r__c_md_4">
                                    <?php
                                    foreach ($child_6 as $node) {
                                        $child_6_2 = $node->children;

                                        if ($child_6_2) {
                                            ?>
                                            <ul si-menu-navigation-pane data-level="<?=($node->depth)?>" data-ng-show="active" id="p<?= $node->id ?>" class="si-menu-navigation">
                                                <?php
                                                foreach ($child_6_2 as $node2) {
                                                    ?>
                                                    <li si-menu-navigation-toggle
                                                        class="si-menu-navigation__item"><a href="<?=$node2->link?>" class="si-menu-navigation__link <?=($node2->gray)?'grey':''?>"><?=$node2->name?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php if (0) { ?>
                                    <div class="r__c r__c_md_4">
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_2_1" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=12" class="si-menu-navigation__link">Страхование заемщиков кредитов Сбербанка</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_2_2" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=35" class="si-menu-navigation__link">Ипотечное страхование жизни "Защищенный заемщик"</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=34" class="si-menu-navigation__link">Ипотечное страхование имуществ</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_2_3" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=26" class="si-menu-navigation__link">Защищенная инвестиционная программа СмартПолис</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_2_4" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=31" class="si-menu-navigation__link">Детский образовательный план</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=30" class="si-menu-navigation__link">Первый капитал</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=32" class="si-menu-navigation__link">Семейный актив</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_2_5" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=27" class="si-menu-navigation__link">Подушка безопасности</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_3_1" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=13" class="si-menu-navigation__link">Страхование заемщиков кредитов "Сетелем Банк"</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=25" class="si-menu-navigation__link">Мультиполис</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_3_2" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=5" class="si-menu-navigation__link">Защита дома</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=16" class="si-menu-navigation__link">Страхование средств на банковских картах Сбербанка</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=15" class="si-menu-navigation__link">Защита от клеща</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p1_3_4" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=23" class="si-menu-navigation__link">Защита техники</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=5" class="si-menu-navigation__link">Защита дома</a></li>
                                        </ul>
                                        <ul si-menu-navigation-pane data-level="3" data-ng-show="active" id="p2_1_1" class="si-menu-navigation">
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=17" class="si-menu-navigation__link">Стабильный бизнес</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=19" class="si-menu-navigation__link">Гражданская ответственность</a></li>
                                            <li si-menu-navigation-toggle class="si-menu-navigation__item"><a href="/policy/view?id=20" class="si-menu-navigation__link">Движимое имущество</a></li>
                                        </ul>
                                    </div>
                                    <?php
                                } ?>
                                <?php
                            } ?>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </div>
</div>
<?php

//TODO: сделать динамически
$online_father      = \app\models\node\Policy::find()->byAlias('father')->all();
$online_travels     = \app\models\node\Policy::find()->byAlias('travels')->all();
$online_auto        = \app\models\node\Policy::find()->byAlias('auto')->all();
$online_operator    = \app\models\node\Policy::find()->byAlias('operator')->all();
$online_card        = \app\models\node\Policy::find()->byAlias('card')->all();
$online_house       = \app\models\node\Policy::find()->byAlias('house')->all();
//$online_protect     = \app\models\node\Policy::find()->byAlias('protect')->all();

?>



<div id="si-menu-goods" class="si-menu__pane si-menu__pane_theme_a">
    <div class="si-layout-section si-layout-section_s_m">
        <div class="container container_s_m">
            <div si-menu-navigation class="r r_s_m">
                <div class="r__c r__c_md_4">
                    <ul si-menu-navigation-pane data-level="0" data-ng-show="active" class="si-menu-navigation">
                        <li si-menu-navigation-toggle data-toggle="#7aedc7e6-8f97-461c-acf8-552834d8f975" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Путешествия</a></li>
                        <li si-menu-navigation-toggle data-toggle="#c0343a32-1722-4679-a1ac-ab12c2d98106" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Ипотечное страхование Онлайн</a></li>
                        <li si-menu-navigation-toggle data-toggle="#dbdda400-d4fb-4d67-923b-ae5b29830672" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Квартира и дом</a></li>
                        <li si-menu-navigation-toggle data-toggle="#49882c34-4a86-4bea-bdcc-3e95eb823eb0" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Здоровье и жизнь</a></li>
                        <li si-menu-navigation-toggle data-toggle="#e7186554-6255-44f2-960e-726f661ddb77" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Защита финансов</a></li>
                        <li si-menu-navigation-toggle data-toggle="#f3142c03-532e-42a7-8547-c1e799fec460" class="si-menu-navigation__item"><a href="#" class="si-menu-navigation__link">Сотрудникам Группы Сбербанк</a></li>
                    </ul>
                </div>
                <div class="r__c r__c_md_8">
                    <div id="7aedc7e6-8f97-461c-acf8-552834d8f975" si-menu-navigation-pane data-level="1" data-ng-show="active" class="si-layout-section">
                        <div class="r r_s_m">
                            <?php
                            foreach($online_travels as $travels) {
                                echo $this->render('_policy_item_menu', ['model' => $travels]);
                            }
                            ?>
                        </div>
                    </div>
                    <div id="c0343a32-1722-4679-a1ac-ab12c2d98106" si-menu-navigation-pane data-level="1" data-ng-show="active" class="si-layout-section">
                        <div class="r r_s_m">
                            <?php
                            foreach($online_auto as $auto) {
                                echo $this->render('_policy_item_menu', ['model' => $auto]);
                            }
                            ?>
                        </div>
                    </div>
                    <div id="dbdda400-d4fb-4d67-923b-ae5b29830672" si-menu-navigation-pane data-level="1" data-ng-show="active" class="si-layout-section">
                        <div class="r r_s_m">
                            <?php
                            foreach($online_father as $father) {
                                echo $this->render('_policy_item_menu', ['model' => $father]);
                            }
                            ?>
                            <?php //echo $this->render('_policy_item_menu', ['model' => $online_father]); ?>
                            <?php //echo $this->render('_policy_item_menu', ['model' => $online_protect]); ?>
                        </div>
                    </div>
                    <div id="49882c34-4a86-4bea-bdcc-3e95eb823eb0" si-menu-navigation-pane data-level="1" data-ng-show="active" class="si-layout-section">
                        <div class="r r_s_m">
                            <?php
                            foreach($online_house as $house) {
                                echo $this->render('_policy_item_menu', ['model' => $house]);
                            }
                            ?>
                            <?php //echo $this->render('_policy_item_menu', ['model' => $online_house]); ?>
                        </div>
                    </div>
                    <div id="e7186554-6255-44f2-960e-726f661ddb77" si-menu-navigation-pane data-level="1" data-ng-show="active" class="si-layout-section">
                        <div class="r r_s_m">
                            <?php
//                            foreach($online_card as $card) {
                                //echo $this->render('_policy_item_menu', ['model' => $house]);
//                            }
                            ?>
                            <?php
                            foreach($online_card as $card) {
                                echo $this->render('_policy_item_menu', ['model' => $card]);
                            }
                            //echo $this->render('_policy_item_menu', ['model' => $card]);
                            ?>
                        </div>
                    </div>
                    <div id="f3142c03-532e-42a7-8547-c1e799fec460" si-menu-navigation-pane data-level="1" data-ng-show="active" class="si-layout-section">
                        <div class="r r_s_m">
                            <?php
                            foreach($online_operator as $operator) {
                                echo $this->render('_policy_item_menu', ['model' => $operator]);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="si-menu-how-works" class="si-menu__pane si-menu__pane_theme_b">
    <div class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-work-steps">
                <div class="r r_s_m">
                    <div class="r__c r__c_md_4">
                        <div class="si-work-steps__item">
                            <div class="si-work-steps__image"><img src="/assets/images/how-works-1.png" srcset="/assets/images/how-works-1_2x.png 2x" alt=""></div>
                            <div class="si-work-steps__text">Присоединяйтесь<br>к жизни в стиле SberLife</div>
                        </div>
                    </div>
                    <div class="r__c r__c_md_4">
                        <div class="si-work-steps__item">
                            <div class="si-work-steps__image"><img src="/assets/images/how-works-2.png" srcset="/assets/images/how-works-2_2x.png 2x" alt=""></div>
                            <div class="si-work-steps__text">Занимайтесь любимым<br>делом, узнавайте новое,<br>делитесь своим опытом</div>
                        </div>
                    </div>
                    <div class="r__c r__c_md_4">
                        <div class="si-work-steps__item">
                            <div class="si-work-steps__image"><img src="/assets/images/how-works-3.png" srcset="/assets/images/how-works-3_2x.png 2x" alt=""></div>
                            <div class="si-work-steps__text">Получайте сберкоины<br>и будьте уверены –<br>мы вас поддержим!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="si-layout-section si-layout-section_s_m si-layout-section_a_c"><a href="#" class="sb-button sb-button_s_m sb-button_theme_c"><span class="sb-button__text">Изменить свое будущее</span></a></div>
    </div>
</div>



<div id="si-menu-request" class="si-menu__pane si-menu__pane_theme_a">
    <div id="menu-request" class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-h si-h_type_2">Урегулируйте убыток</div>
        </div>
        <div class="si-layout-section si-layout-section_s_s">
            <div class="r r_s_m">
                <div style="border-right: 1px solid #e5e5e5; padding: 0 48px 0 16px;" class="r__c r__c_md_4">
                    <div class="si-h si-h_type_3">В личном кабинете</div>
                    <div class="si-layout-section si-layout-section_s_s"><a href="https://online.sberbankins.ru/lk/index.html#/posLogin" target="_blank" class="sb-button sb-button_s_m sb-button_theme_e"><span class="sb-button__text">ООО СК “Сбербанк страхование”</span></a></div>
                    <div class="si-layout-section si-layout-section_s_s"><a href="https://sberinsurance-online.ru/webmvc/login/login" target="_blank" class="sb-button sb-button_s_m sb-button_theme_e"><span class="sb-button__text">ООО СК “Сбербанк страхование жизни”</span></a></div>
                </div>


                <div style="border-right: 1px solid #e5e5e5; padding: 0 28px;" class="r__c r__c_md_4">

                    <div class="si-h si-h_type_3">
                        <a href="#" class="request__prev js__request__prev"></a>
                        Через заявку на сайте
                    </div>

                    <div class="request_outer">
                        <div class="request_step request_step_1">

                            <div class="si-layout-section si-layout-section_s_s"><!--
                            --><a href="#" data-comp="<?=Yii::$app->params['email_to2']?>" target="_blank" class="sb-button sb-button_s_m sb-button_theme_e js__request_comp"><span class="sb-button__text">ООО СК “Сбербанк страхование”</span></a></div>

                            <div class="si-layout-section si-layout-section_s_s"><!--
                            --><a href="#" data-comp="<?=Yii::$app->params['email_to']?>" target="_blank" class="sb-button sb-button_s_m sb-button_theme_e js__request_comp"><span class="sb-button__text">ООО СК “Сбербанк страхование жизни”</span></a></div>

                        </div>
                        <div class="request_step request_step_2">

                            <div class="si-layout-section si-layout-section_s_s">
                                <input id="inp__what_h" name="inp__what_h" type="text" placeholder="Что произошло?" class="si-input si-input_theme_b"/>
                            </div>
                            <div class="si-layout-section si-layout-section_s_s">
                                <a show="#request" hide="#menu-request" style="width: 140px;" si-menu-tab-toggle="si-menu-tab-toggle" class="sb-button sb-button_theme_e sb-button_s_m request__next js__request_next"><span class="sb-button__text">Далее</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div style="padding: 0 16px 0 48px;" class="r__c r__c_md_4">
                    <div class="si-h si-h_type_3">По телефону</div>
                    <div class="si-layout-section si-layout-section_s_s"><a href="tel:88005555557" class="si-link si-link_theme_c"><span class="si-link__text">8 (800) 555-55-57</span></a>
                        <div class="small-text">ООО СК “Сбербанк страхование”</div>
                    </div>
                    <div class="si-layout-section si-layout-section_s_s"><a href="tel:88005555595" class="si-link si-link_theme_c"><span class="si-link__text">8 (800) 555-55-95</span></a>
                        <div class="small-text">ООО СК “Сбербанк страхование жизни”</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="request" style="display: none;" class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-request"><a show="#menu-request" hide="#request" si-menu-tab-toggle="si-menu-tab-toggle" class="si-request__close"><span>Заявка на получение выплаты</span></a>
                <form class="si-request__form js__request__form">
                    <input type="hidden" name="inp__company_email" id="inp__company_email" value="">
                    <div class="js__si-request__slide_1">

                        <input id="inp__what" name="inp__what" type="hidden" />
                        <div class="si-layout-section si-layout-section_s_s">
                            <div class="r r_s_m">
                                <div class="r__c r__c_md_6">
                                    <input name="inp__num_polis" type="text" placeholder="№ полиса" class="si-input si-input_theme_b"/>
                                    <div class="inp__error inp__error_num_polis"></div>
                                </div>
                                <div class="r__c r__c_md_6">
                                    <input name="inp__phone" type="text" placeholder="Телефон" class="si-input si-input_theme_b js__inp_phone"/>
                                    <div class="inp__error inp__error_phone"></div>
                                </div>
                            </div>
                        </div>
                        <div class="si-layout-section si-layout-section_s_s">
                            <div class="r r_s_m">
                                <div class="r__c r__c_md_6">
                                    <input name="inp__fio" type="text" placeholder="ФИО" class="si-input si-input_theme_b"/>
                                    <div class="inp__error inp__error_fio"></div>
                                </div>
                                <div class="r__c r__c_md_6">
                                    <input name="inp__email" type="text" placeholder="Email" class="si-input si-input_theme_b"/>
                                    <div class="inp__error inp__error_email"></div>
                                </div>
                            </div>
                        </div>
                        <div class="si-layout-section si-layout-section_s_s">
                            <textarea name="inp__message" rows="3" placeholder="Комментарий" class="si-input si-input_theme_b si-input_type_textarea"></textarea>
                            <div class="inp__error inp__error_message"></div>
                        </div>
                    </div>
                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="js__si-request__slide_2">
                            <button type="submit" style="width: auto;" class="sb-button sb-button_theme_e sb-button_s_m">
                                <div class="sb-button__text">Свяжитесь со мной</div>
                            </button>
                        </div>

                        <div class="f_success">
                            Спасибо! Ваше сообщение отправлено
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div id="si-menu-cabinet" class="si-menu__pane si-menu__pane_theme_a">
    <div id="menu-cabinet" class="container container_s_m">

        <div class="si-layout-section si-layout-section_s_s">
            <div class="r r_s_m">
                <div style="padding: 0 48px 0 16px;" class="r__c r__c_md_4">
                    <div class="si-h si-h_type_3">Вход в личный кабинет</div>
                    <div class="si-layout-section si-layout-section_s_s"><a href="https://online.sberbankins.ru/lk/index.html#/posLogin" target="_blank" class="sb-button sb-button_s_m sb-button_theme_e"><span class="sb-button__text">ООО СК “Сбербанк страхование”</span></a></div>
                    <div class="si-layout-section si-layout-section_s_s"><a href="https://sberinsurance-online.ru/webmvc/login/login" target="_blank" class="sb-button sb-button_s_m sb-button_theme_e"><span class="sb-button__text">ООО СК “Сбербанк страхование жизни”</span></a></div>
                </div>
            </div>
        </div>
    </div>
    <div id="cabinet" style="display: none;" class="container container_s_m">
        <div class="si-layout-section si-layout-section_s_m">
            <div class="si-request"><a show="#menu-request" hide="#request" si-menu-tab-toggle="si-menu-tab-toggle" class="si-request__close"><span>Заявка на получение выплаты</span></a>
                <form class="si-request__form">
                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_6"><input type="text" placeholder="№ полиса" class="si-input si-input_theme_b"/>
                            </div>
                            <div class="r__c r__c_md_6"><input type="text" class="si-input si-input_theme_b"/>
                            </div>
                        </div>
                    </div>
                    <div class="si-layout-section si-layout-section_s_s">
                        <div class="r r_s_m">
                            <div class="r__c r__c_md_6"><input type="text" placeholder="ФИО" class="si-input si-input_theme_b"/>
                            </div>
                            <div class="r__c r__c_md_6"><input type="text" placeholder="Email" class="si-input si-input_theme_b"/>
                            </div>
                        </div>
                    </div>
                    <div class="si-layout-section si-layout-section_s_s"><textarea rows="3" placeholder="Комментарий" class="si-input si-input_theme_b si-input_type_textarea"></textarea>
                    </div>
                    <div class="si-layout-section si-layout-section_s_s">
                        <button type="submit" style="width: auto;" class="sb-button sb-button_theme_e sb-button_s_m">
                            <div class="sb-button__text">Свяжитесь со мной
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    <!--
--><a href="#" si-menu-close class="si-menu__close"></a>
</div>
<?php
$comp_cr = Yii::$app->request->get('company', 0);
?>

<div class="si-layout__body si-layout__about">
    <div class="block">
        <div class="block__inner">

            <div class="page-title">
                <div class="page-title__title"><span>О компании</span></div>
            </div>

            <?php echo $this->render('_nav'); ?>

            <div class="page-content">
                <div class="page-content__content swiper-container js-about-company-slider">
                    <div class="about-company swiper-wrapper">
                        <?php
                        foreach($data['slider'] as $slide) {?>
                            <div class="about-company__list swiper-slide">

                                <?php if (trim($slide->text_1) || trim($slide->text_2)) { ?>
                                    <div class="about-company__item">
                                        <?php if (trim($slide->text_1)) { ?>
                                            <div class="about-company__item-title"><span><?=trim($slide->text_1)?></span></div>
                                            <?php
                                        } ?>
                                        <?php if (trim($slide->text_2)) { ?>
                                            <div class="about-company__item-text">
                                                <?=trim($slide->text_2)?>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                    <?php
                                } ?>

                                <?php if (trim($slide->text_3) || trim($slide->text_4)) { ?>
                                    <div class="about-company__item">
                                        <?php if (trim($slide->text_3)) { ?>
                                            <div class="about-company__item-title"><span><?=trim($slide->text_3)?></span></div>
                                            <?php
                                        } ?>
                                        <?php if (trim($slide->text_4)) { ?>
                                            <div class="about-company__item-text">
                                                <?=trim($slide->text_4)?>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                    <?php
                                } ?>

                                <?php if (trim($slide->text_5) || trim($slide->text_6)) { ?>
                                    <div class="about-company__item">
                                        <?php if (trim($slide->text_5)) { ?>
                                            <div class="about-company__item-title"><span><?=trim($slide->text_5)?></span></div>
                                            <?php
                                        } ?>
                                        <?php if (trim($slide->text_6)) { ?>
                                            <div class="about-company__item-text">
                                                <?=trim($slide->text_6)?>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                    <?php
                                } ?>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php if (count($data['slider']) > 1) { ?>
                        <div class="about-company__pagination pagination">
                            <div class="pagination__left js-about-company-left"></div>
                            <div class="pagination__page"><span class="js-about-company-active"></span> / <span class="js-about-company-slides"></span></div>
                            <div class="pagination__right js-about-company-right"></div>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>


            <?php if (0) { ?>
                <div class="page-content">
                    <div class="page-content__aside">
                        <div class="vacancy-preview">
                            <div class="vacancy-preview__title">Вакансии</div>
                            <a href="#" class="link link_green vacancy-preview__link">Бухгалтер на участок</a>
                            <a href="#" class="link link_green vacancy-preview__link">Руководитель проекта</a>
                            <a href="#" class="link link_green vacancy-preview__link">Старший юрисконсульт</a>
                            <a href="#" class="btn btn_gray btn_size_m vacancy-preview__btn">Показать все</a>
                        </div>
                    </div>
                    <div class="page-content__content">
                        <div class="our-team swiper-container js-our-team-slider">
                            <div class="our-team__header">
                                <div class="our-team__title"><span>Наша команда</span></div>
                                <div class="pagination-dot our-team__pagination js-our-team-pagination">
                                    <div class="pagination-dot__page pagination-dot__page_active"></div>
                                    <div class="pagination-dot__page"></div>
                                    <div class="pagination-dot__page"></div>
                                </div>
                            </div>
                            <div class="our-team__list swiper-wrapper">
                                <div class="our-team__person-group swiper-slide">
                                    <div class="our-team__person">
                                        <img src="static/img/img-person-tanya.jpg" alt="" class="our-team__photo">
                                        <div class="our-team__info">
                                            <div class="our-team__name">Моор Татьяна Владимировна</div>
                                            <div class="our-team__position">Главный бухгалтер</div>
                                        </div>
                                    </div><!--
                                --><div class="our-team__person">
                                        <img src="static/img/img-person-maxim.jpg" alt="" class="our-team__photo">
                                        <div class="our-team__info">
                                            <div class="our-team__name">Чернин Максим Борисович</div>
                                            <div class="our-team__position">Генеральный директор, Председатель Комитета Всероссийского Союза Страховщиков по развитию страхования жизни</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="our-team__person-group swiper-slide">
                                    <div class="our-team__person">
                                        <img src="static/img/img-person-maxim.jpg" alt="" class="our-team__photo">
                                        <div class="our-team__info">
                                            <div class="our-team__name">Чернин Максим Борисович</div>
                                            <div class="our-team__position">Генеральный директор, Председатель Комитета Всероссийского Союза Страховщиков по развитию страхования жизни</div>
                                        </div>
                                    </div><!--
                             --><div class="our-team__person">
                                        <img src="static/img/img-person-tanya.jpg" alt="" class="our-team__photo">
                                        <div class="our-team__info">
                                            <div class="our-team__name">Моор Татьяна Владимировна</div>
                                            <div class="our-team__position">Главный бухгалтер</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="our-team__person-group swiper-slide">
                                    <div class="our-team__person">
                                        <img src="static/img/img-person-tanya.jpg" alt="" class="our-team__photo">
                                        <div class="our-team__info">
                                            <div class="our-team__name">Моор Татьяна Владимировна</div>
                                            <div class="our-team__position">Главный бухгалтер</div>
                                        </div>
                                    </div><!--
                             --><div class="our-team__person">
                                        <img src="static/img/img-person-tanya.jpg" alt="" class="our-team__photo">
                                        <div class="our-team__info">
                                            <div class="our-team__name">Моор Татьяна Владимировна</div>
                                            <div class="our-team__position">Главный бухгалтер</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>



        </div>
    </div>

    <!-- History -->
    <?php if (count($data['history'])) { ?>
        <div class="block block_white">
            <div class="block__inner block__inner_clearfix">
                <div class="page-title page-title_timeline">
                    <div class="page-title__title"><span>История</span></div>
                    <div class="timeline js-history-timeline">
                        <?php
                        foreach($data['history'] as $history) {
                            ?>
                            <div class="timeline__point" style="left: <?=$history->text_2?>%">
                                <span class="timeline__date"><?=$history->text_1?></span>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="history swiper-container js-history-slider">
                    <div class="history__timeline timeline js-history-timeline"></div>
                    <div class="history__block swiper-wrapper">
                        <?php
                        foreach($data['history'] as $history) {
                            ?>
                            <div class="history__item swiper-slide">
                                <?php if ($history->previewThumbUrl) { ?>
                                    <img src="<?=$history->previewThumbUrl?>" alt="" class="history__img">
                                    <?php
                                } ?>
                                <div class="history__info">
                                    <div class="history__title"><?=$history->title?></div>
                                    <div class="history__text">
                                        <?=$history->preview_text?>
                                    </div>
                                    <div class="history__date"><?=$history->text_1?></div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <?php if (count($data['history']) > 1) { ?>
                        <div class="history__controls controls">
                            <div class="controls__left js-history-controls-left"></div>
                            <div class="controls__right js-history-controls-right"></div>
                        </div>
                        <?php
                    } ?>


                </div>
            </div>
        </div>
        <?php
    } ?>






    <!-- We'r team -->
    <?php
    $is_wteam_title         = trim($data['text']->text_1) ? true : false;
    $is_wteam_preview       = trim($data['text']->preview_text) ? true : false;
    $is_wteam_video         = trim($data['text']->text_2) ? true : false;
    $is_wteam_video_descr   = trim($data['text']->text_3) ? true : false;
    ?>
    <?php if ($is_wteam_title || $is_wteam_preview || $is_wteam_video || $is_wteam_video_descr) { ?>
        <div class="block">
            <div class="block__inner">
                <?php if ($is_wteam_title) { ?>
                    <div class="page-title">
                        <div class="page-title__title">
                            <span><?=$data['text']->text_1?></span>
                        </div>
                    </div>
                    <?php
                } ?>

                <div class="page-content we-team">

                    <?php if ($is_wteam_preview) { ?>
                        <div class="page-content__aside">
                            <div class="we-team__description">
                                <?=$data['text']->preview_text?>
                            </div>
                        </div>
                        <?php
                    } ?>

                    <div class="page-content__content">

                        <?php if ($is_wteam_video) { ?>
                            <div class="we-team__video"><?=$data['text']->text_2?></div>
                            <?php
                        } ?>

                        <?php if ($is_wteam_video_descr) { ?>
                            <div class="we-team__video-description"><?=$data['text']->text_3?></div>
                            <?php
                        } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
    } ?>





    <!-- Insurance staff -->
    <?php if (trim($data['text']->text_5)) { ?>
        <div class="block block_white">
            <div class="block__inner">
                <div class="text insurance-text">
                    <?=$data['text']->text_5?>
                </div>
            </div>
        </div>
        <?php
    } ?>

</div>




<?php
$this->registerCssFile('assets/javascripts/Swiper/dist/css/swiper.css');
$this->registerJsFile('assets/javascripts/Swiper/dist/js/swiper.js',  ['position' => yii\web\View::POS_END]);
?>
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
        </div>
    </div>
</div>
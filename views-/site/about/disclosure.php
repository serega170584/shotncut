<?php
$comp_cr = Yii::$app->request->get('company', 0);
?>
<div class="si-layout__body si-layout__about">
    <div class="block">
        <div class="block__inner">
            <div class="page-title">
                <div class="page-title__title"><span><?=$data->title?></span></div>
            </div>

            <?php echo $this->render('_nav'); ?>

            <div class="page-content page-content-career">

                <?php if (trim($data->text_5)) { ?>
                    <div class="block">
                        <div class="block__inner_career">
                            <div class="text about-oth-text">
                                <?=trim($data->text_5)?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
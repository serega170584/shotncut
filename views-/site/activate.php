<?php
$this->title = 'Активировать полис';
/*
$this->params['breadcrumbs'] = [
    [
        'label' => $this->title
    ]
];*/

?>
<br>
<div class="si-layout__body si-layout__body_accentuated">
    <div class="container container_s_m">
        <?php echo $this->render('/layouts/_breadcrumbs'); ?>
        <iframe src="https://sberins.virtusystems.ru/Companies/Sberbank/Product/index.aspx#500" width="100%" height="550" frameborder="0"></iframe>

        <div class="activate_close_lnk">
            <a href="<?= Yii::$app->request->referrer ?>"
               class="sb-button sb-button_s_m sb-button_theme_yellow"><span class="sb-button__text">Закрыть</span></a>
        </div>
    </div>
</div>
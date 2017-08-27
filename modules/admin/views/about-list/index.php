<?php
use yii\helpers\Html;

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;

?>
<br>
<table class="table table-condensed table-striped about_list">

    <tr><td><h5><?php echo Html::a('О нас, &nbsp; Раскрытие информации, &nbsp; Реестр страховых агентов', '/admin/about-first'); ?></h5></td></tr>
        <tr><td class="pd_lf_1"><h5><?php echo Html::a('Слайдер', '/admin/about-slider'); ?></h5></td></tr>
        <tr><td class="pd_lf_1"><h5><?php echo Html::a('История', '/admin/about-history'); ?></h5></td></tr>

    <tr><td><h5><?php echo Html::a('Команда', '/admin/team'); ?></h5></td></tr>

    <tr><td><h5><?php echo Html::a('Реестр', '/admin/registry'); ?></h5></td></tr>

    <tr><td><h5><?php echo Html::a('Карьера', '/admin/about-career'); ?></h5></td></tr>

    <tr><td><h5><?php echo Html::a('Контакты', '/admin/about'); ?></h5></td></tr>

</table>

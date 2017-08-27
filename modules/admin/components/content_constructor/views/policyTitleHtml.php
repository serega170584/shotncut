<?php
if($value) {

    $t = explode('|', \yii\helpers\Html::encode($value['header']));

    $title = trim($t[0]);
    $anchor = trim($t[1]);
    $icon = trim($t[2]);

    echo $value['text'];

    $this->params['leftMenuItems'][] =
        '<a href="#anchor-'.$anchor.'" class="si-link"><span class="sb-good-anchor__icon sb-good-anchor__icon_'.$icon.' sb-icon"></span><span class="si-link__text">' . $title . '</span></a>';

}
?>
<?php
//if (file_exists($_SERVER['DOCUMENT_ROOT'].'/modules/admin/components/content_constructor/frontend/js/TitleHtml_'.$anchor.'.js')) {
//    $this->registerJsFile('/modules/admin/components/content_constructor/frontend/js/TitleHtml_'.$anchor.'.js',  ['depends' => ['app\modules\admin\components\content_constructor\assets\Base']]);
//}
/*
$js = <<<JS
JS;
$this->registerJs($js);
*/

?>


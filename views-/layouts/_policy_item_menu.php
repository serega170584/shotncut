<?php
/** @var \app\models\node\Policy $model */
if(isset($model)){

$preview_url = $model->mainImage ?
    Yii::$app->imager->getThumbUrl($model->mainImage->fsPath, 448, 296) : null;
?>
<div class="r__c r__c_md_4">
    <a href="<?php echo $model->url; ?>" class="si-menu-good">
        <div style="<?php if($preview_url): ?>background-image: url(<?php echo $preview_url; ?>);<?php endif; ?>" class="si-menu-good__image"></div>
        <div class="si-menu-good__caption"><?php echo \yii\helpers\Html::encode($model->title); ?></div>
    </a>
</div>
<?php } ?>
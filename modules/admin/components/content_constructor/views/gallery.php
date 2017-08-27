<?php if($value && is_array($value)): ?>
<div class="si-article-slider">
    <?php foreach($value as $image): ?>
        <?php
        if(file_exists(Yii::getAlias('@webroot').$image)):
           $url = Yii::$app->imager->getThumbUrl(Yii::getAlias('@webroot').$image, 750, 470, 90);
        ?>
        <div class="si-article-slider__slide">
            <div class="si-article-media">
                <div class="si-article-media__object"><img src="<?php echo \yii\helpers\Html::encode($url); ?>" alt=""></div>
                <div class="si-article-media__copyright">Фото Ларисы Горячевой</div>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php endif; ?>
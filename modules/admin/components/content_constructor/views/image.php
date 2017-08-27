<?php

use yii\helpers\Html;

if($value && file_exists(Yii::getAlias('@webroot').$value)): ?>
    <?php $url = Yii::$app->imager->getThumbUrl(Yii::getAlias('@webroot').$value, 750, 470, 90); ?>
    <div class="si-article-media">
        <div class="si-article-media__object"><?php echo Html::img($url); ?></div>
        <div class="si-article-media__copyright">Фото Ларисы Горячевой</div>
    </div>
<?php endif; ?>
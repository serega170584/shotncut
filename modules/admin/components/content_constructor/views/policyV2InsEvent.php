<?php if (isset($value) && is_array($value)):
    $owner = $value['owner'] ?? null;
    /** @var \app\models\node\Policy $owner */
    $bg = $owner ? ($owner->getMainImageUrl() ?: $owner->getPreviewImageUrl()) : '';
    ?>
<section id="insurance_case" class="js-nav-block b-bg js-nav-block-for-stop b-product-section b-product-section__insurance">
    <div class="b-bg__top_overflow">
        <div class="b-bg__pic" style="background-image: url(<?=$bg?>)"></div>
    </div>
    <div class="b-wrapper">
        <div class="b-product-section__wrapper">
            <h3><?= empty($value['header']) ? 'Страховой случай' : \yii\helpers\Html::encode($value['header']) ?></h3>
            <?= \app\components\SbrHtmlPurifier::process($value['text']) ?>
            <div class="b-button__box">
                <a href="#" class="b-button">Сообщить о страховом случае</a>
            </div>
        </div>
        <div class="js-calc-insert-bottom"></div>
    </div>
</section>
<?php endif; ?>

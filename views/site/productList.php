<?php
/**
 * @var \app\components\Controller $this
 * @var \app\models\node\Node[] $nodes
 */
?>

<?php
foreach ($nodes as $node):
    $iconClass = [];
    $jsClass = [];
    $url = '#';
    $short_text = '';
    if ($node instanceof \app\models\node\Policy) {
        $cats = $node->getCategory()->sorted()->all();
        foreach ($cats as $category) {
            $iconClass[] = $category->code;
            $jsClass[] = 'cat_'.$category->code;
        }
        $iconClass = array_reverse($iconClass);
        $url = \yii\helpers\Url::toRoute(['policy/view', 'slug' => $node->alias]);
        $short_text = '<p>'.\yii\helpers\Html::encode($node->short_text).'</p>';
    }
    elseif ($node instanceof \app\models\node\News) {
        $iconClass[] = 'news';
        $jsClass[] = 'news_'.$node->rating;
        $url = \yii\helpers\Url::toRoute(['news/view', 'slug' => $node->alias]);
        $short_text = \app\components\SbrHtmlPurifier::process($node->preview_text);
    }
    elseif ($node instanceof \app\models\node\Video) {
        $iconClass[] = 'financial_literacy';
        $url = \yii\helpers\Url::toRoute(['video/view', 'slug' => $node->alias]);
    }
?>
<div class="js-product b-product <?=implode(" ", $iconClass)?> <?=implode(" ", $jsClass)?>">
    <a href="<?=$url?>" class="b-product__main">
        <div class="b-product__type"></div>
        <div class="b-product__text">
            <h4><?=\yii\helpers\Html::encode($node->title)?></h4>
            <?php if ($node instanceof \app\models\node\News):?>
            <div class="b-product__date"><?php echo Yii::$app->formatter->asDatetime($node->created_at, 'd MMMM'); ?></div>
            <?php endif; ?>
            <?=$short_text?>
        </div>
        <?php if ($node instanceof \app\models\node\Video):?>
        <div class="b-product__pic">
            <div style="background-image: url(//img.youtube.com/vi/<?=\yii\helpers\Html::encode($node->preview_text)?>/0.jpg)"></div>
        </div>
        <?php endif; ?>
        <?php if ($node->price_from): ?>
        <div class="b-product__price">
            <span>от <?=$node->price_from?> <span class="b-rub">c</span></span>
        </div>
        <?php endif; ?>
        <?php if ($node instanceof \app\models\node\Policy): ?>
        <div class="b-product__pic">
            <div style="background-image: url(<?=$node->getPreviewImageUrl()?>)"></div>
        </div>
        <?php endif; ?>
    </a>
    <ul class="u-clear-fix b-product__tags">
        <?php
        if ($node instanceof \app\models\node\Policy) {
            ?>
            <?php foreach ($cats as $category): ?>
                <li>
                    <a href="#menu-c1<?= $category->code ?>" class="js-product-tag"><?= \yii\helpers\Html::encode($category->name) ?></a>
                </li>
            <?php endforeach; ?>
            <?php
        }
        elseif ($node instanceof \app\models\node\News) {
            ?>
            <li>
                <a href="" class="js-product-tag"><?= \yii\helpers\Html::encode($node->getCompanyName()) ?></a>
            </li>
            <?php
        }
        elseif ($node instanceof \app\models\node\Video) {
            /** @var \app\models\category\CategoryVideo $videoCats */
            $videoCat = $node->getVidCategory();
            if ($videoCat) {
                ?>
                <li>
                    <a href="" class="js-product-tag"><?= \yii\helpers\Html::encode($videoCat) ?></a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <?php
    if ($node instanceof \app\models\node\Policy) {
        ?>
        <div class="b-button__box">
            <a href="<?=$url?>" class="b-button b-button_small b-button_border">Купить полис</a>
        </div>
        <?php
    }
    ?>
</div>
<?php endforeach;?>


<?php
use app\models\node\Article;
use yii\bootstrap\Html;

$articles = Article::find()
    ->active()
    ->byCategory($article->category_id)
    ->notId($article->id)
    ->limit(3)
    ->all();

?>
<?php if($articles): ?>
<div class="si-article-widgets">
    <div class="si-article-widgets__caption">Другие статьи рубрики:</div>
    <?php foreach($articles as $a): ?>
    <?php
        $image_url = $article->previewPicture ?
            Yii::$app->imager->getThumbUrl($article->previewPicture->fsPath, 80, 80) : null;

        $date_created = Yii::$app->formatter->asDate($article->created_at, 'php:j F');
    ?>
    <div class="si-article-widget"><a href="#" class="si-article-widget__name"><?php echo Html::encode($a->title); ?></a>
        <div class="si-article-widget-author">
            <div class="si-article-widget-author__c">
                <div class="si-avatar si-avatar_s_s"><?php if($image_url): ?><img src="<?php echo $image_url; ?>" alt=""><?php endif; ?></div>
            </div>
            <div class="si-article-widget-author__c">
                <div class="si-article-widget-author__name"><?php echo Html::encode($a->author->name); ?></div>
                <div class="si-article-widget-author__meta"><?php echo $date_created; ?></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
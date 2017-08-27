<?php

use yii\helpers\Html;
use app\assets\AppAsset;use yii\widgets\Breadcrumbs;
use app\models\node\News;

AppAsset::register($this);

$this->beginPage();

    $transparent_menu = '';
    if((Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') || Yii::$app->controller->id == 'policy'){
        $transparent_menu = 'si-layout_theme_a';
    }else{
        $transparent_menu = 'si-layout_theme_a si-disabled-scroll si-layout_scrolled';
    }

?><!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
	<head>
		<meta charset="<?php echo Yii::$app->charset ?>">
		<?php echo Html::csrfMetaTags(); ?>
		<title>Сбербанк страхование<?php if($this->title) {echo ' - '.Html::encode($this->title);} ?></title>

        <?php
        // Новости шары
        if (!empty($_GET['news']) && is_numeric($_GET['news'])) {
            $news_id = (int) $_GET['news'];

            $news_share = News::findOne($news_id);
            if ($news_share) {
                $news_share_im = '';
                if ($news_share->detailThumbUrl) {
                    $news_share_im = $news_share->detailThumbUrl;
                }
                ?>
                <link rel="image_src" href="http://<?=$_SERVER['HTTP_HOST'].$news_share_im?>"/>
                <meta property="og:title" content="<?=$news_share->title?>"/>
                <meta property="og:description" content="<?=strip_tags($news_share->detail_text)?>"/>
                <meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST'].$news_share_im?>"/>
                <?php
            }
        } ?>

        
        
        <link rel="shortcut icon" href="/favicon-16.ico" sizes="16x16">
        <link rel="shortcut icon" href="/favicon-48.ico" sizes="48x48">
		<?php $this->head(); ?>
		
	<!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TQX7VQ');</script><!-- End Google Tag Manager -->
	
	<!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TLLMLP');</script><!-- End Google Tag Manager -->

	
	</head>
	<body>
	<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQX7VQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->
	
	<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLLMLP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->


		<?php $this->beginBody(); ?>


        <?php echo $this->render('_header'); ?>

        <div style="position: absolute; left: 0; top: 0; right: 0; bottom: 0;" class="si-layout <?php echo $transparent_menu; ?>">
            <div si-menu-close class="si-layout__backdrop"></div>
            <?php echo $this->render('_menu'); ?>
            <div class="si-layout__container">
                <?php echo $content; ?>
                <?php echo $this->render('_footer'); ?>
            </div>
        </div>

		<?php $this->endBody(); ?>
	</body>
</html>
<?php $this->endPage(); ?>

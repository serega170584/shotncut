<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

use app\modules\admin\assets\AdminAsset;


AdminAsset::register($this);

$this->beginPage();

?><!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
	<head>
		<meta charset="<?php echo Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php echo Html::csrfMetaTags(); ?>
		<title><?php echo Html::encode($this->title); ?></title>
		<?php $this->head(); ?>
	</head>
	<body>
		<?php $this->beginBody(); ?>

		<?php if (!empty($this->params['top_menu'])): ?>
			<?php
				NavBar::begin([
					'brandLabel' => Yii::$app->name,
					'options' => ['class' => 'navbar-inverse navbar-static-top'],
				]);
                echo Nav::widget([
                    'items' => $this->params['top_menu'],
                    'options' => ['class' => 'navbar-nav'],
                ]);
                echo Nav::widget([
                    'items' => $this->params['user_menu'],
                    'options' => ['class' => 'navbar-nav']
                ]);
                if (!empty($this->params['profile_menu'])) {
                    echo Nav::widget([
                        'items' => $this->params['profile_menu'],
                        'options' => ['class' => 'navbar-nav navbar-right'],
                    ]);
                }
				NavBar::end();
			?>
		<?php endif; ?>

		<div class="container">

			<div class="page-header">
				<?php if (!empty($this->title)): ?>
					<h1><?php echo Html::encode($this->title); ?></h1>
				<?php endif; ?>
			</div>

			<?php if (!empty($this->params['breadcrumbs'])): ?>
				<?php
					echo Breadcrumbs::widget([
						'homeLink' => [
							'label' => 'Управление сайтом',
							'url' => ['/admin/default']
						],
		            	'links' => $this->params['breadcrumbs'],
		        	]);
				?>
			<?php endif; ?>

			<div class="row">
				<?php if (!empty($this->params['left_menu'])): ?>
					<div class="col-md-4">
						<div class="cv_navigation__left">
							<div class="panel panel-default">
								<div class="panel-heading">Действия</div>
								<?php
                                    if (Yii::$app->request->get('company', 0) != 0) {
                                        foreach($this->params['left_menu'] as &$left_menu) {
                                            $left_menu['url']['company'] = Yii::$app->request->get('company', 0);
                                        }
                                    }

									echo Nav::widget([
										'items' => $this->params['left_menu'],
										'options' => ['class' => 'nav nav-pills nav-stacked'],
									]);
								?>
							</div>
						</div>
					</div>
					<div class="col-md-8">
                        <?php echo $this->render('_alerts'); ?>
				<?php else: ?>
					<div class="col-md-12">
                        <?php echo $this->render('_alerts'); ?>
				<?php endif; ?>
					<?php echo $content; ?>
				</div>
			</div>
		</div>

		<hr>
		<footer></footer>

		<?php $this->endBody(); ?>
	</body>
</html>
<?php $this->endPage(); ?>

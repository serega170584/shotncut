<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
	public $sourcePath = '@app/modules/admin/assets';
	public $publishOptions = [];
	public $css = [
        '/assets/stylesheets/admin_style.css',
	];
	public $js = [
	];
	public $depends = [
        'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
}

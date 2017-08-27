<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class Base extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = ['forceCopy' => true];
	public $css = [
		'css/base.css',
	];
	public $js = [
        'js/base.js',
	];
	public $depends = [
		'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
	];


    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/frontend';
        return parent::init();
    }
}

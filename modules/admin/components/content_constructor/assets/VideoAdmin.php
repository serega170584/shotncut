<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class VideoAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = [];
	public $css = [
	];
	public $js = [
        'js/videoAdmin.js',
	];
	public $depends = [
		'app\modules\admin\components\content_constructor\assets\Base',
	];


    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/frontend';
        return parent::init();
    }
}

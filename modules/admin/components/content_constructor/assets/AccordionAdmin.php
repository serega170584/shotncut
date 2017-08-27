<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class AccordionAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = [];
	public $css = [
	];
	public $js = [
        'js/accordionAdmin.js',
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

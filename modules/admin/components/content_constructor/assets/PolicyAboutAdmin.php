<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class PolicyAboutAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = ['forceCopy' => true];
	public $css = [
	];
	public $js = [
        'js/policyAboutAdmin.js',
	];
	public $depends = [
		'app\modules\admin\components\content_constructor\assets\Base',
	];


    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/frontend';
        parent::init();
    }
}

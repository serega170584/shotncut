<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class PolicyHowItWorksAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = [];
	public $css = [
	];
	public $js = [
        'js/policyHowItWorksAdmin.js',
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

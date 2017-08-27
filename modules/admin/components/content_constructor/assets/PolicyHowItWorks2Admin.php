<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class PolicyHowItWorks2Admin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = [];
	public $css = [
	];
	public $js = [
        'js/policyHowItWorks2Admin.js',
	];
	public $depends = [
		'app\modules\admin\components\content_constructor\assets\Base',
        '\dosamigos\fileupload\FileUploadPlusAsset',
	];


    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/frontend';
        parent::init();
    }
}
  
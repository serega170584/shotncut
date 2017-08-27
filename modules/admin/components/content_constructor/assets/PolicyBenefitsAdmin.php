<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;

class PolicyBenefitsAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = [];
	public $css = [
	];
	public $js = [
        'js/policyBenefitsAdmin.js',
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

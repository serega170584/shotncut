<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;
use yii\helpers\Url;

class PolicyV2DocumentsAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = ['forceCopy' => true];
	public $css = [
	];
	public $js = [
        'js/policyV2DocumentsAdmin.js',
	];
	public $depends = [
		'\app\modules\admin\components\content_constructor\assets\Base',
		'\devgroup\dropzone\DropZoneAsset',
	];


    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/frontend';
        return parent::init();
    }
}

<?php

namespace app\modules\admin\components\content_constructor\assets;

use yii\web\AssetBundle;
use yii\helpers\Url;

class ImageAdmin extends AssetBundle
{
	public $sourcePath = null;
	public $publishOptions = ['forceCopy' => true];
	public $css = [
	];
	public $js = [
        'js/imageAdmin.js',
	];
	public $depends = [
		'\app\modules\admin\components\content_constructor\assets\Base',
		'\dosamigos\fileupload\FileUploadPlusAsset',
	];


    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/frontend';
        return parent::init();
    }
}

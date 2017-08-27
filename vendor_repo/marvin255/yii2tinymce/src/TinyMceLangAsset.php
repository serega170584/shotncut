<?php

namespace marvin255\yii2tinymce;

use yii\web\AssetBundle;

class TinyMceLangAsset extends AssetBundle
{
    public $sourcePath = '@vendor/marvin255/yii2tinymce/lang';
    public $depends = [
        'marvin255\yii2tinymce\TinyMceAsset'
    ];
}

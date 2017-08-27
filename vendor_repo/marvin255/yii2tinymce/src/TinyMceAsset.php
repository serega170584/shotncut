<?php

namespace marvin255\yii2tinymce;

use yii\web\AssetBundle;

class TinyMceAsset extends AssetBundle
{
    public $sourcePath = '@vendor/tinymce/tinymce';
    public $css = [
    ];
    public $js = [
        'tinymce.min.js',
        'jquery.tinymce.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

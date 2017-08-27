<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/stylesheets/slick.css',
        'assets/stylesheets/select2.css',
        'assets/stylesheets/application.bundle.css',
        'assets/stylesheets/ngDialog-theme-default.css',
        'assets/stylesheets/chosen.css',
        'http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css',
        'assets/stylesheets/MonthPicker.css',
        'assets/stylesheets/bootstrap_tooltip.css',
        'assets/stylesheets/style_1.css?v=17',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js',
        'assets/javascripts/bundle.min.js?v=17',
        'assets/javascripts/jquery.maskedinput.min.js',
        'http://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'assets/javascripts/MonthPicker.js',
        'assets/javascripts/chosen.jquery.min.js',
        'assets/javascripts/bootstrap_tooltip.js',
        'assets/javascripts/scripts.js?v=18', 
        [
            'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',
            'async' => true,
            'defer' => true,
        ],
    ];
}

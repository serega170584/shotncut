<?php


namespace app\components;


use yii\helpers\BaseHtmlPurifier;

class SbrHtmlPurifier extends BaseHtmlPurifier
{
    protected static function configure($config)
    {
        $config->set('HTML.SafeIframe', true);
        $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%'); //allow YouTube and Vimeo
    }
}
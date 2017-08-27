<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;
use \marvin255\yii2tinymce\TinyMceInput;

class Video extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        if ($assets_list === 'admin') {
            TinyMceInput::setInitiator('CcVideoTinyMce', $view, [
                "height" => "400px",
                "plugins" => "media",
                "toolbar" => "media",
                "menubar" => "insert",
                //"media_live_embeds" => true
            ]);
        }
        return parent::registerAssets($view, $assets_list);
    }
}

<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;
use \marvin255\yii2tinymce\TinyMceInput;

class OnlinePolicyFather extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'onlinePolicyFather';
    }

    /**
     * @inheritdoc
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        /*if ($assets_list === 'admin') {
            TinyMceInput::setInitiator('CcPolicyAboutTinyMce', $view, [
                "height" => "200px",
                "plugins" => "table",
            ]);
        }*/
        return parent::registerAssets($view, $assets_list);
    }
}

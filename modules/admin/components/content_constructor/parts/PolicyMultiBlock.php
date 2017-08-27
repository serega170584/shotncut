<?php


namespace app\modules\admin\components\content_constructor\parts;


use app\modules\admin\components\content_constructor\Part;
use marvin255\yii2tinymce\TinyMceInput;

class PolicyMultiBlock extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'policyMultiBlock';
    }

    /**
     * @inheritdoc
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        if ($assets_list === 'admin') {
            TinyMceInput::setInitiator('CcPolicyMultiBlockTinyMce', $view, [
                "height" => "100px",
                'plugins' => [
                    'autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ]
            ]);
        }
        return parent::registerAssets($view, $assets_list);
    }

}
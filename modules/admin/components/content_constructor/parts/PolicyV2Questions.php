<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;
use \marvin255\yii2tinymce\TinyMceInput;

class PolicyV2Questions extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'policyV2Questions';
    }

    /**
     * @inheritdoc
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        if ($assets_list === 'admin') {
            TinyMceInput::setInitiator('CcPolicyV2QuestionsTinyMce', $view, [
                "height" => "100px",
                'plugins' => [
                    'autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                'style_formats_autohide' => true,
                'style_formats_merge' => true,
                'style_formats' => []
            ]);
        }
        return parent::registerAssets($view, $assets_list);
    }

    public function toString(){
        $str = '';
        $val = $this->getValue();

        if($val && !empty($val['lines'])){
            $str = implode('; ', array_map(function($item){
                return $item['header'].' '.$item['text'];
            }, $val['lines']));
        }

        return $str;
    }
}

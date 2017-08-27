<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;
use \marvin255\yii2tinymce\TinyMceInput;

class PolicyActions extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'policyActions';
    }

    /**
     * @inheritdoc
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        if ($assets_list === 'admin') {
            TinyMceInput::setInitiator('CcPolicyActionsTinyMce', $view, [
                "height" => "100px",
                'plugins' => [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
            ]);
        }
        return parent::registerAssets($view, $assets_list);
    }

    public function toString(){
        $str = '';
        $val = $this->getValue();

        if(!empty($val['slides'])){
            foreach($val['slides'] as $slide){
                $str .= $slide['header'].'; ';
                if(!empty($slide['lines'])){
                    $str = implode('; ', array_map(function($item){
                        return $item['header'].' '.$item['text'];
                    }, $slide['lines']));
                }
            }
        }

        return $str;
    }
}

<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;
use \marvin255\yii2tinymce\TinyMceInput;

class PolicyHowItWorks2 extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'policyHowItWorks2';
    }

    /**
     * @inheritdoc
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        if ($assets_list === 'admin') {
            TinyMceInput::setInitiator('CcPolicyHowItWorks2TinyMce', $view, [
                "height" => "150px",
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

        if(!empty($val['blocks'])){
            $str .= implode('; ', array_map(function($item){
                return $item['text'].'; '.$item['add'];
            }, $val['blocks']));
        }

        return $str;
    }
}

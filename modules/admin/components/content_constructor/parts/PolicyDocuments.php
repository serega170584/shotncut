<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;

class PolicyDocuments extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'policyDocuments';
    }

    public function toString(){
        $str = '';
        $val = $this->getValue();

        if(!empty($val['files'])){
            $str .= implode('; ', array_map(function($item){
                return $item['title'];
            }, $val['files']));
        }

        return $str;
    }
}

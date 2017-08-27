<?php

namespace app\modules\admin\components\content_constructor\parts;

use app\modules\admin\components\content_constructor\Part;

class Gallery extends Part
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType()
    {
        return 'gallery';
    }
}

<?php

namespace app\modules\admin\components\content_constructor;

use Yii;
use yii\base\Component;

use app\modules\admin\components\content_constructor\IPart;
use app\modules\admin\components\content_constructor\IConstructor;

class ConstructorPolicy extends Constructor
{

    /**
     * Возвращает список встроенных типов
     * @return array
     */
    protected function getBuiltInTypes()
    {
        $prefix = 'OnlinePolicy';
        $path = '\\app\\modules\\admin\\components\\content_constructor\\parts\\';
        $ret = [
            [
                'type' => 'policyMultiBlock',
                'class' => "{$path}PolicyMultiBlock",
            ],
            [
                'type' => 'policyV2Documents',
                'class' => "{$path}PolicyV2Documents",
            ],
            [
                'type' => 'policyV2InsEvent',
                'class' => "{$path}PolicyV2InsEvent",
            ],
            [
                'type' => 'policyV2Questions',
                'class' => "{$path}PolicyV2Questions",
            ],
            [
                'type' => 'policyTemplate',
                'class' => "{$path}PolicyTemplate"
            ]
        ];

//        $namespace = '\\app\\modules\\admin\\components\\content_constructor\\parts\\';
//        $path = __DIR__ . '/parts/';
//
//        $dir = opendir($path);
//        while ($file = readdir($dir)) {
//            if (substr($file, -4) === '.php') {
//                $class = substr($file, 0, -4);
//                $type = lcfirst($class);
//                $ret[] = [
//                    'type' => $type,
//                    'class' => $namespace . $class,
//                ];
//            }
//        }
//        closedir($dir);

        return $ret;
    }
}

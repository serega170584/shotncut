<?php

namespace app\modules\admin\components;

use Yii;
use yii\filters\AccessControl;
use app\modules\admin\components\menu\MenuBehavior;

class Controller extends \yii\web\Controller
{

    /**
     * Закрываем контроллер от неавторизованных юзеров
     */
    public function behaviors()
    {
        return [
            [
                'class' => MenuBehavior::className(),
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['admin/default'],
                        'actions' => ['index', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'class' => '\app\components\access_rules\Rbac',
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

}

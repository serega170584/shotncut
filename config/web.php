<?php
Yii::setAlias('@dektrium', dirname(__DIR__) . '/vendor/dektrium/yii2-user');

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'name' => 'Сберлайф',
    'sourceLanguage' => 'en-EN',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'gksmj6Pf10DPtxNTU2J_HmQ-v_SyNFy_',
            'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => 3,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'activate' => 'site/activate',
                //'about/team' => 'site/about-team',
                //'about/career' => 'site/about-career',
                //'about/contact' => 'site/about-contact',
                //'about/registry' => 'site/about-registry',
                //'about/disclosure' => 'site/about-disclosure',
                //'about' => 'site/about',
                //'partners' => 'site/partners',
                //'search' => 'search/index',
                //'<type:(news|article)>' => 'site/node',
//                '<type:(news|article)>/<id:\d+>' => 'site/view',
                //'<type:(news|article)>/<alias:[A-Za-z0-9_-]+>' => 'site/view',
                'policy/view' => 'policy/viewid',
                'policy/calc/vzr' => 'policy/calcvzr',
                'policy/<slug:[^/]+>' => 'policy/view',
//                [
//                    'class' => 'app\components\url_rules\PageUrlRule'
//                ]
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        //абстракция для работы с файловой системой
        'fs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@webroot/upload',
        ],
        //перенастраиваем папку с ассетами yii для исключения конфликтов с фронтом
        'assetManager' => [
            'basePath' => '@webroot/publish',
            'baseUrl' => '/publish',
        ],
        'imager' => [
            'class' => 'app\components\Imager',
            'cachePath' => '@webroot/publish/thumbs'
        ],
        //override user views
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/views/settings' => '@app/modules/admin/views/user/settings',
                    '@dektrium/views/admin' => '@app/modules/admin/views/user/admin'
                ],
            ],
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200']
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'ru-RU',
            'defaultTimeZone' => 'Europe/Moscow',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=shotncut',
            'username' => 'shotncut',
            'password' => '2EnRd%9nrA1d',
            'charset' => 'utf8',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'components' => [
                'menu' => [
                    'class' => 'app\modules\admin\components\menu\Menu'
                ]
            ]
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => [
                'super_admin'
            ],
            'modelMap' => [
                'User' => 'app\modules\admin\models\User',
                'Profile' => 'app\modules\admin\models\Profile',
            ],
            'controllerMap' => [
                'admin' => [
                    'class' => 'dektrium\user\controllers\AdminController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ],
                ],
                'security' => [
                    'class' => 'dektrium\user\controllers\SecurityController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ]
                ],
                'profile' => [
                    'class' => 'dektrium\user\controllers\ProfileController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ]
                ],
                'settings' => [
                    'class' => 'dektrium\user\controllers\SettingsController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ]
                ],
                'recovery' => [
                    'class' => 'dektrium\user\controllers\RecoveryController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ]
                ],
                'registration' => [
                    'class' => 'dektrium\user\controllers\RegistrationController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ]
                ]
            ],
            'components' => [
                'menu' => [
                    'class' => 'app\modules\admin\components\menu\Menu'
                ]
            ]
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'dektrium\rbac\controllers\AssignmentController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ],
                ],
                'permission' => [
                    'class' => 'dektrium\rbac\controllers\PermissionController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ],
                ],
                'role' => [
                    'class' => 'dektrium\rbac\controllers\RoleController',
                    'layout' => '@app/modules/admin/views/layouts/main',
                    'as menu' => [
                        'class' => '\app\modules\admin\components\menu\MenuBehavior',
                    ],
                ]
            ],
            'components' => [
                'menu' => [
                    'class' => 'app\modules\admin\components\menu\Menu'
                ]
            ]
        ]
    ],
    'params' => $params
];


if(file_exists(__DIR__.'/web-local.php')){
    $config = \yii\helpers\ArrayHelper::merge($config, require(__DIR__.'/web-local.php'));
}

return $config;

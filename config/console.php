<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'baseUrl' => 'devsberlife.crtweb.ru',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'activate' => 'site/activate',
                '<type:(news|article)>' => 'site/node',
                '<type:(news|article)>/<alias:[A-Za-z0-9_-]+>' => 'site/view',
                [
                    'class' => 'app\components\url_rules\PageUrlRule'
                ]
            ],
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '127.0.0.1:9200']
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=vagrant',
            'username' => 'vagrant',
            'password' => 'vagrant',
            'charset' => 'utf8',
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'migrate' => [
            'class' => 'dmstr\console\controllers\MigrateController'
        ],
        'search' => [
            'class' => 'app\commands\SearchController'
        ],
    ],
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if(file_exists(__DIR__.'/console-local.php')){
    $config = \yii\helpers\ArrayHelper::merge($config, require(__DIR__.'/console-local.php'));
}

return $config;

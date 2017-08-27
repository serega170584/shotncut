<?php
$params = [
    'adminEmail' => 'admin@example.com',
    "yii.migrations"=> [
        "@dektrium/user/migrations",
        "@dektrium/rbac/migrations",
        "@yii/rbac/migrations",
    ],
    'email_to'  => 'cs@sberinsur.ru',       //СБСЖ
    'email_to2' => 'ks@sberins.ru',         //СБС
];

if(file_exists(__DIR__.'/params-local.php')){
    $params = \yii\helpers\ArrayHelper::merge($params, require(__DIR__.'/params-local.php'));
}

return $params;

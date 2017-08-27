<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

if ($_SERVER['HTTP_HOST'] == 'sberins.ru') {
    define('DEV_ENV', false);
} else {
    define('DEV_ENV', true);
} 

define("RE_SITE_KEY","6LcArgsUAAAAAM9NBro0S_kEmEV3r0vnKwaqnWqH");
define("RE_SEC_KEY","6LcArgsUAAAAAK64Ro-xc_oYELkJCqTQI8HId7G9");

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');



$application = new yii\web\Application($config);


// todo отладка <<<
function vd($var, $exit = true)
{
    $dumper = new yii\helpers\BaseVarDumper();
    echo $dumper::dump($var, 10, true);
    if ($exit)
        exit;
}
// todo отладка >>>


$application->run();

//(new yii\web\Application($config))->run();

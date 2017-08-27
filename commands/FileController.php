<?php


namespace app\commands;


use app\models\file\File;
use yii\console\Controller;

class FileController extends Controller
{

    public function actionClean($dry_run = false, $verbose = false)
    {
        $dir = __DIR__ . '/../web/upload';
        $d1 = opendir($dir);
        while ($l1dir = readdir($d1)) {
            if ($l1dir === '.' || $l1dir === '..') {
                continue;
            }
            if (is_dir($dir.'/'.$l1dir)) {
                $exists = 0;
                $d2 = opendir($dir.'/'.$l1dir);
                while ($file = readdir($d2)) {
                    if ($file === '.' || $file === '..') {
                        continue;
                    }
                    if (!File::find()->andWhere(['path' => "/{$l1dir}/{$file}"])->exists()) {
                        if (!$dry_run) {
                            unlink("$dir/{$l1dir}/{$file}");
                        }
                        $this->stdout("unlink {$l1dir}/{$file}\n");
                    } else {
                        $exists = 1;
                        if ($verbose) {
                            $this->stdout("exists {$l1dir}/{$file}\n");
                        }
                    }
                }
                closedir($d2);
                if (!$exists) {
                    if (!$dry_run) {
                        rmdir($dir . '/' . $l1dir);
                    }
                    $this->stdout("unlink {$l1dir}\n");
                }
            }
        }
        closedir($d1);
    }
}
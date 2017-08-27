<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\Json;
use app\modules\admin\components\Controller;
use app\models\file\File;

/**
 * Загрузка файлов из админки
 */
class FileController extends Controller
{
    public function actionUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $imageFiles = UploadedFile::getInstancesByName('file');
        $files = [];

        foreach($imageFiles as $image){
            $file = new File();
            $file->loadFile($image);
            $files[] = $file;
        }

        if(!File::validateMultiple($files))
            throw new BadRequestHttpException('Validation failed.');

        $data = [];

        foreach($files as $file){

            if($file->save()){
                $data[] = [
                    'name' => $file->name,
                    'size' => $file->size,
                    'url' => $file->url,
                    'thumbnailUrl' => $file->url,
                    'deleteUrl' => Url::to(['/admin/file/delete', 'name' => $file->path]),
                ];
            }
        }

        return $data ? ['files' => $data] : '';
    }

    public function actionDelete($name)
    {
        $file = File::find()->byPath($name)->one();
        if ($file) $file->delete();
    }


}

<?php

namespace app\controllers;

use app\components\Controller;
use app\models\node\Video;
use app\models\category\CategoryVideo;

use yii\web\NotFoundHttpException;

class VideoController extends Controller {

    public function actionViewid($id)
    {
        /** @var Video $model */
        $model = Video::find()
            ->byId($id)
            ->active()
            ->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->redirect(['video/view', 'slug' => $model->alias], 301);
    }

    public function actionView($slug)
    {
        /** @var Video $model */
        $model = Video::find()
            ->byAlias($slug)
            ->active()
            ->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        /*$model->changeConstructor();*/

        if (!$model) {
            throw new NotFoundHttpException();
        }

        $this->registerSeo($model);

        $categories = CategoryVideo::getCategoryArrList();
        $video_categories = [];
        foreach ($categories as $key => $item) {
            if (in_array($key, $model->getCategoryVideoIds())) {
                $video_categories[$key] = $item;
            }
        }

        return $this->render('//video/view', compact('model', 'video_categories'));
    }

    public function actionIndex($page = 0)
    {
        $video = Video::find()->defaultSort()->limit(7)->offset($page*7)->all();
        $categories = CategoryVideo::getCategoryArrList();

        return $this->render('video', [
            'categories' => $categories,
            'video' => $video,
        ]);
    }

    public function actionListmore($page)
    {
        $video = Video::find()->defaultSort()->limit(7)->offset($page*7)->all();
        $categories = CategoryVideo::getCategoryArrList();

        return $this->renderPartial('video', [
            'categories' => $categories,
            'video' => $video,
        ]);
    }


}
<?php

namespace app\controllers;

use app\components\Controller;
use app\models\node\Node;
use app\models\node\News;

use yii\web\NotFoundHttpException;

class NewsController extends Controller {

    public function actionViewid($id)
    {
        /** @var News $model */
        $model = News::find()
            ->byId($id)
            ->active()
            ->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->redirect(['news/view', 'slug' => $model->alias], 301);
    }

    public function actionView($slug)
    {
        /** @var News $model */
        $model = News::find()
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

        $list_comp = News::getCompany();

        $this->view->params['company'] = $list_comp[intval($model->rating)];

        return $this->render('//news/view', compact('model'));
    }

    public function actionIndex($page = 0)
    {
        $news = News::find()->defaultSort()->limit(7)->offset($page*7)->where('status=1 AND id > 112')->all();
        $company_name = Node::getCompany();

        return $this->render('news', [
            'news' => $news,
            'company_name' => $company_name
        ]);
    }

    public function actionListmore($page)
    {
        $news = News::find()->defaultSort()->limit(7)->offset($page*7)->all();
        $company_name = Node::getCompany();

        return $this->renderPartial('news', [
            'news' => $news,
            'company_name' => $company_name
        ]);
    }


}
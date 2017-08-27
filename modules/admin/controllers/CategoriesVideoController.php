<?php

namespace app\modules\admin\controllers;

use app\models\category\CategoryVideo;
use Yii;

use \app\modules\admin\components\CrudController;

/**
 * Контроллер для редактирования категорий видео
 * @see \app\models\node\Page
 */
class CategoriesVideoController extends CrudController
{

    /**
     * @return \app\models\category\CategoryVideoQuery
     */
    protected function getActiveQuery()
    {
        return CategoryVideo::find()->orderBy(['sort' => SORT_ASC]);
    }


    /**
     * @return CategoryVideo
     */
    protected function getEmptyModel()
    {
        $model = new CategoryVideo();
        $model_sort = CategoryVideo::find()->orderBy(['sort' => SORT_DESC])->one();
        $model->sort = $model_sort->sort+10;
        return $model;
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithChildren();
        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Материал обновлен');
            return $this->redirect(['index']);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate()
    {
        $model = $this->getEmptyModel();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Материал добавлен');
            return $this->redirect(['index']);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }
}

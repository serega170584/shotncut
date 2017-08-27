<?php

namespace app\modules\admin\controllers;

use Yii;

use \app\modules\admin\components\CrudController;
use \app\models\node\Feedback;

/**
 * Контроллер для редактирования заявок
 * @see \app\models\node\News
 */
class FeedbackController extends CrudController
{
    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        $comp_cr = Yii::$app->request->get('company', 0);

        return Feedback::find()->byCompany($comp_cr)->orderBy(['created_at' => SORT_DESC]);
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        return new Feedback;
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Материал обновлен');
            return $this->redirect(['update', 'id' => $model->id, 'company' => $model->company]);
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
            return $this->redirect(['update', 'id' => $model->id, 'company' => $model->company]);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index', 'company' => Yii::$app->request->get('company', 0)]);
    }
}

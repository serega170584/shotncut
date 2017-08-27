<?php

namespace app\modules\admin\controllers;

use Yii;

use \app\modules\admin\components\CrudController;
use \app\models\node\AboutSlider;

/**
 * Контроллер для редактирования
 */
class AboutSliderController extends CrudController
{
    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        $comp_cr = Yii::$app->request->get('company', 0);

        return AboutSlider::find()->byCompany($comp_cr)->orderBy(['rating' => SORT_ASC, 'sort' => SORT_ASC]);
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        return new AboutSlider;
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Материал обновлен');
            return $this->redirect(['update', 'id' => $model->id, 'company' => Yii::$app->request->get('company', 0)]);
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
            return $this->redirect(['update', 'id' => $model->id, 'company' => Yii::$app->request->get('company', 0)]);
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

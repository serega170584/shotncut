<?php

namespace app\modules\admin\components;

use app\models\node\Node;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\InvalidConfigException;

abstract class CrudController extends Controller
{
    /**
     * @return yii\db\ActiveQuery
     */
    abstract protected function getActiveQuery();

    /**
     * @return yii\db\ActiveRecrd
     */
    abstract protected function getEmptyModel();


    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $this->getActiveQuery(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $model = $this->getEmptyModel();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Материал добавлен');
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'Материал обновлен');
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     * @return Node the loaded model
     */
    protected function findModel($id)
    {
        $query = $this->getActiveQuery();
        $primaryKey = $this->getEmptyModel()->primaryKey();
        if (isset($primaryKey[0])) {
            $query->andWhere([$this->getEmptyModel()->tableName().'.'.$primaryKey[0] => $id]);
        } else {
            throw new InvalidConfigException('Active record must have a primary key.');
        }
        if (($model = $query->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

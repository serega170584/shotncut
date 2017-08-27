<?php

namespace app\modules\admin\controllers;

use app\models\node\OnlinePolicy;
use app\models\node\Policy;
use Yii;

use \app\modules\admin\components\CrudController;

/**
 * Контроллер для редактирования страниц сайта
 * @see \app\models\node\Page
 */
class ProductsController extends CrudController
{
    public $list_title = 'Продукты';
    public $list_url = ['/admin/products'];

    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        return Policy::find()->byDataType(Policy::getPolicyType('policy')->id);
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        $policy = new Policy();
        $policy->data->policy_type_id = Policy::getPolicyType('policy')->id;

        return $policy;
    }

    public function getViewPath()
    {
        return Yii::getAlias('@app/modules/admin/views/polices');
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
}

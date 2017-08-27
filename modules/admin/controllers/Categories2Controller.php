<?php

namespace app\modules\admin\controllers;

use app\models\category\Category2;
use Yii;

use \app\modules\admin\components\CrudController;

/**
 * Контроллер для редактирования категорий
 * @see \app\models\node\Page
 */
class Categories2Controller extends CrudController
{

    /**
     * @return \app\models\category\Category2Query
     */
    protected function getActiveQuery()
    {
        return Category2::find();
    }


    /**
     * @return Category2
     */
    protected function getEmptyModel()
    {
        return new Category2();
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

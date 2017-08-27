<?php

namespace app\modules\admin\controllers;

use app\models\category\Category;
use Yii;

use \app\modules\admin\components\CrudController;

/**
 * Контроллер для редактирования категорий
 * @see \app\models\node\Page
 */
class CategoriesController extends CrudController
{

    /**
     * @return \app\models\category\CategoryQuery
     */
    protected function getActiveQuery()
    {
        return Category::find();
    }


    /**
     * @return Category
     */
    protected function getEmptyModel()
    {
        return new Category();
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

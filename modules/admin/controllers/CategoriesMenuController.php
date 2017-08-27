<?php

namespace app\modules\admin\controllers;

use app\models\category\CategoryMenu;
use Yii;

use \app\modules\admin\components\CrudController;

/**
 * Контроллер для редактирования категорий
 * @see \app\models\node\Page
 */
class CategoriesMenuController extends CrudController
{

    /**
     * @return \app\models\category\CategoryMenuQuery
     */
    protected function getActiveQuery()
    {
        return CategoryMenu::find()->orderBy(['lft' => SORT_ASC]);
//        return CategoryMenu::find()->orderBy(['lft' => SORT_ASC]);
    }


    /**
     * @return CategoryMenu
     */
    protected function getEmptyModel()
    {
        return new CategoryMenu();
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
}

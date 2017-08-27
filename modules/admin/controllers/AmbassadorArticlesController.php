<?php

namespace app\modules\admin\controllers;

use Yii;

use \app\modules\admin\components\CrudController;
use \app\models\node\Article;

/**
 * Контроллер для редактирования статей конкретного пользователя
 * @see \app\models\node\Article
 */
class AmbassadorArticlesController extends CrudController
{
    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        $user_id = -1;
        if (Yii::$app->user && !Yii::$app->user->isGuest) {
            $user_id = Yii::$app->user->id;
        }
        return Article::find()->byUser($user_id);
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        return new Article;
    }
}

<?php

namespace app\modules\admin\controllers;

use Yii;

use \app\modules\admin\components\CrudController;
use \app\models\node\Article;

/**
 * Контроллер для редактирования статей
 * @see \app\models\node\Article
 */
class ArticlesController extends CrudController
{
    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        return Article::find();
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        return new Article;
    }
}

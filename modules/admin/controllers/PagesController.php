<?php

namespace app\modules\admin\controllers;

use Yii;

use \app\modules\admin\components\CrudController;
use \app\models\node\Page;

/**
 * Контроллер для редактирования страниц сайта
 * @see \app\models\node\Page
 */
class PagesController extends CrudController
{
    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        return Page::find();
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        return new Page;
    }
}

<?php

namespace app\modules\admin\controllers;

use Yii;

use \app\modules\admin\components\CrudController;
use \app\models\node\Video;

/**
 * Контроллер для редактирования новостей
 * @see \app\models\node\News
 */
class VideoController extends CrudController
{
    /**
     * @return yii\db\ActiveQuery
     */
    protected function getActiveQuery()
    {
        return Video::find()->orderBy(['rating' => SORT_ASC, 'sort' => SORT_ASC]);
    }

    /**
     * @return yii\db\ActiveRecrd
     */
    protected function getEmptyModel()
    {
        return new Video;
    }
}

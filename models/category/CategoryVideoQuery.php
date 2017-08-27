<?php

namespace app\models\category;

/**
 * This is the ActiveQuery class for [[CategoryVideo]].
 *
 * @see CategoryVideo
 */
class CategoryVideoQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return CategoryVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

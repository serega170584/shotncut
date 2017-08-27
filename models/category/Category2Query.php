<?php

namespace app\models\category;

/**
 * This is the ActiveQuery class for [[Category2]].
 *
 * @see Category2
 */
class Category2Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Category2[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Category2|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function sorted()
    {
        return $this->addOrderBy(['sort' => 'desc']);
    }

}

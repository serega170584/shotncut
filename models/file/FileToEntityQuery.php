<?php

namespace app\models\file;

/**
 * This is the ActiveQuery class for [[FileToEntity]].
 *
 * @see FileToEntity
 */
class FileToEntityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function byEntityName($name){
        return $this->where(['entity_name' => $name]);
    }

    /**
     * @inheritdoc
     * @return FileToEntity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FileToEntity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

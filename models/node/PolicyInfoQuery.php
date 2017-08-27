<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[PolicyInfo]].
 *
 * @see PolicyInfo
 */
class PolicyInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PolicyInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PolicyInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

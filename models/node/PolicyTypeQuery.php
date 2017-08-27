<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[PolicyType]].
 *
 * @see PolicyType
 */
class PolicyTypeQuery extends \yii\db\ActiveQuery
{
    public function byCode($val)
    {
        return $this->andWhere(['code' => $val]);
    }

    /**
     * @inheritdoc
     * @return PolicyType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PolicyType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

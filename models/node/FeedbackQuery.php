<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[Feedback]].
 *
 * @see News
 */
class FeedbackQuery extends \yii\db\ActiveQuery
{
    /**
     * Поиск по компании
     * @param $value
     * @return \app\models\node\NodeQuery
     */
    public function byCompany($value)
    {
        return $this->andWhere(['company' => $value]);
    }

    /**
     * @inheritdoc
     * @return Node[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Node|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class NewsQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(News::getNodeType());
        return parent::prepare($builder);
    }

    /**
     * Сортировка по умолчанию
     * @param string $order
     * @return \app\models\node\NodeQuery
     */
    public function defaultSort($order = null)
    {
        $order = strtolower($order) === 'desc' ? SORT_DESC : SORT_ASC;
        return $this->addOrderBy(['sort' => $order, 'created_at' => SORT_DESC]);
    }

}

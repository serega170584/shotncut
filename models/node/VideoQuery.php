<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class VideoQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(Video::getNodeType());
        return parent::prepare($builder);
    }

    /**
     * Сортировка по умолчанию
     * @param string $order
     * @return \app\models\node\NodeQuery
     */
    public function defaultSort($order = null)
    {
        $order = strtolower($order) === 'desc' ? 'desc' : 'asc';
        return $this->addOrderBy(['sort' => $order, 'created_at' => 'desc']);
    }
}

<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class CareerQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(Career::getNodeType());
        return parent::prepare($builder);
    }
}

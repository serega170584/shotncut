<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class RegistryQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(Registry::getNodeType());
        return parent::prepare($builder);
    }
}

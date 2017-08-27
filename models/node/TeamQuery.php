<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class TeamQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(Team::getNodeType());
        return parent::prepare($builder);
    }
}

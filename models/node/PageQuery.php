<?php

namespace app\models\node;

/**
 * This is the ActiveQuery class for [[Page]].
 *
 * @see Page
 */
class PageQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(Page::getNodeType());
        return parent::prepare($builder);
    }
}

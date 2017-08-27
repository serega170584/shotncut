<?php

namespace app\models\tag;
use yii\db\Query;

/**
 * This is the ActiveQuery class for [[Tag]].
 *
 * @see Tag
 */
class TagQuery extends \yii\db\ActiveQuery
{
    public function byName($name)
    {
        return $this->andWhere(['name' => $name]);
    }

    public function byEntity($class){
        $entity = new $class;
        $entityTags = (new Query())
            ->select(['tag_id'])
            ->from('{{%sbl_tag_to_entity}}')
            ->groupBy('tag_id')
            ->where(['entity_name' => $class.'_'.$entity->tag_relation_name]);

        return $this->where(['in', 'id', $entityTags]);
    }

    /**
     * @inheritdoc
     * @return Tag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

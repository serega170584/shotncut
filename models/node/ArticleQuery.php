<?php

namespace app\models\node;
use yii\db\Query;

/**
 * This is the ActiveQuery class for [[Article]].
 *
 * @see Article
 */
class ArticleQuery extends NodeQuery
{
    public function prepare($builder)
    {
        $this->byType(Article::getNodeType());
        return parent::prepare($builder);
    }

    public function byTags($tag_list, $ralation_name){
        $article_ids = (new Query())
            ->select(['entity_id'])
            ->where(['entity_name' => Article::className().'_'.$ralation_name])
            ->andWhere(['in', 'tag_id', $tag_list])
            ->from('{{%sbl_tag_to_entity}}');

        return $this->where(['in', 'id', $article_ids]);
    }

    public function notId($id){
        return $this->where(['!=', Article::tableName().'.id', $id]);
    }
}

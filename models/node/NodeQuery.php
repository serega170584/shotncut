<?php

namespace app\models\node;
use paulzi\nestedsets\NestedSetsQueryTrait;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Node]].
 *
 * @see Node
 */
class NodeQuery extends \yii\db\ActiveQuery
{
    use NestedSetsQueryTrait;

    /**
     * Поиск по названию
     * @param string $value
     * @return \app\models\node\NodeQuery
     */
    public function byTitle($value)
    {
        return $this->andWhere(['title' => $value]);
    }

    /**
     * Поиск по названию
     * @param string $value
     * @return \app\models\node\NodeQuery
     */
    public function byAlias($value)
    {
        return $this->andWhere(['alias' => $value]);
    }

    /**
     * Поиск по типу
     * @param int $value
     * @return \app\models\node\NodeQuery
     */
    public function byType($value)
    {
        return $this->andWhere(['type_id' => $value]);
    }

    /**
     * Поиск по типам
     * @param array $value
     * @return \app\models\node\NodeQuery
     */
    public function byTypes(array $value)
    {
        return $this->andWhere(['type_id' => $value]);
    }


    /**
     * Поиск по категории
     * @param int $value
     * @return \app\models\node\NodeQuery
     */
    public function byCategory($value)
    {
        return $this->joinWith(['category' => function(ActiveQuery $q) use ($value){
            $q->where(['category_id' => $value]);
        }], false);
    }

    /**
     * Поиск по языку
     * @param string $value
     * @return \app\models\node\NodeQuery
     */
    public function byLang($value)
    {
        return $this->andWhere(['lang_id' => $value]);
    }

    /**
     * Поиск по идентификатору
     * @param $id
     * @internal param string $value
     * @return \app\models\node\NodeQuery
     */
    public function byId($id)
    {
        return $this->andWhere(['id' => $id]);
    }

    /**
     * Поиск по компании
     * @param $value
     * @return \app\models\node\NodeQuery
     */
    public function byCompany($value)
    {
        return $this->andWhere(['rating' => $value]);
    }

    /**
     * Поиск по создателю
     * @param string $value
     * @return \app\models\node\NodeQuery
     */
    public function byUser($value)
    {
        return $this->andWhere(['user_id' => $value]);
    }


    /**
     * Поиск только активных
     * @return \app\models\node\NodeQuery
     */
    public function active()
    {
        return $this->andWhere(['status' => 1]);
    }

    /**
     * Поиск только неактивных
     * @return \app\models\node\NodeQuery
     */
    public function inactive()
    {
        return $this->andWhere(['status' => 0]);
    }


    /**
     * Сортировка по умолчанию
     * @param string $order
     * @return \app\models\node\NodeQuery
     */
    public function defaultSort($order = null)
    {
        $order = strtolower($order) === 'desc' ? SORT_DESC : SORT_ASC;
        return $this->addOrderBy(['sort' => $order]);
    }

    /**
     * Join with User Model
     * @return $this
     */
    public function withAuthor(){

        return $this->joinWith(['user' => function($q){
            $q->where(['blocked_at' => null]);
        }]);
    }

    /**
     * Сортировка по дате создания
     * @param int $type_order
     * @return $this
     */
    public function orderByDateCreated($type_order = SORT_DESC){
        return $this->orderBy([
            'created_at' => $type_order
        ]);
    }

    /**
     * Сортировка по Рейтингу
     * @param int $type_order
     * @return $this
     */
    public function orderByRating($type_order = SORT_DESC){
        return $this->orderBy([
            'rating' => $type_order
        ]);
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

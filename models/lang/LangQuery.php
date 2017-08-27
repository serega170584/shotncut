<?php

namespace app\models\lang;

/**
 * This is the ActiveQuery class for [[Lang]].
 *
 * @see Lang
 */
class LangQuery extends \yii\db\ActiveQuery
{
    /**
     * Поиск по коду языка
     * @param string $value
     * @return \app\models\lang\LangQuery
     */
    public function byCode($value)
    {
        return $this->andWhere(['code' => $value]);
    }

    /**
     * Поиск по названию языка
     * @param string $value
     * @return \app\models\lang\LangQuery
     */
    public function byName($value)
    {
        return $this->andWhere(['name' => $value]);
    }


    /**
     * @inheritdoc
     * @return Type[]|array
     */
    public function all($db = null)
    {
        return $this->getData('all');
    }

    /**
     * @inheritdoc
     * @return Type|array|null
     */
    public function one($db = null)
    {
        return $this->getData('one');
    }



    /**
     * @var array
     */
    protected static $_data = [];

    /**
     * Возвращает все данные, которые есть в таблице
     * @return array
     */
    protected function getData($add)
    {
        $cId = $add;
        foreach ($this as $key => $value) {
            $cId .= json_encode($value);
        }
        $cid = md5($cId);
        if (!isset(self::$_data[$cid])) {
            self::$_data[$cid] = $add === 'all' ? parent::all() : parent::one();
        }
        return self::$_data[$cid];
    }
}

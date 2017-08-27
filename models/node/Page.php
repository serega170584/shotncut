<?php

namespace app\models\node;

use Yii;

/**
 * This is the model class for table "{{%sbl_node}}".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $sort
 * @property integer $status
 * @property string $title
 * @property string $alias
 * @property string $preview_text
 * @property string $detail_text
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $lang_id
 */
class Page extends Node
{
    /**
     * Возвращает тип контента для данной модели
     * @throws \Exception
     * @return \app\model\node
     */
    public static function getNodeType()
    {
        $return = Type::find()->byCode('page')->one();
        if (!$return) throw new \Exception('Type not found');
        return $return;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->type_id = self::getNodeType()->id;
        return parent::init();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            $this->type_id = self::getNodeType()->id;

            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new PageQuery(get_called_class());
    }
}

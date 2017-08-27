<?php

namespace app\models\node;

use Yii;

/**
 * This is the model class for table "{{%sbl_node_type}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 */
class Type extends \yii\db\ActiveRecord
{
    const POLICY = 4;
    const NEWS = 3;
    const VIDEO = 8;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_node_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'trim'],
            [['name', 'code'], 'filter', 'filter' => 'strip_tags'],
            [['name', 'code'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 10],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название типа',
            'code' => 'Код типа',
        ];
    }

    /**
     * @inheritdoc
     * @return TypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeQuery(get_called_class());
    }
}

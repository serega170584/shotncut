<?php

namespace app\models\node;

use Yii;

/**
 * This is the model class for table "{{%policy_type}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 */
class PolicyType extends \yii\db\ActiveRecord
{
    const TYPE_SIMPLE = 'simple-policy';
    const TYPE_ONLINE = 'online-policy';
    const TYPE_COMPLEX = 'complex-policy';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%policy_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 30],
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
            'name' => 'Name',
            'code' => 'Code',
        ];
    }

    /**
     * @inheritdoc
     * @return PolicyTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PolicyTypeQuery(get_called_class());
    }
}

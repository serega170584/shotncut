<?php

namespace app\models\node;

use Yii;

/**
 * This is the model class for table "{{%policy}}".
 *
 * @property integer $id
 * @property integer $policy_type_id
 * @property integer $node_id
 */
class PolicyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%policy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['policy_type_id'], 'required'],
            [['policy_type_id', 'node_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'policy_type_id' => 'Тип полиса',
            'node_id' => 'Идентификатор материала',
        ];
    }

    /**
     * @inheritdoc
     * @return PolicyInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PolicyInfoQuery(get_called_class());
    }
}

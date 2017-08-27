<?php

namespace app\models\lang;

use Yii;

/**
 * This is the model class for table "{{%sbl_lang}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_lang}}';
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
            'name' => 'Название языка',
            'code' => 'Код языка',
        ];
    }

    /**
     * @inheritdoc
     * @return LangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LangQuery(get_called_class());
    }
}

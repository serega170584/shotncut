<?php

namespace app\models\file;

use Yii;

/**
 * This is the model class for table "{{%sbl_file_to_entity}}".
 *
 * @property integer $id
 * @property string $entity_name
 * @property integer $entity_id
 * @property integer $file_id
 */
class FileToEntity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_file_to_entity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_name', 'entity_id', 'file_id'], 'required'],
            [['entity_id', 'file_id'], 'integer'],
            [['entity_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_name' => 'Тип сущности, к которой привязан файл',
            'entity_id' => 'Идентифиатор сущности',
            'file_id' => 'Идентифиатор файла',
        ];
    }

    /**
     * @inheritdoc
     * @return FileToEntityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileToEntityQuery(get_called_class());
    }
}

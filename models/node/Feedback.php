<?php

namespace app\models\node;

use Yii;

/**
 * This is the model class for table "{{%sbl_feedback}}".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $company
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property string $theme
 * @property string $message
 */
class Feedback extends \yii\db\ActiveRecord
{

    public function rules()
    {
        return [
            [['fio', 'phone', 'theme', 'message'], 'filter', 'filter' => 'trim'],
            [['company', 'fio', 'phone', 'theme', 'message', 'email'], 'required'],
            ['email', 'email'],
            [['email', 'phone', 'fio', 'theme'], 'string', 'max' => 255],
            ['message', 'string'],
            ['company', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'created_at'    => 'Создан',
            'updated_at'    => 'Обновлён',
            'company'       => 'Компания',
            'fio'           => 'ФИО',
            'phone'         => 'Телефон',
            'email'         => 'Email',
            'theme'         => 'Тема обращения',
            'message'       => 'Cообщение',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            //отмечаем пользователя, который создал запись, если можем
//            if ($this->isNewRecord && Yii::$app->user && !Yii::$app->user->isGuest) {
//                $this->user_id = Yii::$app->user->id;
//            }
            //вместо timestamp, быстрее будет
            $date = Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s');
            if ($this->isNewRecord) $this->created_at = $date;
            $this->updated_at = $date;

            return true;
        }
        return false;

    }


    public function beforeValidate()
    {
        if ($this->company == '') {
            $this->company = Yii::$app->request->get('company', 0);
        }
        return parent::beforeValidate();
    }


    /**
     * @inheritdoc
     * @return FeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_feedback}}';
    }


    /**
     * Fields allow in API JSON
     * @return array
     */
    public function fields(){

        return [
            'id',
            'company',
            'fio',
            'theme',
            'phone',
            'email',
            'message',
            'created_at',
        ];
    }


    public static function getCompany2() {
        return [
            '0' => 'СК «Сбербанк страхование»',
            '1' => 'СК «Сбербанк страхование жизни»',
        ];
    }

}

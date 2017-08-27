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
class Career extends Node
{
    public function behaviors()
    {
        $parent = parent::behaviors();
/*        $parent[] = [
            'class' => '\app\components\FileBehavior',
            'file_relation_name' => 'previewPicture',
            'file_extensions' => 'png, jpg',
        ];*/
        $parent[] = [
            'class' => '\app\components\TagBehavior',
            'tag_relation_name' => 'tags'
        ];
        return $parent;
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $return = parent::attributeLabels();
//        $return['previewPictureNew'] = 'Фото сотрудника';
//        $return['previewPictureDelete'] = 'Удалить изображение анонса';
        $return['tagsList']         = 'Теги';
        $return['rating']           = 'Компания';
        $return['preview_text']     = 'Текст';
        $return['text_1']           = 'Уровень з/п';
        $return['text_2']           = 'Опыт работы';
        $return['text_3']           = 'Тип занятости';
        return $return;
    }

    /**
     * Возвращает тип контента для данной модели
     * @return \app\model\node
     */
    public static function getNodeType()
    {
        $return = Type::find()->byCode('career')->one();
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


    public function beforeValidate()
    {
        $this->lang_id = 1;
        if (!trim($this->alias)) {
            $this->alias = 'about_career';
        }
        $this->rating = Yii::$app->request->get('company', 0);
        return parent::beforeValidate();


    }




    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->type_id = self::getNodeType()->id;

        $this->dataall = [
            't_1' => $this->text_1,
            't_2' => $this->text_2,
            't_3' => $this->text_3,
        ];

        $this->detail_text = serialize($this->dataall);

        return parent::beforeSave($insert);
    }



    public function afterSave($insert, $changedAttributes)
    {
        $this->dataall = unserialize($this->detail_text);

        $this->text_1 = @$this->dataall['t_1'];
        $this->text_2 = @$this->dataall['t_2'];
        $this->text_3 = @$this->dataall['t_3'];

        parent::afterSave($insert, $changedAttributes);
    }




    public function afterFind()
    {
        parent::afterFind();

        $this->dataall = unserialize($this->detail_text);

        $this->text_1 = @$this->dataall['t_1'];
        $this->text_2 = @$this->dataall['t_2'];
        $this->text_3 = @$this->dataall['t_3'];

    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new CareerQuery(get_called_class());
    }

}

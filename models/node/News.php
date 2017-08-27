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
class News extends Node
{
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent[] = [
            'class' => '\app\components\FileBehavior',
            'file_relation_name' => 'previewPicture',
            'file_extensions' => 'png, jpg',
        ];
        $parent[] = [
            'class' => '\app\components\FileBehavior',
            'file_relation_name' => 'detailPicture',
            'file_extensions' => 'png, jpg',
        ];
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
        $return['previewPictureNew'] = 'Изображение анонса';
        $return['previewPictureDelete'] = 'Удалить изображение анонса';
        $return['detailPictureNew'] = 'Детальное изображение';
        $return['detailPictureDelete'] = 'Удалить детальное изображение';
        $return['tagsList'] = 'Теги статьи';
        $return['text_1'] = 'Дата публикации';
        $return['rating'] = 'Компания'; 
        return $return;
    }

    /**
     * Возвращает тип контента для данной модели
     * @return \app\model\node
     */
    public static function getNodeType()
    {
        $return = Type::find()->byCode('news')->one();
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


    public function afterFind()
    {
        parent::afterFind();

        $dat = explode(' ',$this->created_at);
        $dat_1 = '';

        if (isset($dat[0])) {
            $dat_1 = $dat[0];
        }
        $this->text_1 = $dat_1;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->type_id = self::getNodeType()->id;

        if (trim($this->text_1)) {
            $this->created_at = $this->text_1;
        }
        //vd($this->text_1, false);
        //$this->created_at = $this->text_1;
        return parent::beforeSave($insert);
    }


    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    public function getPreviewThumbUrl(){
        return $this->previewPicture ?
            Yii::$app->imager->getThumbUrl($this->previewPicture->fsPath, 700, 528) : null;
    }

    public function getDetailThumbUrl(){
        return $this->detailPicture ?
            Yii::$app->imager->getThumbUrl($this->detailPicture->fsPath, 700, 528) : null;
    }

}

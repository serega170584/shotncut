<?php

namespace app\models\node;

use Yii;
use app\models\category\CategoryVideo;

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
class Video extends Node
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
        $return['previewPictureNew'] = 'Фото сотрудника';
        $return['previewPictureDelete'] = 'Удалить изображение анонса';
        $return['tagsList'] = 'Теги статьи';
        $return['preview_text'] = 'Код видео с youtube.com (пример: iNwkFZKLHpA)';
        $return['rating'] = 'Категория';
        return $return;
    }

    /**
     * Возвращает тип контента для данной модели
     * @return \app\model\node
     */
    public static function getNodeType()
    {
        $return = Type::find()->byCode('video')->one();
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
        return parent::beforeValidate();
    }


    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->type_id = self::getNodeType()->id;
        return parent::beforeSave($insert);
    }

    /**
     * @return mixed
     */
    public function getVidCategory() {
        $all_cat = CategoryVideo::getCategoryArrList();
        return (isset($all_cat[$this->rating])?$all_cat[$this->rating]:'');
    }


    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
    }

    public function getPreviewThumbUrl(){
        return $this->previewPicture ?
            Yii::$app->imager->getThumbUrl($this->previewPicture->fsPath, 80, 80) : null;
    }
}

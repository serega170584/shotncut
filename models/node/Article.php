<?php

namespace app\models\node;

use app\models\tag\Tag;
use app\modules\admin\models\Profile;
use dektrium\user\models\User;
use Yii;
use yii\helpers\Url;

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
class Article extends Node
{
	/**
	 * @inheritdoc
	 */
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
		$parent[] = [
			'class' => 'app\modules\admin\components\content_constructor\behaviors\Ar',
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
        $return['article'] = 'Конструктор страницы';
        $return['tagsList'] = 'Теги статьи';
        return $return;
    }


    /**
     * Возвращает тип контента для данной модели
     * @throws \Exception
     * @return \app\model\node
     */
    public static function getNodeType()
    {
        $return = Type::find()->byCode('article')->one();
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
        $this->type_id = self::getNodeType()->id;
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }

    /**
     * Return author Profile
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor(){

        return $this->hasOne(Profile::className(), ['user_id' => 'user_id']);
    }

    public function getPreviewThumbUrl(){
        return $this->previewPicture ?
            Yii::$app->imager->getThumbUrl($this->previewPicture->fsPath, 700, 528) : null;
    }

    public function getDetailThumbUrl(){
        return $this->detailPicture ?
            Yii::$app->imager->getThumbUrl($this->detailPicture->fsPath, 700, 528) : null;
    }

    public function getUrl(){
        return Url::to(['/ambassador/article', 'id' => $this->id]);
    }

    /**
     * Fields allow in API JSON
     * @return array
     */
    public function fields(){

        return [
            'id',
            'title',
            'status',
            'alias',
            'url',
            'created_at',
            'preview_text',
            'detail_text',
            'imageUrl' => function($item){
                return $item->detailThumbUrl;
            },
            'author',
            'category',
            'tags',
            'rating'
        ];
    }
}

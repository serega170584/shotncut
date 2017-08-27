<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 09.06.16
 * Time: 13:58
 */

namespace app\modules\admin\models;

use app\models\category\Category;
use app\models\node\Node;
use dektrium\user\models\Profile as BaseProfile;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property User    $user
 *
 * @property string  $status
 * @property string  $birth_date
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class Profile extends BaseProfile {

    public $category_list = [];

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = ['category_id', 'integer'];
        $rules[] = ['status', 'string', 'max' => 255];
        $rules[] = ['birth_date', 'date', 'format' => 'php:d.m.Y'];

        $rules[] = ['category_list', 'safe'];

        return $rules;
    }

    public function attributeLabels()
    {
        $return = parent::attributeLabels();
        $return['avatarImageNew'] = 'Аватарка';
        $return['avatarImageDelete'] = 'Удалить изображение аватарки';
        $return['coverImageNew'] = 'Обложка';
        $return['coverImageDelete'] = 'Удалить обложку';
        $return['status'] = 'Статус';
        $return['birth_date'] = 'Дата рождения';
        $return['tagsList'] = 'Интересы';
        $return['category_id'] = 'Главная категория';
        $return['category_list'] = 'Список доступных категорий';

        return $return;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent[] = [
            'class' => '\app\components\FileBehavior',
            'file_relation_name' => 'avatarImage',
            'file_extensions' => 'png, jpg',
        ];
        $parent[] = [
            'class' => '\app\components\FileBehavior',
            'file_relation_name' => 'coverImage',
            'file_extensions' => 'png, jpg',
        ];
        $parent[] = [
            'class' => '\app\components\TagBehavior',
            'tag_relation_name' => 'tags'
        ];
        return $parent;
    }

    /**
     * Кол-во материалов пользователя
     * @return int|string
     */
    public function getCountArticles(){
        return $this->hasMany(Node::className(), ['user_id' => 'user_id'])->count();
    }

    /**
     * Категории пользователя
     * @return int|string
     */
    public function getCategories(){
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('{{%sbl_user_to_category}}', ['user_id' => 'user_id']);
    }

    /**
     * Главная категория
     * @return int|string
     */
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getUrl(){
        return Url::to(['/ambassador', 'id' => $this->user_id]);
    }

    public function getRole(){
        $roles = \Yii::$app->authManager->getRolesByUser($this->user_id);

        return implode(',', ArrayHelper::map($roles, 'name', 'description'));
    }

    /**
     * @return ProfileQuery
     */
    public static function find(){
        return new ProfileQuery(get_called_class());
    }

    public function beforeSave($insert){

        if($this->birth_date){
            $b_date = \DateTime::createFromFormat('d.m.Y', $this->birth_date);

            $this->birth_date = $b_date->format('Y-m-d');
        }

        if($this->category_list){
            foreach($this->categories as $cat){
                $this->unlink('categories', $cat, true);
            }
            $categories = Category::find()->where(['id' => $this->category_list])->all();
            foreach($categories as $cat){
                $this->link('categories', $cat);
            }
        }

        return parent::beforeSave($insert);
    }

    public function beforeDelete(){

        if(parent::beforeDelete()){

            foreach($this->categories as $cat){
                $this->unlink('categories', $cat, true);
            }

            return true;
        }

        return false;
    }

    public function fields(){

        return [
            'id' => function($item){
                return $item->user_id;
            },
            'name',
            'status',
            'category',
            'avatar_image_url' => function($item){
                return $item->avatarImage ? \Yii::$app->imager->getThumbUrl($item->avatarImage->fsPath, 80, 80, 90) : '';
            },
            'cover_image_url' => function($item){
                return $item->coverImage ? $item->coverImage->url : '';
            },
            'url'
        ];
    }
} 
<?php

namespace app\models\category;

use app\models\node\Node;
use paulzi\nestedsets\NestedSetsBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%sbl_category_video}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 */
class CategoryVideo extends \yii\db\ActiveRecord
{
    public $parent_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_category_video}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['tree', 'lft', 'rgt', 'depth', 'parent_id', 'sort'], 'integer'],
            [['code'], 'unique'],
            [['code'], 'string', 'max' => 40],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent[] = [
            'class' => NestedSetsBehavior::className(),
            'treeAttribute' => 'tree',
        ];
        return $parent;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'code' => 'Код котигории',
            'tree' => 'Tree',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'sort' => 'Сортировка',
            'parent_id' => 'Родительская категория',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryVideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryVideoQuery(get_called_class());
    }

    public function getNodes(){
        return $this->hasMany(Node::className(), ['id' => 'node_id'])
            ->viaTable('{{%sbl_node_to_category_video}}', ['category_id' => 'id']);
    }


    /**
     * @inheritdoc
     */
    public function afterValidate(){

        $this->code = uniqid();

        if($this->isNewRecord && !$this->parent_id){ //Есди родительский раздел не выбран, устанавливаем текущий корнем
            $this->makeRoot();
            //die(var_dump($this));
        }elseif($this->parent_id > 0){ //Есди родительский раздел выбран, вставляем текущий в него
            $cat = static::findOne($this->parent_id);

            if($cat){
                $this->appendTo($cat);
            }
        }

        parent::afterValidate();
    }



    /**
     * @return array
     */
    public static function getCategoryArrList() {

        $cat = static::find()->orderBy(['sort' => SORT_ASC])->all();
        $cat_res = [];

        foreach($cat as $cat_item) {
            $cat_res[$cat_item->id] = $cat_item->name;
        }
        return $cat_res;
    }



    public function fields(){

        return [
            'id',
            'name',
            'code',
            'sort'
        ];
    }
}

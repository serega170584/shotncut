<?php

namespace app\models\category;

use app\models\node\Node;
use app\models\node\NodeQuery;
use paulzi\nestedsets\NestedSetsBehavior;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%sbl_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $sort
 *
 * @mixin NestedSetsBehavior
 */
class Category extends \yii\db\ActiveRecord
{
    public $parent_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_category}}';
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
            'code' => 'Код',
            'sort' => 'Сортировка',
            'tree' => 'Tree',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'parent_id' => 'Родительская категория',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    /**
     * @return NodeQuery|ActiveQuery
     */
    public function getNodes(){
        return $this->hasMany(Node::className(), ['id' => 'node_id'])
            ->viaTable('{{%sbl_node_to_category}}', ['category_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function afterValidate(){

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

    public function afterDelete(){

        if($this->nodes){
            foreach($this->nodes as $node){
                $this->unlink('nodes', $node, true);
            }
        }

        parent::afterDelete();
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

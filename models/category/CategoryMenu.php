<?php

namespace app\models\category;

use app\models\node\Node;
use paulzi\nestedsets\NestedSetsBehavior;
use Yii;
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
 * @property integer $depth
 */
class CategoryMenu extends \yii\db\ActiveRecord
{
    public $parent_id;
    private $_parent_id;
    public $move_to;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sbl_category_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['tree', 'lft', 'rgt', 'depth', 'parent_id', 'gray', 'move_to'], 'integer'],
//            [['code'], 'unique'],
            [['code'], 'string', 'max' => 40],
            [['name'], 'string', 'max' => 255],
            [['link'], 'string'],
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
            'link' => 'Ссылка',
            'tree' => 'Tree',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'parent_id' => 'Родительская категория',
            'gray' => 'Серый цвет',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryMenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryMenuQuery(get_called_class());
    }



/*
    public function getNodes(){
        return $this->hasMany(Node::className(), ['id' => 'node_id'])
            ->viaTable('{{%sbl_node_to_category}}', ['category_id' => 'id']);
    }*/





    /**
     * @inheritdoc
     */
    public function afterValidate(){

        if (!trim($this->link)) {
            $this->link = '#';
        }

        $mt = intval($this->move_to);   // куда поместить

        $this->code = uniqid();

        if($this->isNewRecord) {        // новая запись

            if(!$this->parent_id) {     // категория не указана

                $root = static::findOne(['depth' => 0]);

                if ($root) {            // если корневая уже есть

                    $this->appendTo($root);     // внутрь

                } else {                // если нет корневой - создать
                    $this->makeRoot();
                }

            } elseif(($this->_parent_id != $this->parent_id) || ($mt != 0)) {    // категория указана

                $cat = static::findOne($this->parent_id);

                if($cat){
                    if (($mt == 1) && (!$cat->isRoot())) {
                        $this->insertBefore($cat);  // перед
                    } elseif(($mt == 2) && (!$cat->isRoot())) {
                        $this->insertAfter($cat);   // после
                    } else {
                        $this->appendTo($cat);      // внутрь
                    }
                }
            }

        } else {    // редактирование

            // категория указана
            if($this->parent_id && (($this->_parent_id != $this->parent_id)  || ($mt != 0)) && (!$this->isRoot())) {

                $cat = static::findOne($this->parent_id);

                if($cat){

                    if (($mt == 1) && (!$cat->isRoot())) {
                        $this->insertBefore($cat);  // перед
                    } elseif(($mt == 2) && (!$cat->isRoot())) {
                        $this->insertAfter($cat);   // после
                    } else {
                        $this->appendTo($cat);      // внутрь
                    }
                }
            }
        }

/*
        if(!$this->parent_id) {
            if($this->isNewRecord || ($this->_parent_id != $this->parent_id)) {
                $this->makeRoot();
            }
        } else {
            if($this->_parent_id != $this->parent_id) {
                $cat = static::findOne($this->parent_id);

                if($cat){
                    $this->appendTo($cat);
                }
            }
        }*/

/*

        if($this->isNewRecord) {
            if(!$this->parent_id) {
                $this->makeRoot();
            } else {
                $cat = static::findOne($this->parent_id);

                if($cat){
                    $this->appendTo($cat);
                }
            }
        } else {
            if($this->_parent_id != $this->parent_id) {

                if($this->parent_id > 0){

                    $cat = static::findOne($this->parent_id);

                    if($cat){
                        $this->appendTo($cat);
                    }
                } else {
                    $this->makeRoot();
                }
            }
        }*/

/*
        if($this->isNewRecord && !$this->parent_id){ //Есди родительский раздел не выбран, устанавливаем текущий корнем
            $this->makeRoot();

            //die(var_dump($this));
        }elseif($this->parent_id > 0){ //Есди родительский раздел выбран, вставляем текущий в него

            if($this->_parent_id != $this->parent_id) {

                $cat = static::findOne($this->parent_id);

                if($cat){
                    $this->appendTo($cat);
                }
            }
        }*/

        parent::afterValidate();
    }
/*
    public function getParr() {
        return $this->parent->id;
    }*/



    public function afterFind()
    {
        parent::afterFind();

        $this->parent_id = $this->parent ? $this->parent->id : 0;
        $this->_parent_id = $this->parent_id;
        $this->move_to = 0;

        if (!trim($this->link)) {
            $this->link = '#';
        }
    }


    public function beforeDelete()
    {
        if (!$this->isRoot()) {
            return parent::beforeDelete();
        } else {
            return false;
        }
    }


    public function afterDelete(){
/*
        if($this->nodes){
            foreach($this->nodes as $node){
                $this->unlink('nodes', $node, true);
            }
        }*/

        parent::afterDelete();
    }


    public function fields(){

        return [
            'id',
            'name',
            'code',
            'link'
        ];
    }
}

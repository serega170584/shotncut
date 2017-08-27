<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 10.06.16
 * Time: 14:11
 */

namespace app\components;


use app\models\tag\Tag;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\validators\Validator;

class TagBehavior extends Behavior {

    public $tag_class = '\app\models\tag\Tag';

    public $tag_relation_name = null;

    private $junction_table = '{{%sbl_tag_to_entity}}';

    /**
     * @var mixed
     */
    protected $_attributes = [
        'list' => []
    ];

    /**
     * @inheritdoc
     */
    public function hasMethod($name)
    {
        if ($name === $this->getRelationFunctionName()) {
            return true;
        } else {
            return parent::hasMethod($name);
        }
    }

    /**
     * @inheritdoc
     */
    public function __call($name, $params)
    {
        if ($name === $this->getRelationFunctionName()) {
            return $this->returnRelation();
        } else {
            return parent::__call($name, $params);
        }
    }

    /**
     * @inheritdoc
     */
    public function canSetProperty($name, $checkVars = true)
    {
        if ($this->isAttribute($name)) {
            return true;
        } else {
            return parent::canSetProperty($name, $checkVars);
        }
    }

    /**
     * @inheritdoc
     */
    public function canGetProperty($name, $checkVars = true)
    {
        if ($name === $this->tag_relation_name || $this->isAttribute($name)) {
            return true;
        } else {
            return parent::canGetProperty($name, $checkVars);
        }
    }

    /**
     * @inheritdoc
     */
    public function __set($name, $value)
    {
        if ($aname = $this->isAttribute($name)) {
            $this->_attributes[$aname] = $value;
        } else {
            return parent::__set($name, $value);
        }
    }

    /**
     * @inheritdoc
     */
    public function __get($name)
    {
        if ($name === $this->tag_relation_name) {
            return $this->returnRelation();
        } elseif ($aname = $this->isAttribute($name)) {
            return $this->_attributes[$aname];
        } else {
            return parent::__get($name);
        }
    }

    /**
     * Проверяет является ли заданное имя аттрибутом
     * @param string $name
     * @return string|bool
     */
    protected function isAttribute($name)
    {
        $names = array_keys($this->_attributes);
        foreach ($names as $aname) {
            if ($this->getAttributeName($aname) !== $name) continue;
            return $aname;
        }
        return false;
    }

    /**
     * Возвращает название атрибута
     * @param string $name
     * @return string
     */
    protected function getAttributeName($name)
    {
        return $this->tag_relation_name . ucfirst($name);
    }

    /**
     * Возвращает название функции relation'а
     * @return string
     */
    protected function getRelationFunctionName()
    {
        return 'get' . $this->tag_relation_name;
    }

    /**
     * Возвращает название для сущности в таблице связей
     * @return string
     */
    protected function getEntityName()
    {
        return get_class($this->owner) . '_' . $this->tag_relation_name;
    }

    /**
     * Возвращает описание relation для модели
     */
    protected function returnRelation()
    {
        $ar = $this->owner;
        $pk = $ar->primaryKey();
        $pk = reset($pk);

        return $ar
            ->hasMany(
                $this->tag_class,
                ['id' => 'tag_id']
            )->viaTable(
                $this->junction_table,
                ['entity_id' => $pk],
                function ($query) {
                    $query->andWhere(['entity_name' => $this->getEntityName()]);
                }
            );
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_VALIDATE => 'afterValidate',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attach($owner)
    {
        parent::attach($owner);
        //валидатор для поля с файлом

        $tagsValidator = Validator::createValidator(
            'safe',
            $this->owner,
            $this->getAttributeName('list')
        );

        $owner->validators[] = $tagsValidator;
    }

    /**
     * Перед валидацией добавляем валидатор для файла
     */
    public function afterValidate($event)
    {
        //Фильтруем значения
        if(is_array($this->owner->{$this->getAttributeName('list')})){

            $this->owner->{$this->getAttributeName('list')} = array_map(function($item){
                if(preg_match('/^\d+$/', $item) === 1) return intval($item);
                return $item;
            }, $this->owner->{$this->getAttributeName('list')});
        }
    }

    /**
     * После сохранения основной модели, пробуем сохранить и файл
     */
    public function afterSave($event)
    {
        $relation = $this->tag_relation_name;
        $relatedModels = $this->owner->$relation;

        if($relatedModels){
            foreach($relatedModels as $model){
                $this->owner->unlink($relation, $model, true);
            }
        }

        $class = $this->tag_class;
        $list = $this->_attributes['list'] ? $this->_attributes['list'] : [];

        foreach ($list as $item) {
            $tag = null;

            if(is_int($item)){ //exists tag
                $tag = forward_static_call([$class, 'findOne'], $item);
            }elseif(is_string($item)) { //new tag
                $q = forward_static_call([$class, 'find']);
                $tag = $q->byName($item)->one();
                if(!$tag){
                    $tag = new Tag();
                    $tag->name = mb_strtolower($item);
                    $tag->save();
                }
            }

            if($tag){
                $this->owner->link(
                    $relation,
                    $tag,
                    ['entity_name' => $this->getEntityName()]
                );
            }
        }
    }

    /**
     * Перед удалением удаляем связанную модель
     */
    public function beforeDelete($event)
    {
        $relation = $this->tag_relation_name;
        $relatedModels = $this->owner->$relation;
        if($relatedModels){
            foreach($relatedModels as $model){
                $this->owner->unlink($relation, $model, true);
            }
        }
    }
} 
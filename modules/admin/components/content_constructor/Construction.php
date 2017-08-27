<?php

namespace app\modules\admin\components\content_constructor;

use app\modules\admin\components\content_constructor\IPart;
use app\modules\admin\components\content_constructor\IConstruction;
use app\modules\admin\components\content_constructor\IConstructor;

class Construction implements IConstruction
{
    /**
     * Задает конструктор
     * @param \app\modules\admin\components\content_constructor\IConstructor $constructor
     */
    public function __construct(array $parts = [], IConstructor $constructor = null)
    {
        if ($constructor) $this->setConstructor($constructor);
        if ($parts) $this->addParts($parts);
    }


    /**
     * Отображает все части в админке
     * @param \yii\web\View $view
     * @param bool $order_by_position Если true сортирует по полю position
     * @return string
     */
    public function renderAdmin(\yii\web\View $view, $order_by_position = true)
    {
        $parts = $this->getParts();

        //Сортировка по полю position
        if($order_by_position){
            $this->sortByPosition($parts);
        }

        $return = '';
        foreach ($parts as $part) $return .= $part->renderAdmin($view);
        return $return;
    }

    /**
     * Отображает все части на сайте
     * @param \yii\web\View $view
     * @param bool $order_by_position Если true сортирует по полю position
     * @return string
     */
    public function renderPublic(\yii\web\View $view, $order_by_position = true)
    {
        $parts = $this->getParts();

        if($order_by_position){
            $this->sortByPosition($parts);
        }

        $return = '';
        foreach ($parts as $part) $return .= $part->renderPublic($view);
        return $return;
    }

    /**
     * Сортировка блоков по полю position
     * @param array $parts
     */
    protected function sortByPosition(array &$parts){

        //Проверяем нужно ли сортировать, если все позиции в нуле не сортируем
        $pos = 0;
        foreach ($parts as $p) {
            $pos += $p->getPosition();
        }
        if($pos == 0) return;

        uasort($parts, function(Part $a, Part $b){
            $pos_a = $a->getPosition();
            $pos_b = $b->getPosition();
            if($pos_a == $pos_b) return 0;
            elseif($pos_a < $pos_b) return -1;
            elseif($pos_a > $pos_b) return 1;
        });
    }

    /**
     * @var mixed
     */
    protected $_parts = [];

    /**
     * Возвращает части
     * @return IPart[]
     */
    public function getParts()
    {
        return $this->_parts;
    }

    /**
     * Очищает все части
     */
    public function clearParts()
    {
        $this->_parts = [];
    }

    /**
     * Задает части
     * @param array $parts
     * @return $this
     */
    public function addParts(array $parts)
    {
        $this->clearParts();
        foreach ($parts as $part) {
            $this->addPart($part);
        }
        return $this;
    }

    /**
     * Добавляет часть
     * @param array $part
     * @return $this
     */
    public function addPart(array $part)
    {
        $part = $this->getConstructor()->createPart($part);
        $part->setParent($this);
        $this->_parts[] = $part;
        return $this;
    }



    /**
     * @var mixed
     */
    protected $_name = null;

    /**
     * Возвращает название
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Возвращает название для js
     * @return mixed
     */
    public function getJsName()
    {
        return str_replace(['[', ']', '-', '(', ')', ' ', '{', '}'], '_', $this->getName());
    }

    /**
     * Задает название
     * @param mixed $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setName($val)
    {
        $this->_name = $val;
        return $this;
    }



    /**
     * @var \app\modules\admin\components\content_constructor\Constructor
     */
    protected $_constructor = null;

    /**
     * Возвращает конструктор
     * @return \app\modules\admin\components\content_constructor\IConstructor
     */
    public function getConstructor()
    {
        if ($this->_constructor === null) {
            $this->_constructor = new Constructor;
        }
        return $this->_constructor;
    }

    /**
     * Задает конструктор
     * @param \app\modules\admin\components\content_constructor\IConstructor $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setConstructor(IConstructor $val)
    {
        $this->_constructor = $val;
        return $this;
    }
}

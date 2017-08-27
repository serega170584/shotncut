<?php

namespace app\modules\admin\components\content_constructor;

use app\modules\admin\components\content_constructor\IPart;
use app\modules\admin\components\content_constructor\IConstruction;

abstract class Part implements IPart
{
    /**
     * Возвращает тип контента
     * @return string
     */
    //abstract public static function getType();

    /**
     * Регистрирует ассеты для административной части
     * @param \yii\web\View $view
     * @param string $assets_list
     * @return string
     */
    public static function registerAssets(\yii\web\View $view, $assets_list)
    {
        $asset = __NAMESPACE__ . '\assets';
        $asset .= '\\' . ucfirst(static::getType());
        $asset .= ucfirst(str_replace(['\\', '/', ' '], '_', $assets_list));
        if (class_exists($asset)) $asset::register($view);
    }



    /**
     * Рендерит представление для административной части
     * @param \yii\web\View $view
     * @return string
     */
    public function renderAdmin(\yii\web\View $view)
    {
        $part_view = $this->getAdminView();
        $data = [
            'options' => $this->getOptions(),
            'value' => $this->getValue(),
            'name' => $this->getParent()->getName(),
            'type' => $this->getType(),
            'position' => $this->getPosition(),
        ];
        if ($part_view) {
            return $view->render($part_view, $data);
        } else {
            $jsName = $this->getParent()->getJsName();
            $view->registerJs(
                "if (!window.{$jsName}) window.{$jsName} = [];"
                . " window.{$jsName}.push(" . json_encode($data, JSON_FORCE_OBJECT) . ");",
                $view::POS_HEAD
            );
            return '';
        }
    }

    /**
     * Рендерит представление для публичной части
     * @param \yii\web\View $view
     * @return string
     */
    public function renderPublic(\yii\web\View $view)
    {
        static $count = 1;
        $view_path = $this->getView();
        $parent = $this->getParent();
        $data = [
            'options' => $this->getOptions(),
            'value' => $this->getValue(),
            'count' => $count++
        ];
        return $view_path ? $view->renderFile($view_path, $data) : '';
    }

    /**
     * Задает настройки части
     * @param array $options
     */
    public function config(array $options)
    {
        if (isset($options['value'])) $this->setValue($options['value']);
        if (isset($options['options'])) $this->setOptions($options['options']);
        if (isset($options['parent'])) $this->setParent($options['parent']);
        if (isset($options['view'])) $this->setView($options['view']);
        if (isset($options['adminView'])) $this->setAdminView($options['adminView']);
        if (isset($options['position'])) $this->setPosition($options['position']);
    }



    /**
     * @var mixed
     */
    protected $_value = null;

    /**
     * Возвращает значение
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Задает представление
     * @param mixed $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setValue($val)
    {
        $this->_value = $val;
        return $this;
    }



    /**
     * @var array
     */
    protected $_options = null;

    /**
     * Возвращает настройки
     * @return array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * Задает представление
     * @param array $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setOptions(array $val)
    {
        $this->_options = $val;
        return $this;
    }



    /**
     * @var \app\modules\admin\components\content_constructor\IConstruction
     */
    protected $_parent = null;

    /**
     * Возвращает родителя
     * @return \app\modules\admin\components\content_constructor\IConstruction
     */
    public function getParent()
    {
        return $this->_parent;
    }

    /**
     * Задает родителя
     * @param \app\modules\admin\components\content_constructor\IConstruction $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setParent(IConstruction $val)
    {
        $this->_parent = $val;
        return $this;
    }



    /**
     * @var string
     */
    protected $_view = null;

    /**
     * Возвращает представление
     * @return string
     */
    public function getView()
    {
        $return = $this->_view;
        if ($return === null) {
            $path = __DIR__ . '/views/' . static::getType() . '.php';
            if (file_exists($path)) $return = $path;
        }
        return $return;
    }

    /**
     * Задает представление
     * @param string $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setView($val)
    {
        $this->_view = $val;
        return $this;
    }



    /**
     * @var string
     */
    protected $_adminView = null;

    /**
     * Возвращает представление для административной части
     * @return string
     */
    public function getAdminView()
    {
        return $this->_adminView;
    }

    /**
     * Задает представление для административной части
     * @param string $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setAdminView($val)
    {
        $this->_adminView = $val;
        return $this;
    }


    /**
     * Позиция блока
     * @var int
     */
    protected $_position = null;

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->_position != null ? $this->_position : 0;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->_position = (int) $position;
    }

    public function toString(){

        return '';
    }
}

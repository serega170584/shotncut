<?php

namespace app\modules\admin\components\content_constructor;

use Yii;
use yii\base\Component;

use app\modules\admin\components\content_constructor\IPart;
use app\modules\admin\components\content_constructor\IConstructor;

class Constructor extends Component implements IConstructor
{
    /**
     * @var array
     */
    protected $_partTypes = null;


    /**
     * Регистрирует ассеты для административной части
     * @param \yii\web\View $view
     * @param string $assets_list
     * @return string
     */
    public function registerAssets(\yii\web\View $view, $assets_list = 'admin')
    {
        $types = $this->getPartTypes();
        foreach ($types as $type) {
            $class = $type['class'];
            $class::registerAssets($view, $assets_list);
        }
    }


    /**
     * Создает элемент указанного типа
     * @param array $config
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function createPart(array $config)
    {
        if (empty($config['type'])) {
            throw new \InvalidArgumentException('Type property does not set');
        }
        $arType = $this->getPartType($config['type']);
        if (!$arType) \InvalidArgumentException('Type does not exist');
        $class = $arType['class'];
        $part = new $class;
        $part->config(array_merge($arType['config'], $config));
        return $part;
    }


    /**
     * Возвращает описания всех типов контента для конструктора
     * @return array
     */
    public function getPartTypes()
    {
        if ($this->_partTypes === null) {
            $this->_partTypes = [];
            $builIn = $this->getBuiltInTypes();
            foreach ($builIn as $type) $this->registerPartType($type);
        }
        return $this->_partTypes;
    }

    /**
     * Возвращает список встроенных типов
     * @return array
     */
    protected function getBuiltInTypes()
    {
        $path = '\\app\\modules\\admin\\components\\content_constructor\\parts\\';
        return [
            [
                'type' => 'image',
                'class' => "{$path}Image",
            ],
            [
                'type' => 'editor',
                'class' => "{$path}Editor",
            ],
            /*[
                'type' => 'accordion',
                'class' => "{$path}Accordion",
            ],
            [
                'type' => 'contentSlider',
                'class' => "{$path}ContentSlider",
            ],*/
            [
                'type' => 'gallery',
                'class' => "{$path}Gallery",
            ],
            [
                'type' => 'quote',
                'class' => "{$path}Quote",
            ],
            [
                'type' => 'video',
                'class' => "{$path}Video",
            ],
        ];
    }

    /**
     * Возвращает описание указанного типа конструктора
     * @param string $name
     * @return array
     */
    public function getPartType($name)
    {
        $types = $this->getPartTypes();
        return isset($types[$name]) ? $types[$name] : null;
    }

    /**
     * Добавляет тип контента
     * @param array $type
     */
    public function registerPartType(array $type)
    {
        if (empty($type['type'])) {
            throw new \InvalidArgumentException('Type property does not set');
        }
        if (empty($type['class'])) {
            throw new \InvalidArgumentException('Class property does not set');
        }
        if (!is_subclass_of($type['class'], '\app\modules\admin\components\content_constructor\IPart')) {
            throw new \InvalidArgumentException('Class must implements IPart interface');
        }
        $arPart = [
            'class' => $type['class'],
            'config' => isset($type['config']) && is_array($type['config'])
                ? $type['config']
                : [],
        ];
        $this->_partTypes[$type['type']] = $arPart;
    }
}

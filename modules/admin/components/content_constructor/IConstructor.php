<?php

namespace app\modules\admin\components\content_constructor;

interface IConstructor
{
    /**
     * Регистрирует ассеты для административной части
     * @param \yii\web\View $view
     * @param string $assets_list
     * @return string
     */
    public function registerAssets(\yii\web\View $view, $assets_list = 'admin');


    /**
     * Создает элемент указанного типа
     * @param array $config
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function createPart(array $config);


    /**
     * Возвращает описания всех типов контента для конструктора
     * @return array
     */
    public function getPartTypes();

    /**
     * Возвращает описание указанного типа конструктора
     * @param string $name
     * @return array
     */
    public function getPartType($name);

    /**
     * Добавляет тип контента
     * @param array $type
     */
    public function registerPartType(array $type);
}

<?php

namespace app\modules\admin\components\content_constructor;

interface IPart
{
    /**
     * Возвращает тип контента
     * @return string
     */
    public static function getType();

    /**
     * Регистрирует ассеты для административной части
     * @param \yii\web\View $view
     * @param string $assets_list
     * @return string
     */
    public static function registerAssets(\yii\web\View $view, $assets_list);



    /**
     * Рендерит представление для административной части
     * @param \yii\web\View $view
     * @return string
     */
    public function renderAdmin(\yii\web\View $view);

    /**
     * Рендерит представление для публичной части
     * @param \yii\web\View $view
     * @return string
     */
    public function renderPublic(\yii\web\View $view);

    /**
     * Задает настройки части
     * @param array $options
     */
    public function config(array $options);



    /**
     * Возвращает значение
     * @return mixed
     */
    public function getValue();

    /**
     * Задает представление
     * @param mixed $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setValue($val);



    /**
     * Возвращает настройки
     * @return array
     */
    public function getOptions();

    /**
     * Задает представление
     * @param array $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setOptions(array $val);



    /**
     * Возвращает родителя
     * @return \app\modules\admin\components\content_constructor\IConstruction
     */
    public function getParent();

    /**
     * Задает родителя
     * @param \app\modules\admin\components\content_constructor\IConstruction $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setParent(IConstruction $val);



    /**
     * Возвращает представление
     * @return string
     */
    public function getView();

    /**
     * Задает представление
     * @param string $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setView($val);



    /**
     * Возвращает представление для административной части
     * @return string
     */
    public function getAdminView();

    /**
     * Задает представление для административной части
     * @param string $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setAdminView($val);
}

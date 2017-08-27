<?php

namespace app\modules\admin\components\content_constructor;

interface IConstruction
{
    /**
     * Задает конструктор
     * @param \app\modules\admin\components\content_constructor\IConstructor $constructor
     */
    public function __construct(array $parts, IConstructor $constructor = null);



    /**
     * Отображает все части в админке
     * @param \yii\web\View $view
     * @return string
     */
    public function renderAdmin(\yii\web\View $view);

    /**
     * Отображает все части на сайте
     * @param \yii\web\View $view
     * @return string
     */
    public function renderPublic(\yii\web\View $view);



    /**
     * Возвращает части
     * @return mixed
     */
    public function getParts();

    /**
     * Очищает все части
     */
    public function clearParts();

    /**
     * Задает части
     * @param array $parts
     */
    public function addParts(array $parts);

    /**
     * Добавляет часть
     * @param array $part
     */
    public function addPart(array $part);



    /**
     * Возвращает название
     * @return mixed
     */
    public function getName();

    /**
     * Задает название
     * @param mixed $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setName($val);



    /**
     * Возвращает конструктор
     * @return \app\modules\admin\components\content_constructor\IConstructor
     */
    public function getConstructor();

    /**
     * Задает конструктор
     * @param \app\modules\admin\components\content_constructor\IConstructor $val
     * @return \app\modules\admin\components\content_constructor\IPart
     */
    public function setConstructor(IConstructor $val);
}

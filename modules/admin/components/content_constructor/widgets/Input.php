<?php

namespace app\modules\admin\components\content_constructor\widgets;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;

use app\modules\admin\components\content_constructor\Construction;
use app\modules\admin\components\content_constructor\Constructor;


class Input extends InputWidget
{
    /**
     * @var \app\modules\admin\components\content_constructor\IConstructor
     */
    public $constructor = null;
    /**
     * @var \app\modules\admin\components\content_constructor\IConstruction
     */
    public $construction = null;


    /**
     * @inheritdoc
     */
    public function run()
    {
        $construction = $this->construction ? $this->construction : new Construction;
        $constructor = $this->constructor ? $this->constructor : new Constructor;
        $constructor->registerAssets($this->getView(), 'admin');

        $attribute = $this->attribute;
        $parts = $this->model->$attribute;
        $parts = is_array($parts) ? $parts : [];

        $construction->setConstructor($constructor)->setName(Html::getInputName($this->model, $this->attribute))->addParts($parts);
        $this->registerAssets($construction);
        echo Html::tag('h2', $this->model->getAttributeLabel($this->attribute));
        echo Html::tag(
            'div',
            $construction->renderAdmin($this->getView()),
            ['id' => $this->id]
        );
    }

    protected function registerAssets($construction)
    {
        $view = $this->getView();
        $jsName = $construction->getJsName();
        $options['name'] = $construction->getName();
        $view->registerJs(
            "$('#{$this->id}').content_constructor(" . json_encode($options, JSON_FORCE_OBJECT) . ")"
            . ".content_constructor('set_controls', window.{$jsName} || []);",
            $view::POS_READY
        );
    }
}

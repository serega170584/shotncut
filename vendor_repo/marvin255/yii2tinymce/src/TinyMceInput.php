<?php

namespace marvin255\yii2tinymce;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\helpers\ArrayHelper;


class TinyMceInput extends InputWidget
{
    /**
     * @var array
     */
    public $mce_options = [];
    /**
     * @var string
     */
    public $options_bag = null;


    /**
     * @inheritdoc
     */
    public function run()
    {
        $return = '';
        if ($this->hasModel()) {
            $return = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $return = Html::textarea($this->name, $this->value, $this->options);
        }
        echo '<div>' . $return . '</div>';
        $this->registerClientScript();
    }


    protected function registerClientScript()
    {
        $view = $this->getView();
        $name = 'TinyMceInput';

        $options = self::createOptions($this->mce_options, $this->options_bag);
        self::setInitiator($name, $view, $options);

        $js = "window.{$name}('#{$this->options['id']}');";
        $view->registerJs($js, $view::POS_END);
    }


    public static function setInitiator($name, \yii\web\View $view, $options)
    {
        if (empty($options['language'])) {
            $langAr = explode('-', Yii::$app->language);
            $options['language'] = $langAr[0];
        }
        $langAssetBundle = TinyMceLangAsset::register($view);
        $langAssetBundle->js[] = "{$options['language']}.js";
        $options['language_url'] = "{$langAssetBundle->baseUrl}/{$options['language']}.js";
        $js = 'window.' . $name . ' = function (selector) { $(selector).tinymce(' . Json::encode($options) . '); };';
        $view->registerJs($js, $view::POS_END, $name);
    }


    protected static function createOptions($options, $options_bags)
    {
        $return = [];
        $bags = is_array($options_bags) ? $options_bags : [$options_bags];
        foreach ($bags as $bag) {
            $path = strpos($bag, '@') !== false
                ? Yii::getAlias($bag)
                : __DIR__ . '/../options/' . str_replace(['\\', '/', '.'], '_', $bag) . '.php';
            if (file_exists($path)) {
                $res = include($path);
                if (is_array($res)) $return = array_merge_recursive($return, $res);
            }
        }
        if (is_array($options)) $return = array_merge_recursive($return, $options);
        return $return;
    }
}

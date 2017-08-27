<?php


namespace app\components\widgets;



use yii\base\Widget;

class ProductInlineMenu extends Widget
{
    public function run()
    {
        return $this->render('productInlineMenu');
    }
}
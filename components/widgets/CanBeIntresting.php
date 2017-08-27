<?php


namespace app\components\widgets;


use yii\base\Widget;

class CanBeIntresting extends Widget
{

    public function run()
    {
        return $this->render('canBeIntresting', []);
    }
}
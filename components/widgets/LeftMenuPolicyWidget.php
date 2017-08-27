<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 23.06.16
 * Time: 12:12
 */

namespace app\components\widgets;


use yii\base\Widget;

class LeftMenuPolicyWidget extends Widget {

    public $items;

    public function run(){
        if($this->items)
            return $this->render('menuPolicy', ['items' => $this->items]);

        return '';
    }
} 
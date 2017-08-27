<?php

namespace app\modules\admin\components\menu;

use Yii;
use yii\base\Behavior;
use yii\base\Controller;

class MenuBehavior extends Behavior
{
    /**
     * @var array
     */
    public $allowed = null;


    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    public function beforeAction($event)
    {
        $menus = $this->owner->module->menu->getMenus();
        foreach ($menus as $name => $links) {
            if (is_array($this->allowed) && !in_array($name, $this->allowed)) continue;
            $this->owner->view->params[$name] = $links;
        }
    }
}

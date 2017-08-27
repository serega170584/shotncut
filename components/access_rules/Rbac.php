<?php

namespace app\components\access_rules;

use yii\filters\AccessRule;

/**
 * Правило для проверки доступа к экшэну
 */
class Rbac extends AccessRule
{
    /**
     * @inheritdoc
     */
    public function allows($action, $user, $request)
    {
        $return = parent::allows($action, $user, $request);

        if ($return === true) {
            //получаем координаты текущего экшэна
            $actionId = $action->id;
            $controllerId = $action->controller->id;
            $moduleId = $action->controller->module !== null ? $action->controller->module->id : null;
            //получаем все права, которые нужно проверить для данного экшэна
            $toTest = ['_-_-_'];
            if ($moduleId) {
                $toTest[] = "{$moduleId}-_-_";
                $toTest[] = "{$moduleId}-{$controllerId}-_";
                $toTest[] = "{$moduleId}-{$controllerId}-{$actionId}";
            } else {
                $toTest[] = "{$controllerId}-_";
                $toTest[] = "{$controllerId}-{$actionId}";
            }

            //проверяем все права
            $passed = false;
            foreach ($toTest as $rule) {
                if (!\Yii::$app->user->can($rule)) continue;
                $passed = true;
                break;
            }
            return $passed;
        } else {
            return $return;
        }
    }
}
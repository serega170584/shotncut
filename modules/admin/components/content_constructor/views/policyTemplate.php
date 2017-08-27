<?php
/**
 * @var \yii\web\View $this
 */
if (isset($value['template']) && $value['template'] && isset($value['owner']) && $value['owner'] instanceof \app\models\node\Policy) {
    echo $this->render('//policy/templates/'.$value['template'], ['owner' => $value['owner']]);
}

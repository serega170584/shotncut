<?php

if(Yii::$app->session->allFlashes && !in_array(Yii::$app->controller->module->id, ['user', 'rbac'])){
    $flashes = Yii::$app->session->allFlashes;

    foreach($flashes as $key => $messages){
        $all = [];
        if(!is_array($messages)) $all = [$messages];
        else $all = $messages;

        foreach($all as $msg){
            echo \yii\bootstrap\Alert::widget([
                'options' => [
                    'class' => 'alert-'.$key
                ],
                'body' => $msg
            ]);
        }
    }
}
?>
<?php

use yii\helpers\Html;

$this->title = $name;

?>
<div class="site-error">
    <div class="alert alert-danger">
        <?php echo nl2br(Html::encode($message)) ?>
    </div>
</div>

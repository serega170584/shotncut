<script src="js/pages/products.js"></script>
<script src="js/question-popup.js"></script>

<?php
/** @var \app\models\node\Policy $model */
$html = $model->renderArticle($this);

echo $html;

?>

<div class="js-top-result-fix-stop"></div>

<?php echo \app\components\widgets\CanBeIntresting::widget([]); ?>

<?= $this->render('//policy/question-popup') ?>

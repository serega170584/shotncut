<?php
/** @var \app\models\forms\RequestForm $form */
use yii\helpers\Html;

?>
<h3><?php echo Html::encode($form->subject); ?></h3>

<?php if($form->name): ?><strong>ФИО: </strong> <?php echo Html::encode($form->name); ?><br/><br/><?php endif; ?>
<?php if($form->phone): ?><strong>Телефон: </strong> <?php echo Html::encode($form->phone); ?><br/><br/><?php endif; ?>
<?php if($form->email): ?><strong>Email: </strong> <?php echo Html::encode($form->email); ?><br/><br/><?php endif; ?>
<?php if($form->message): ?><strong>Сообщение: </strong> <?php echo Html::encode($form->message); ?><br/><br/><?php endif; ?>
<?php if($form->policy): ?><strong>Полис: </strong> <?php echo Html::encode($form->policy); ?><br/><br/><?php endif; ?>
Страница, с которой отправлена заявка <?php echo Html::a(Html::encode($form->url), Html::encode($form->url)); ?>
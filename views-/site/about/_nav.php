<?php
use yii\helpers\Url;
use app\models\node\Node;

$comp_cr = Yii::$app->request->get('company', 0);

$company = Node::getCompany();
?>

<navbar class="navbar navbar_sub js__about_navbar_sub">
    <ul class="navbar__list">
        <?php
        foreach($company as $company_nm => $company_name) {
            ?>
            <li class="navbar__item">
                <a href="<?=Url::toRoute([Yii::$app->controller->action->id, 'company' => $company_nm])?>" class="link navbar__link <?=
                ($company_nm==$comp_cr)?'navbar__link_active':''?>"><?=$company_name?></a>
            </li>
            <?php
        }
        ?>
    </ul>
    <div class="block__inner_clearfix"></div>
</navbar>
<div class="block__inner_clearfix"></div>

<navbar class="navbar">
    <ul class="navbar__list">
        <li class="navbar__item">
            <a href="<?=Url::toRoute('about')?>?company=<?=$comp_cr?>" class="link navbar__link
            <?=Yii::$app->controller->action->id=='about'?' navbar__link_active':''?>">О нас</a>
        </li>
        <li class="navbar__item">
            <a href="<?=Url::toRoute('about-team')?>?company=<?=$comp_cr?>" class="link navbar__link
            <?=Yii::$app->controller->action->id=='about-team'?' navbar__link_active':''?>">Команда</a>
        </li>

        <?php if (1) { ?>
            <li class="navbar__item">
                <a href="<?=Url::toRoute('about-disclosure')?>?company=<?=$comp_cr?>" class="link navbar__link
                <?=Yii::$app->controller->action->id=='about-disclosure'?' navbar__link_active':''?>">Раскрытие информации</a>
            </li>
            <?php
        } ?>

        <li class="navbar__item">
            <a href="<?=Url::toRoute('about-registry')?>?company=<?=$comp_cr?>" class="link navbar__link
            <?=Yii::$app->controller->action->id=='about-registry'?' navbar__link_active':''?>">Реестр страховых агентов</a>
        </li>

        <li class="navbar__item">
            <a href="<?=Url::toRoute('about-career')?>?company=<?=$comp_cr?>" class="link navbar__link
            <?=Yii::$app->controller->action->id=='about-career'?' navbar__link_active':''?>">Вакансии</a>
        </li>

        <li class="navbar__item">
            <a href="<?=Url::toRoute('about-contact')?>?company=<?=$comp_cr?>" class="link navbar__link
            <?=Yii::$app->controller->action->id=='about-contact'?' navbar__link_active':''?>">Контакты</a>
        </li>
    </ul>
</navbar>

<div class="block__inner_clearfix"></div>
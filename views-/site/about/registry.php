<?php
$comp_cr = Yii::$app->request->get('company', 0);
?>

<div class="si-layout__body si-layout__about">
    <div class="block">
        <div class="block__inner">
            <div class="page-title">
                <div class="page-title__title"><span>О компании</span></div>
            </div>

            <?php echo $this->render('_nav'); ?>

            <?php if (count($models)) { ?>
                <table class="registry">

                    <tr class="registry__header">
                        <th class="registry__cell registry__cell_title">Название</th>
                        <th class="registry__cell registry__cell_number">Номер договора</th>
                        <th class="registry__cell registry__cell_status">Статус</th>
                    </tr>

                    <?php
                    foreach($models as $item) {?>
                        <tr class="registry__row">
                            <td class="registry__cell"><?=$item->title?></td>
                            <td class="registry__cell"><?=$item->preview_text?></td>
                            <td class="registry__cell"><?=$item->detail_text?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            } ?>

        </div>
    </div>
</div>

<?php if (isset($value) && is_array($value) && !empty($value['lines'])): ?>
<section id="questions" class="js-nav-block b-product-section">
  <div class="b-wrapper">
    <div class="b-product-section__wrapper">
      <h2><?= empty($value['header']) ? 'Вопрос-ответ' : \yii\helpers\Html::encode($value['header']) ?></h2>
      <div class="b-text__wrapper">
        <ul class="b-accordion b-accordion__questions">
          <?php foreach($value['lines'] as $line): ?>
          <li class="js-accordion-item b-accordion__item">
            <a href="#" class="js-accordion-link b-accordion__link">
              <?= \yii\helpers\Html::encode($line['header']) ?>
            </a>
            <div class="js-accordion-text b-accordion__text">
                <?= \app\components\SbrHtmlPurifier::process($line['text']) ?>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

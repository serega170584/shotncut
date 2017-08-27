<?php if(isset($value) && is_array($value) && !empty($value['files'])): ?>
  <section id="documents" class="js-nav-block b-product-section b-product-section__pb">
    <div class="b-wrapper">
      <div class="b-product-section__wrapper">
        <h3>Документы</h3>
        <div class="b-text__wrapper">
          <ul class="u-clear-fix b-docs__list">
              <?php foreach($value['files'] as $file):  if(!$file['title']) continue; ?>
                <li>
                  <a target="_blank" href="<?= \yii\helpers\Html::encode($file['url']) ?>"
                     class="si-good-doc"><?= \yii\helpers\Html::encode($file['title']) ?></a>
                </li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

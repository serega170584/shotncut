<?php
$this->params['breadcrumbs'] = [
    [
        'label' => 'Авторы'
    ]
];

?>
<div class="si-layout__body si-layout__body_accentuated">
  <div ng-controller="siEditorsList as vm" class="si-container">
    <?php echo $this->render('/layouts/_breadcrumbs'); ?>
    <div class="si-spacer si-spacer_s_m">
      <div class="si-h si-h_type_2">Твоя команда поддержки</div>
    </div>
    <div class="si-spacer si-spacer_s_m si-visible-xs">
      <div class="si-select">
        <select ng-model="vm.data.selectedCategory" ng-change="vm.filter(vm.data.selectedCategory)" ng-options="category.name for category in vm.categories track by category.id"></select>
      </div>
    </div>
    <div class="si-spacer si-spacer_s_m si-hidden-xs">
      <div class="si-tag-buttons-group">
        <div ng-repeat="category in vm.categories" class="si-tag-buttons-group__item"><a ng-class="{'si-tag-button_active': category === vm.data.selectedCategory}" ng-click="vm.selectCategory(category)" href="#" class="si-tag-button si-tag-button_theme_c si-tag-button si-tag-button_type_{{category.code}}"><span class="si-tag-button__icon"></span><span ng-bind="category.name" class="si-tag-button__text"></span></a>
        </div>
      </div>
    </div>
    <div class="si-spacer si-spacer_s_m">
      <div isotope-container class="si-isotope si-isotope__container">
        <div ng-repeat="author in vm.authors" isotope-item data-category="{{author.category.code}}" class="si-isotope__item si-isotope__item_s_{{($index + 1) % 3 &gt; 0 ? 's' : 'm'}}"><a href="{{author.url}}" class="si-editorcard">
            <div class="si-editorcard__overlay"></div>
            <div ng-style="{'background-image':'url('+ author.cover_image_url +')'}" class="si-editorcard__image"></div>
            <div class="si-editorcard__content">
              <div class="si-editorcard__type"><img ng-src="/assets/images/category_{{author.category.code}}.png" alt="" ng-srcset="/assets/images/category_{{author.category.code}}_2x.png 2x"></div>
              <div class="si-editorcard__name"><span ng-bind="author.name.split(' ')[0]"></span><br><span ng-bind="author.name.split(' ')[1]"></span></div>
              <div ng-bind="author.status" class="si-editorcard__quote"></div>
            </div></a></div>
      </div>
    </div>
    <div ng-hide="vm.page == vm.pages" class="si-spacer si-spacer_s_m">
      <div class="si-layout-section si-layout-section_a_c"><a href="#" ng-click="vm.getAuthors()" class="sb-button sb-button_s_m sb-button_theme_a"><span class="sb-button__text">Загрузить еще</span></a></div>
    </div>
  </div>
</div>

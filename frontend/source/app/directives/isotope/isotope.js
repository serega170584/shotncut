var ISOTOPE = require('isotope-layout')
var _ = require('underscore')

module.exports = function () {
  var directive = {
    scope: {},
    controller: ['$http', controller],
    bindToController: true,
    controllerAs: 'isotope',
    replace: true,
    transclude: true,
    template: `<div class="si-isotope">
      <div class="si-layout-section si-layout-section_s_s">
        <div class="si-panel si-panel_s_s">
          <div class="r r_s_s">
            <div class="r__c">
              <a href="" class="si-tag-button" ng-click="isotope.selectType(undefined)" ng-class="{'si-tag-button_active': isotope.type == undefined}">
                <span class="si-tag-button__text">Все материалы</span>
              </a>
            </div>
            <div class="r__c r__c_r">
              <div class="r r_s_s">
                <div class="r__c" ng-repeat="type in isotope.types track by type.id">
                  <a href="#" id="{{type.id}}" class="si-tag-button" ng-click="isotope.selectType(type)" ng-class="{'si-tag-button_active': type.id == isotope.current_type.id}">
                    <span class="si-tag-button__text" ng-bind="type.name"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="si-layout-section si-layout-section_s_s" ng-show="isotope.category.categories.length > 0">
        <div class="r">
          <div class="r__c">
          <a href="#" class="si-tag-button" ng-click="isotope.selectSubcategory(undefined)" ng-class="{'si-tag-button_active': isotope.subCategory == undefined}">
            <span class="si-tag-button__text">Все</span>
          </a>
          </div>
          <div class="r__c" ng-repeat="category in isotope.category.categories track by $index">
            <a href="#" id="{{category.id}}" class="si-tag-button" ng-click="isotope.selectSubcategory(category)" ng-class="{'si-tag-button_active': category == isotope.subCategory}">
              <span class="si-tag-button__text" ng-bind="category.name"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="si-layout-section si-layout-section_s_s">
        <div class="si-isotope__container" ng-transclude></div>
      </div>
    </div>`
  };

  function controller($http) {

    //var is = new ISOTOPE('.si-isotope__container', {})
        var self = this
      self.types = []
      self.nodes = [
          {id: 1},
          {id: 2},
          {id: 3},
          {id: 4},
      ]

      self.current_type = 0

      console.log(self)

      self.getTypes = function(){
          $http.get('/api/node-types').then(function(response){
              self.types = response.data
          })
      }

      self.selectType = function(type){
          if(self.current_type.id != type.id){
              self.current_type = type
          }
      }

      self.getTypes()

    /*this.categories = [{
      id: '5707009b-1d7a-483f-8e5c-f653dec71d7a',
      name: 'Продукты',
      categories: [{id: '11c90278-e5b2-4f6d-973a-34f703cd5129', name: '1'},{id: '1cdfe35e-6d48-46f2-af09-79d148aeb2e3', name: '2'},{id: 'b534b949-7ae8-45da-8d45-c5e160b77490', name: '3'},{id: '9fb1d7af-7dee-4a75-a371-c2c0ba0f5b33', name: '4'}]
    }, {
      id: '4f93a948-f95a-45e4-8c40-adc3f48ea9c5',
      name: 'Спец. предложения'
    }, {
      id: '3b1797f6-dbbe-4e9f-a03b-58715c8b2ad3',
      name: 'Истории'
    }, {
      id: 'ce005154-2672-4e37-81e3-da8b0833682b',
      name: 'Новости'
    }]

    this.select = category => {
      this.category = category
      this.subCategory = undefined
    }

    this.selectSubcategory = category => {
      this.subCategory = category
    }*/
  }

  return directive;
}

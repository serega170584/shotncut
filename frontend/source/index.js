window.$ = window.jQuery = require('jquery');
global.angular = require('angular');
global.moment = require('moment');
require('moment/locale/ru.js');

var jBridget = require('jquery-bridget')

jBridget('isotope', require('isotope-layout'), $)

require('./assets/stylesheets/desktop/_milestone.js')
require('./assets/stylesheets/good/_section.js')

require('./app/vendor/angular-isotope.min.js')

// set locale file for angular
require('angular-i18n/angular-locale_ru-ru.js');

angular.module('si', [
  require('angular-route'),
  require('angular-resource'),
  require('angular-sanitize'),
  require('ng-dialog'),
  require('./app/good/index.js'),
  require('./app/article/index.js'),
  require('./app/directives/index.js'),
  require('./app/editor/index.js'),
  require('./app/search/index.js'),
  require('./app/main/index.js'),
  require('./app/api/index.js'),
  require('./app/filters/index.js'),
  'iso'
])

angular.element(document).ready(function() {
  moment.locale('ru')
  angular.bootstrap(document, ['si'])
})

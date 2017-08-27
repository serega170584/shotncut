angular
  .module('si.directives', [])
  .directive('siMenuClose', require('./siMenuClose.js'))
  .directive('siMenuToggle', require('./siMenuToggle.js'))
  .directive('siMenuNavigation', require('./siMenuNavigation.js'))
  .directive('siMenuNavigationPane', require('./siMenuNavigationPane.js'))
  .directive('siMenuNavigationToggle', require('./siMenuNavigationToggle.js'))
  .directive('siMenuTabToggle', require('./siMenuTabToggle.js'))
  .directive('siSearchToggle', require('./siSearchToggle.js'))
  .directive('siSelect', require('./siSelect.js'))
  .directive('siSelectAjax', require('./siSelectAjax.js'))
  .directive('siLayout', require('./siLayout.js'))
module.exports = 'si.directives'

var Isotope = require('isotope-layout')
require('isotope-cells-by-row')

module.exports = function () {
  var directive = {
    transclude: true,
    scope: {
      isotope: '=',
      ngModel: '='
    },
    link: link,
    replace: true,
    template: `
      <div class="si-isotope si-isotope__container" ng-transclude></div>
    `
  };

  function link(scope, element, attributes) {
    window.isotope = scope.isotope = new Isotope('.si-isotope', {
      layoutMode: 'masonry'
    })

    scope.$watch(scope.ngModel, function () {
      scope.isotope.reloadItems()
      scope.isotope.arrange()
    })
  }

  return directive;
}

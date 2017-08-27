
module.exports = function () {
  var directive = {
    require: '^siIsotope',
    transclude: true,
    scope: {
      categories: '@',
      item: '@'
    },
    link: link,
    replace: true,
    template: `<div class="isotope__item" ng-transclude></div>`
  };

  function link(scope, element, attributes, controller) {
      console.log(arguments);
  }

  return directive;
}

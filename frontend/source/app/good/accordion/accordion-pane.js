module.exports = function () {
  var directive = {
    require: '^siGoodAccordion',
    transclude: true,
    scope: {},
    link: link,
    replace: true,
    templateUrl: 'siGoodAccordionPaneTemplate',
  };

  function link(scope, element, attributes, accordion) {
    scope.active = accordion.tabs.length == 0
    accordion.add(scope)

    $('.si-good-accordion__head', element).bind('click', function (e) {
      e.preventDefault()
      scope.$apply(function () {
        accordion.select(scope)
      })
    })
  }

  return directive;
}

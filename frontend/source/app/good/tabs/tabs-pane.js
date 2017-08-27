module.exports = function () {
  var directive = {
    require: '^siGoodTabs',
    scope: {
      title: '@'
    },
    transclude: true,
    link: link,
    replace: true,
    templateUrl: 'siGoodTabsPaneTemplate',
  };

  function link(scope, element, attributes, tabset) {
    scope.active = tabset.tabs.length == 0
    tabset.add(scope)
  }

  return directive;
}

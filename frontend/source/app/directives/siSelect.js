require('select2');

module.exports = function () {
  var directive = {
    link: link,
    restrict: 'C',
    scope: {
      placeholder: '@',
      tags: '@',
      theme: '@',
    }
  };

  function link(scope, element, attributes) {
    scope.theme = scope.theme || 'default'
    scope.tags = scope.tags || false

    $(element).find('select').select2({
      tags: scope.tags,
      theme: scope.theme,
      placeholder: scope.placeholder,
      minimumResultsForSearch: Infinity,
    })
  }

  return directive;
}

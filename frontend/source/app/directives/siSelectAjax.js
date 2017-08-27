require('select2');

module.exports = function () {
  var directive = {
    link: link,
    restrict: 'C',
    scope: {
      placeholder: '@',
      tags: '@',
      theme: '@',
        url: '@'
    }
  };

  function link(scope, element, attributes) {
    scope.theme = scope.theme || 'default'
    scope.tags = scope.tags || false

    $(element).find('select').select2({
      tags: scope.tags,
      theme: scope.theme,
      placeholder: scope.placeholder,
      ajax: {
          url: scope.url,
          dataType: 'json',
          type: 'GET',
          delay: 500,
          data: function(params) {
              return {
                  q: params.term
              }
          },
          processResults: function (data, params) {
              return {
                  results: data
              };
          }
      }
    })
  }

  return directive;
}

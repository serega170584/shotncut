module.exports = function () {
  var directive = {
    scope: {
      node: '=data'
    },
    link: link,
    controller: controller,
    template: `
      <ng-include src="getTemplateUrl()" />
    `,
    replace: true
  };

  function link(scope, element, attributes) {

  }

  function controller($scope) {
    console.log($scope)
    $scope.getTemplateUrl = function () {
      switch ($scope.node.type.code) {
        case 'policy':
          return '/templates/node.policy.tpl.html'
          break;
        case 'article':
          return '/templates/node.article.tpl.html'
          break;
        default:
          return '/templates/node.default.tpl.html'
      }
    }
  }

  controller.$inject = ['$scope']

  return directive;
}

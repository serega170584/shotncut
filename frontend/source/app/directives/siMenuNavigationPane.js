module.exports = function () {
  var directive = {
    require: '^siMenuNavigation',
    link: link,
    scope: true
  };

  function link(scope, element, attributes, controller) {
    scope.level = attributes.level
    scope.active = attributes.level == 0
    controller.add(scope)
    scope.$watch('active', function (n) {
      $(`.si-menu-navigation__item[data-toggle='#${attributes.id}']`).toggleClass('si-menu-navigation__item_active', n)
    })
  }

  return directive;
}

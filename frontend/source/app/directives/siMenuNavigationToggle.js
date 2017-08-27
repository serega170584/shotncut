module.exports = function () {
  var directive = {
    require: '^siMenuNavigation',
    link: link,
  };

  function link(scope, element, attributes, controller) {
    $(element).bind('mouseenter', function () {
      controller.toggle(scope.level)
      if (attributes.toggle) {
        $(attributes.toggle).scope().$apply(function () {
          $(attributes.toggle).scope().active = true
        })
      }
    })
  }

  return directive;
}

module.exports = function () {
  var directive = {
    link: link,
    scope: {
      toggle: '='
    }
  };

  function link(scope, element, attributes) {
    $(element).bind('click', function (e) {
      e.preventDefault()
      TweenMax.to('.si-b-search', .5, {
        opacity: scope.toggle ? 1 : 0,
        y: scope.toggle ? 80 : 0,
        ease: Power4.easeOut
      })

      scope.toggle && $('.si-b-search').find('input').focus()
    })
  }

  return directive;
}

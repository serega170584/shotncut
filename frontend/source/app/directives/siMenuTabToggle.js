require('gsap');

module.exports = function () {
  var directive = {
    link: link,
    scope: {
      show: '@',
      hide: '@'
    }
  };

  function link(scope, element, attributes) {
    $(element).bind('click', function (e) {
      e.preventDefault()
      $(`${scope.hide}`).hide()
      $(`${scope.show}`).show()

      TweenMax.to('.si-layout', .75, {
        y: $('.si-menu').outerHeight(),
        ease: Power4.easeOut
      })
      TweenMax.to('.si-layout__backdrop', .75, {
        opacity: 1,
        display: 'block',
        ease: Power4.easeOut
      })
    })
  }

  return directive;
}

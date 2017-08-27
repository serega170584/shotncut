require('gsap');

module.exports = function () {
  var directive = {
    link: link,
    scope: {
      href: '@'
    }
  };

  function link(scope, element, attributes) {
    $(element).bind('click', function (e) {
      e.preventDefault()

      $(`${scope.href}`).siblings().removeClass('si-menu__pane_active')
      $(`${scope.href}`).addClass('si-menu__pane_active')

      TweenMax.fromTo('.si-menu__close', .75, {
        x: 48,
      }, {
        x: 0,
        ease: Power4.easeOut
      }, .5)

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

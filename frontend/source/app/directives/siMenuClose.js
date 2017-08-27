require('gsap');

module.exports = function () {
  var directive = {
    link: link,
  };

  function link(scope, element, attributes) {
    $(element).bind('click', function (e) {
      e.preventDefault()

      TweenMax.to('.si-layout', .75, {
        y: 0,
        ease: Power4.easeOut
      })

      TweenMax.to('.si-layout__backdrop', .75, {
        opacity: 0,
        display: 'none',
        ease: Power4.easeOut
      })
    })
  }

  return directive;
}

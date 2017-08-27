require('gsap');

module.exports = function () {
  var directive = {
    require: '^siGoodSlider',
    scope: {
      name: '@'
    },
    transclude: true,
    link: link,
    replace: true,
    templateUrl: 'siGoodSliderSlideTemplate',
  };

  function link(scope, element, attributes, slider) {
    scope.active = slider.slides.length == 0
    slider.add(scope)

    scope.$watch('active', (n, o) => {
      if (n == o) {
        n == false && TweenMax.set($(element), {
          opacity: 0
        })
      } else {
        if (n == true) {
          TweenMax.to($(element), .5, {
            opacity: 1,
            ease: Power4.easeOut
          })
        } else {
          TweenMax.to($(element), .5, {
            opacity: 0,
            ease: Power4.easeIn
          })
        }
      }
    })
  }

  return directive;
}

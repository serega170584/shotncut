require('gsap');
require('gsap/src/uncompressed/plugins/ScrollToPlugin.js');
require('magnific-popup');

$('.si-good-section__anchor').bind('click', function (e) {
  e.preventDefault()
  let section = $(this).closest('.si-good-section').next()

  TweenMax.to('.si-layout__container', .75, {
    scrollTo: {
      y: $(section).position().top
    },
    ease: Power4.easeOut
  })
})

$('.si-good-section-video__action').magnificPopup({
  type: 'ajax'
})

$(window).on('scroll', function () {
  let opacity = $('.si-layout__container').scrollTop() / $('.si-layout__container').height()
  if (opacity >= 0 && opacity <= 1) {
    TweenMax.set($('.si-good-section-hero__overlay'), {
      opacity
    })
  }
})

require('gsap');
require('gsap/src/uncompressed/plugins/ScrollToPlugin.js');
require('waypoints/lib/jquery.waypoints.js');

const context = $('.sb-good-anchor')
var WIDTH

TweenMax.set($('.sb-good-anchor .si-link__text'), {
  opacity: 0
})

window.onload = function () {
  WIDTH = context.innerWidth()

  TweenMax.set(context, {
    width: 56,
    display: 'block',
  })

  TweenMax.to(context, 1, {
    opacity: 1,
    x: 32,
    ease: Power4.easeOut
  })
}

TweenMax.fromTo($('.sb-good-anchor__instance', context), 1.25, {
  x: 40,
  opacity: 0
}, {
  x: 0,
  opacity: 1,
  ease: Power4.easeOut
})

context.bind('mouseenter', function () {
  TweenMax.to(context, .5, {
    width: WIDTH,
    ease: Power4.easeOut
  })
  TweenMax.to($('.si-link__text', context), .4, {
    opacity: 1,
    ease: Power4.easeOut
  })
})

context.bind('mouseleave', function () {
  TweenMax.to(context, .5, {
    width: 56,
    ease: Power4.easeOut
  })
  TweenMax.to($('.si-link__text', context), .4, {
    opacity: 0,
    ease: Power4.easeOut
  })
})

$('.si-link', context).bind('click', function (e) {
  e.preventDefault()
  let section = $(this).attr('href')
  TweenMax.to($('.si-layout__container'), .75, {
    scrollTo: {
      y: $(section).position().top - 80
    },
    ease: Power4.easeOut
  })
})

function activateAnchor(id) {
  if (id != undefined) {
    $('.si-link', context).toggleClass('sb-link_active', false)
    $(`.si-link[href='#${id}']`, context).toggleClass('sb-link_active', true)
  }
}

$('.si-good-section').waypoint(function (direction) {
  if (direction == 'down') {
    activateAnchor(this.adapter.$element.attr('id'))
  }
}, {
  offset: 80,
  context: '.si-layout__container'
})

$('.si-good-section').waypoint(function (direction) {
  if (direction == 'up') {
    activateAnchor(this.adapter.$element.attr('id'))
  }
}, {
  offset: function () {
    return -this.adapter.$element.height()
  },
  context: '.si-layout__container'
})

module.exports = function () {
  var directive = {
    link: link,
    restrict: 'C'
  };

  function link(scope, element, attributes) {
    $('.si-layout__container').bind('scroll', function (e) {
      $('.si-layout').not('.si-disabled-scroll').toggleClass('si-layout_scrolled', e.target.scrollTop > 0)
    })
  }

  return directive;
}

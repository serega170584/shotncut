var _ = require('slick-carousel');

module.exports = function () {
  var directive = {
    scope: {},
    restrict: 'C',
    transclude: true,
    link: link,
    replace: true,
    template: `
      <div>
        <div class="si-article-slider__controls">
          <div class="r r_s_s r_a_c">
            <div class="r__c">
              <a class="si-article-slider__arrow si-article-slider__arrow_prev" href="#"></a>
            </div>
            <div class="r__c">
              <div class="si-article-slider__pos">
                <span ng-bind="data.currentSlide"></span>
                <span class="si-article-slider__pos-d">/</span>
                <span ng-bind="slideCount"></span>
              </div>
            </div>
            <div class="r__c">
              <a class="si-article-slider__arrow si-article-slider__arrow_next" href="#"></a>
            </div>
          </div>
        </div>
        <div class="si-article-slider__carousel" ng-transclude></div>
      </div>
    `,
  };

  function link(scope, element, attributes) {
    scope.data = {}
    scope.data.currentSlide = 1

    $('.si-article-slider__carousel', element)
      .on('init', function (e, slick) {
        scope.slideCount = slick.slideCount
      })
      .on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        scope.$apply(function () {
          scope.data.currentSlide = nextSlide + 1
        })
        console.log(nextSlide)
      })
      .slick({
        prevArrow: $('.si-article-slider__arrow_prev', element),
        nextArrow: $('.si-article-slider__arrow_next', element),
      })
  }

  return directive;
}

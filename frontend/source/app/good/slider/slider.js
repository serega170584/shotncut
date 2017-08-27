var _ = require('underscore')

module.exports = function () {
  var directive = {
    scope: {},
    transclude: true,
    controller: controller,
    bindToController: true,
    controllerAs: 'slider',
    replace: true,
    templateUrl: 'siGoodSliderTemplate',
  };

  function controller() {
    this.slides = []

    this.select = (selected) => {
      _.each(this.slides,  slide => {
        slide.active && (slide.active = false)
      })
      selected.active = true
    }

    this.add = (slide) =>
      this.slides.push(slide)
  }

  return directive;
}

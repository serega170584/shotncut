var _ = require('underscore');

module.exports = function () {
  var directive = {
    scope: {},
    transclude: true,
    controller: controller,
    bindToController: true,
    controllerAs: 'accordion',
    replace: true,
    templateUrl: 'siGoodAccordionTemplate',
  };

  function controller() {
    this.tabs = []

    this.add = (tab) =>
      this.tabs.push(tab)

    this.select = (selected) => {
      _.each(this.tabs, tab => {
        tab.active && (tab.active = false)
      })
      selected.active = true
    }
  }

  return directive;
}

var _ = require('underscore')

module.exports = function () {
  var directive = {
    scope: {},
    transclude: true,
    controller: controller,
    bindToController: true,
    controllerAs: 'tabs',
    replace: true,
    templateUrl: 'siGoodTabsTemplate',
  };

  function controller() {
    this.tabs = []

    this.select = (selected) => {
      _.each(this.tabs,  tab => {
        tab.active && (tab.active = false)
      })
      selected.active = true
    }

    this.add = (tab) =>
      this.tabs.push(tab)
  }

  return directive;
}

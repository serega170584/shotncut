var _ = require('underscore');

module.exports = function () {
  var directive = {
    scope: {},
    controller: controller,
    bindToController: true,
    controllerAs: 'navigation',
  };

  function controller() {
    this.panes = []

    this.toggle = (level) => {
      _.each(this.panes, pane => {
        if (pane.level > level) {
          pane.$apply(function () {
            pane.active = false
          })
        }
      })
    }

    this.add = scope => {
      this.panes.push(scope)
    }
  }

  return directive;
}

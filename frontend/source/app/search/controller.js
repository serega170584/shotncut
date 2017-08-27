var _ = require('underscore')

module.exports = function (APIService, $location, $log) {
  var _this = this

  _this.results = []
  _this.submit = submit

  activate()

  function activate () {
    let params = {}

    window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(string, key, value) {
      params[key] = decodeURIComponent(value);
    })

    if (!angular.equals({}, params)) {
      _this.q = _this.currentQ = params.q
      search()
    }
  }

  function submit () {
    _this.form.$valid && search()
  }

  function search () {
    APIService.search({ q: _this.q }).then(function (response) {
      _this.results = response.data
      _this.currentQ = _this.q
    })
  }
}

module.exports.$inject = ['APIService', '$location', '$log']

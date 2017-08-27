var _ = require('underscore')

module.exports = function (APIService, $scope, $log) {
  var _this = this

  _this.page = 0
  _this.pageSize = 10
  _this.pages = 1

  _this.nodes = []
  _this.types = [{
    id: 0,
    name: 'Все',
    code: 'all',
    active: true
  }]

  _this.getNodes = getNodes
  _this.getTypes = getTypes
  _this.filter = filter

  activate()

  function getNodes() {
    if (_this.page < _this.pages) {
      _this.page++
      return APIService.nodes.query({
        'page': _this.page,
        'per-page': _this.pageSize
      }).then(function (response) {
        _this.pages = Math.ceil(response.headers('X-Pagination-Total-Count') / _this.pageSize)
        return _this.nodes = _this.nodes.concat(response.data)
      })
    } else {
      return false
    }
  }

  function getTypes() {
    return APIService.nodes.types().then(function (response) {
      return _this.types = _this.types.concat(response.data)
    })
  }

  function filter(type) {
    _.each(_this.types, (type) => type.active = false)
    type.active = true
    $scope.$emit('iso-option', {
      filter: type.code == 'all' ? '*' : `[data-type=${type.code}]`
    })
  }

  function activate() {
    getNodes()
    getTypes()
  }
}

module.exports.$inject = ['APIService', '$scope', '$log']

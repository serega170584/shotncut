var _ = require('underscore')

module.exports = function (APIService, $scope, $log) {
  var _this = this

  _this.page = 0
  _this.pageSize = 8
  _this.pages = 1
  _this.data = {
    selectedCategory: {
      id: 0,
      name: 'Все',
      code: 'all',
      active: true
    }
  }

  _this.authors = []
  _this.categories = []

  _this.getAuthors = getAuthors
  _this.getCategories = getCategories
  _this.filter = filter
  _this.selectCategory = selectCategory

  activate()

  function getAuthors() {
    if (_this.page < _this.pages) {
      _this.page++
      return APIService.authors.query({
        'page': _this.page,
        'per-page': _this.pageSize
      }).then(function (response) {
        _this.pages = Math.ceil(response.headers('X-Pagination-Total-Count') / _this.pageSize)
        return _this.authors.push(...response.data)
      })
    } else {
      return false
    }
  }

  function getCategories() {
    return APIService.authors.categories().then(function (response) {
      return _this.categories.push(...response.data)
    })
  }

  function selectCategory(category) {
    _this.data.selectedCategory = category
    filter(category)
  }

  function filter(category) {
    $scope.$emit('iso-option', {
      filter: category.code == 'all' ? '*' : `[data-category=${category.code}]`
    })
  }

  function activate() {
    getAuthors()
    _this.categories.push(_this.data.selectedCategory)
    getCategories()
  }
}

module.exports.$inject = ['APIService', '$scope', '$log']

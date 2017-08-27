module.exports = function ($http) {
  var service = {
    nodes: {
      query: nodesQuery,
      types: nodesTypes
    },
    authors: {
      query: authorsQuery,
      categories: authorsCategories
    },
    search: search
  }

  function search (params) {
    return $http.get('/api/search', { params })
  }

  function authorsQuery(params) {
    return $http.get('/api/authors', { params })
  }

  function authorsCategories() {
    return $http.get('/api/author-categories')
  }

  function nodesQuery(params) {
    return $http.get('/api/nodes', { params })
  }

  function nodesTypes() {
    return $http.get('/api/node-types')
  }

  return service;
}

module.exports.$inject = ['$http']

angular.module('si.editor.service', [
])
    .factory('Articles', ['$resource', function($resource) {
        return $resource('/api/articles');
    }])

module.exports = 'si.editor.service'
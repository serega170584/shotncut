angular.module('si.main', [])
  .directive('siNode', require('./node.js'))
  .controller('siMainController', require('./controller.js'))

module.exports = 'si.main'

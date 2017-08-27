angular
  .module('si.isotope', [])
  .directive('siIsotope', require('./isotope.js'))
  .directive('siIsotopeContainer', require('./container.js'))
  .directive('siIsotopeItem', require('./item.js'))
module.exports = 'si.isotope'

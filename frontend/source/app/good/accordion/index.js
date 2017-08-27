angular
  .module('si.good.accordion', [])
  .directive('siGoodAccordion', require('./accordion.js'))
  .directive('siGoodAccordionPane', require('./accordion-pane.js'))
module.exports = 'si.good.accordion'

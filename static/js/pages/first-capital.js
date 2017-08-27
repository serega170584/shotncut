$(function () {

  var $sectionCalc = $('.js-section-calc');
  var $calcBottomResult = $('.js-calc-bottom-result');


  /**
   * default values set
   */
  function defaultValues() {
    $sectionCalc.css('min-height', $sectionCalc.outerHeight(true));
    $calcBottomResult.addClass('hidden');
  }
  defaultValues();






});
$(function () {

  var $header = $('.js-header');
  var $body = $('body');
  var $sectionCalc = $('.js-section-calc');
  var $calcResultTopText = $('.js-calc-result-top-text');
  var $priceInput = $('.js-max-price');

  var DEF_MIN_SUM = 100000;
  var MAX_SUM = 1500000;

  var $calcResultAll = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');

  var outPrice = '';
  var namePrice = $priceInput.attr('name');


  /**
   * function for back result sum
   */
  var $calcForm = $('.js-calc');
  resultBack = function(data) {
    var getPrice = '';
    var dataArray = $calcForm.serializeArray();

    // get values from data
    $.each( dataArray, function( key, value ) {
      if (value.name == namePrice){
        getPrice = value.value.replace(/[a ]/g, '')
      }
    });

    // show success
    if (getPrice){
      outPrice = getPrice / 100;
      showSuccess(outPrice);
    }
  };

  /**
   * error send form
   */
  function showErrorForm(){
    console.log('ooops');
  }

  /**
   * change calc result blocks on back data
   */
  function showSuccess(price) {
    $calcResultAll.addClass('calculated');
    $calcResultSum.html(formating(price));

    if(initResultcalcsChanges)
      initResultcalcsChanges(price);

  }

  /**
   * calculator result
   */
  initResultcalcsChanges = function () {

    var price = formating($priceInput.val().replace(/[^-0-9]/gim,''));

    $calcResultTopText.html('Полис на&nbsp;<span>год<br>&nbsp;с защитой </span><span class="b-nowrap">'+ price +'</span>&nbsp;<span class="b-rub">a</span>');
  };

  /**
   * default values set
   */
  function defaultValues() {
    $header.addClass('b-header__white');
    $body.addClass('header-white');
    $sectionCalc.css('min-height', $sectionCalc.outerHeight(true));
  }
  defaultValues();

  /**
   * price format and min max val
   */
  $priceInput.on('paste change input', function () {
    var val = $(this).val();
    var onlyNum = val.replace(/[^-0-9]/gim,'');

    if (onlyNum.length == 0){
      $(this).val(formating(DEF_MIN_SUM));
    } else if (onlyNum > MAX_SUM){
      $(this).val(formating(MAX_SUM));
    } else {
      $(this).val(formating(onlyNum));
    }
  });

  /**
   * def calc values
   */
  function setDropdownDef() {
    $priceInput.val(formating(DEF_MIN_SUM)).trigger('change');
  }
  setDropdownDef();

});
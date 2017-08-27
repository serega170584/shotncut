$(function () {

  var $header = $('.js-header');
  var $body = $('body');
  var $sectionCalc = $('.js-section-calc');
  var $calcResultTopText = $('.js-calc-result-top-text');
  var $priceInput = $('.js-price-input');
  var $priceDropdown = $('.js-price-dropdown');

  var $calcResultAll = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');

  var outPrice = '';
  var namePrice = $priceInput.attr('name');

  var arrFamilyProtection = {
    '300000' : '900',
    '600000' : '1800',
    '1500000' : '4500'
  };

  /**
   * function for back result sum
   */
  var $calcForm = $('.js-calc');
  resultBack = function(data, promoVal) {

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
      outPrice = arrFamilyProtection[getPrice];
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

  function setDropdownDef() {
    $('.b-dropdown__item', $priceDropdown).eq(1).trigger('click');
    $('.b-dropdown').addClass('b-dropdown_open first-open')
  }
  setDropdownDef();

});
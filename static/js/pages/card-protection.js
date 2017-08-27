$(function () {

  var $header = $('.js-header');
  var $body = $('body');
  var $sectionCalc = $('.js-section-calc');
  var $calcResultTopText = $('.js-calc-result-top-text');
  var $priceInput = $('.js-price-input');
  var $priceDropdown = $('.js-price-dropdown');
  var $calcPromoResult = $('.js-call-promo-popup');

  var $calcResultAll = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');


  /**
   * function for back result sum
   */
  resultBack = function(data, promoVal) {

    showSuccess(1232, promoVal);

    // $.ajax({
    //   url: $calcForm.attr('action'),
    //   method: "POST",
    //   data: data,
    //   dataType: "JSON",
    //   success: function (data) {
    //     data.result == 'ok' ? showSuccess(data.price, promoVal) : showErrorForm();
    //   },
    //   error: function () {
    //     showErrorForm();
    //   }
    // });
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
  function showSuccess(price, promoVal) {
    $calcResultAll.addClass('calculated');
    $calcResultSum.html(formating(price));

    if (promoVal)
      $('a', $calcPromoResult).html('Введен промокод '+ promoVal);

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
    $('.b-dropdown__item', $priceDropdown).eq(2).trigger('click');
    $('.b-dropdown').addClass('b-dropdown_open first-open')
  }
  setDropdownDef();

});
$(function () {

  var $header = $('.js-header');
  var $body = $('body');
  var $sectionCalc = $('.js-section-calc');
  var $calcResultTopText = $('.js-calc-result-top-text');
  var $priceInput = $('.js-price-input');
  var $ageDropdownBox = $('.js-age-dropdown');
  var $priceDropdown = $('.js-price-dropdown');
  var $calcResultSum = $('.js-calc-result-sum');
  var $calcResultAll = $('.js-calc-result-blocks');

  var namePrice = $priceInput.attr('name');
  var nameAge =  $('input', $ageDropdownBox).attr('name');
  var outPrice = '';

  var arrPanaceya = {
    '1500000' : {
      '18-30': '3060',
      '31-40': '4410',
      '41-50': '9360'
    },
    '2500000' : {
      '18-30': '5760',
      '31-40': '7560',
      '41-50': '14760'
    }
  };


  /**
   * function for back result sum
   */
  var $calcForm = $('.js-calc');
  resultBack = function(data) {
    var getPrice;
    var getAge;

    var dataArray = $calcForm.serializeArray();

    // get values from data
    $.each( dataArray, function( key, value ) {
      if (value.name == namePrice){
        getPrice = value.value.replace(/[a ]/g, '')
      } else if (value.name == nameAge){
        getAge = value.value
      }
    });

    // show success
    if (getPrice && getAge){
      outPrice = arrPanaceya[getPrice][getAge];
      showSuccess(outPrice);
    }

  };

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

    $calcResultTopText.html('Полис на год<br><span> с защитой </span><span class="b-nowrap">'+ price +'</span>&nbsp;<span class="b-rub">a</span>');
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
    $('.b-dropdown__item', $priceDropdown).eq(0).trigger('click');
    $('.b-dropdown__item', $ageDropdownBox).eq(1).trigger('click');
    $('.b-dropdown').addClass('b-dropdown_open first-open')
  }
  setDropdownDef();

});
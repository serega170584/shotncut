$(function () {

  var $header = $('.js-header');
  var $body = $('body');
  var $sectionCalc = $('.js-section-calc');
  var $calcResultTopText = $('.js-calc-result-top-text');

  var $checkboxFaqPopup = $('.js-checkbox-faq-popup');
  var $checkboxHoverBlock = $('.js-checkbox-text-box-call');
  var windowWidth = $(window).width();
  var $checkBoxTextPopup = $('.js-checkbox-text');
  var $checkBoxCloseMobilePopup = $('.js-checkbox-text-box-close');
  var $calcResults = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');
  var sectionCalcOffsetTop = $('.b-wrapper', $sectionCalc).offset().top;

  var $calcPromoResult = $('.js-call-promo-popup');

  var DEF_CALC_RESULT_SUM = $calcResultSum.html();

  var $calcForm = $('.js-calc');
  var $calcResultAll = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');
  var MAGIC_LEFT_PADDING_FAQ_CHECKBOX = 30;

  var $slider = $('.js-multipolis-slider');
  var $sliderBox = $('.js-multipolis-slider-box');
  var $sliderInput = $('.js-multipolis-slider-input');

  var $multipolisItem = $('.js-multipolis-item');
  var $multipolisItemText = $('.js-multipolis-text');
  var $multipolisItemVals = $('.js-multipolis-slider-vals');
  var $multipolisItemValsFaqCall = $('.js-multipolis-slider-vals-faq');
  var $multipolisItemTextClose = $('.js-multipolis-text-close');
  var $multipolisEachPrice = $('.js-multipolis-price');

  var fake_result = {
    'multipolis_0': 700,
    'multipolis_1': 450,
    'multipolis_2': 550,
    'multipolis_3': 650,
    'multipolis_4': 600,
    'multipolis_5': 300,
    'multipolis_6': 200
  };

  /**
   * function for back result sum
   */
  resultBack = function(data, promoVal) {

    showSuccess(fake_result, promoVal);

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
    var sumPrice = 0;

    $multipolisEachPrice.each(function () {
      var thisId = $(this).attr('data-id');
      $(this).html(price[thisId]);
      sumPrice = sumPrice + price[thisId];
    });

    $calcResultAll.addClass('calculated');
    $calcResultSum.html(formating(sumPrice));

    if (promoVal)
      $('a', $calcPromoResult).html('Введен промокод '+ promoVal);

    if(initResultcalcsChanges)
      initResultcalcsChanges(sumPrice);

  }


  /**
   * show popup width text from checkbox hover
   */
  $checkboxHoverBlock.on('mouseenter', function () {
    if (windowWidth > 1199){
      var $thisMultipolisItem = $(this).closest($multipolisItem);
      var thisTop = $thisMultipolisItem.offset().top - sectionCalcOffsetTop;
      var $textBlock = $('.js-checkbox-text', $thisMultipolisItem);
      if ($textBlock.length){
        var text = $textBlock.html();
        $checkboxFaqPopup.html(text).addClass('open').css('top', thisTop+'px');
      }
    }
  }).on('mouseleave', function () {
    if (windowWidth > 1199) {
      $checkboxFaqPopup.removeClass('open');
    }
  });

  /**
   * call checkbox mobile popup
   */
  $checkboxHoverBlock.on('click', function (e) {
    e.preventDefault();
    if (windowWidth <= 1199){
      $body.addClass('overflow');
      $(this).closest($sectionCalc).addClass('z-index');
      $('.b-content').addClass('z-index');
      $(this).next($checkBoxTextPopup).removeClass('hidden');
    }
  });

  /**
   * close checkbox mobile popup
   */
  $checkBoxCloseMobilePopup.on('click', function (e) {
    e.preventDefault();
    closeMobilePopup();
  });

  /**
   * fnc for close popup
   */
  function closeMobilePopup() {
    if ($checkBoxTextPopup.is(':visible')){
      $body.removeClass('overflow');
      $sectionCalc.removeClass('z-index');
      $('.b-content').removeClass('z-index');
      $checkBoxTextPopup.addClass('hidden');
    }
  }

  /**
   * calculator result
   */
  initResultcalcsChanges = function (price) {
    // when back price else show default
    if (price){
      $calcResultTopText.html('Полис на 1 год');
    } else {
      $calcResultTopText.html('Полис за 7 минут');
      $calcResults.removeClass('calculated');
      $calcResults.html(DEF_CALC_RESULT_SUM);
    }
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
   * on input val change lunch changing in block
   */
  $sliderInput.on('change', function () {
    var $thisMultipolisItem = $(this).closest($multipolisItem);
    sliderChangeVals($thisMultipolisItem, $(this).val());
  });

  /**
   * init slider and set val to hide input and set values
   */
  $slider.each(function () {
    var $thisSliderBox =  $(this).closest($sliderBox);

    $(this).slider({
      range: "min",
      value:1,
      min: 0,
      max: 2,
      step: 1,
      slide: function( event, ui ) {
        $('.js-multipolis-slider-input', $thisSliderBox).val(ui.value).trigger('change');
      }
    });
    $('.js-multipolis-slider-input', $thisSliderBox).val($(this).slider( "value" )).trigger('change');
  });

  /**
   * show text popup price on slider
   */
  $('.ui-slider-handle', $slider).on('mouseenter', function () {
    if (windowWidth > 1199){
      var $thisMultipolisItem = $(this).closest($multipolisItem);
      $('.js-multipolis-text', $thisMultipolisItem).addClass('show');
    }
  }).on('mouseleave', function () {
    if (windowWidth > 1199) {
      $multipolisItemText.removeClass('show');
    }
  });

  $multipolisItemVals.on('mouseenter', function () {
    if (windowWidth > 1199){
      var $thisMultipolisItem = $(this).closest($multipolisItem);
      $('.js-multipolis-text', $thisMultipolisItem).addClass('show');

      var title = $(this).attr('data-title');
      var textIndexes = $(this).attr('data-text-index').split(',');
      $('.js-protect-title', $thisMultipolisItem).html(title);
      $('.js-protect-text', $thisMultipolisItem).removeClass('active');
      $.each(textIndexes, function( index, value ) {
        $('.js-protect-text', $thisMultipolisItem).eq(value).addClass('active');
      });

    }
  }).on('mouseleave', function () {
    if (windowWidth > 1199) {
      $multipolisItemText.removeClass('show');
    }
  });

  /**
   * show popup price on click price
   */
  $multipolisItemValsFaqCall.on('click', function (e) {
    e.preventDefault();
    if (windowWidth <= 1199){
      var $thisPriceLi = $(this).closest($multipolisItemVals);
      var $thisMultipolisItem = $(this).closest($multipolisItem);

      $body.addClass('overflow');
      $(this).closest($sectionCalc).addClass('z-index');
      $('.b-content').addClass('z-index');


      var title = $thisPriceLi.attr('data-title');
      var textIndexes = $thisPriceLi.attr('data-text-index').split(',');
      $('.js-protect-title', $thisMultipolisItem).html(title);
      $('.js-protect-text', $thisMultipolisItem).removeClass('active');
      $.each(textIndexes, function( index, value ) {
        $('.js-protect-text', $thisMultipolisItem).eq(value).addClass('active');
      });

      $('.js-multipolis-text', $thisMultipolisItem).addClass('show');
    }
  });

  /**
   * close popup price text
   */
  $multipolisItemTextClose.on('click', function (e) {
    e.preventDefault();
    $body.removeClass('overflow');
    $sectionCalc.removeClass('z-index');
    $('.b-content').removeClass('z-index');
    $multipolisItemText.removeClass('show');
  });

  /**
   * change price and get text and title from price to popup
   */
  function sliderChangeVals($thisMultipolisItem ,index) {
    var $thisPriceLi = $('.js-multipolis-slider-vals', $thisMultipolisItem).eq(index);

    $('.js-multipolis-slider-vals', $sliderBox).removeClass('active');
    $thisPriceLi.addClass('active');

    var title = $thisPriceLi.attr('data-title');
    var textIndexes = $thisPriceLi.attr('data-text-index').split(',');
    $('.js-protect-title', $thisMultipolisItem).html(title);
    $('.js-protect-text', $thisMultipolisItem).removeClass('active');
    $.each(textIndexes, function( index, value ) {
      $('.js-protect-text', $thisMultipolisItem).eq(value).addClass('active');
    });
  }


  /**
   * position checkbox faq popup
   */
  function checkBoxFaqLeftPos() {
    if (windowWidth > 1600)
      MAGIC_LEFT_PADDING_FAQ_CHECKBOX = 0;

    var calcPost = $calcForm[0].getBoundingClientRect();
    var needLeft = parseInt(calcPost.width + MAGIC_LEFT_PADDING_FAQ_CHECKBOX);
    $checkboxFaqPopup.css('left', needLeft+'px');
  }
  checkBoxFaqLeftPos();


  $(window).on('resize', function () {
    windowWidth = $(window).width();
    checkBoxFaqLeftPos();
  });

});
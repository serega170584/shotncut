$(function () {

  var $body = $('body');
  var $calcBottomResult = $('.js-calc-bottom-result');
  var $insertMobileBottomCalc = $('.js-calc-insert-bottom');
  var $blockForFixBar_mobile = $('.js-nav-block-for-fix-mobile');
  var $calcResultAll = $('.js-calc-result-blocks');
  var $fixMobileResult = $('.js-calc-fix-mobile-result');
  var $howBuyCarousel = $('.js-how-buy-carousel');
  var $blockForFixBar = $('.js-nav-block-for-fix');
  var $howToBuyColumns = $('.js-how-buy-box');
  var $calcForm = $('.js-calc');
  var $formFieldForChangeStatus = $('.js-change-calc-status');
  var $buyPolis = $('.js-buy-polis');
  var $topResultFixBox = $('.js-top-result-fix');
  var $calcTopResult = $('.js-calc-top-result');
  var $stopFixtopresultBox = $('.js-stop-fix-top-result');
  var calcTopResultTop = $calcTopResult.offset().top;
  var $topResultFixBoxStop = $('.js-top-result-fix-stop');
  var $blockForFixBarStop = $('.js-nav-block-for-stop');
  var $calcBottomResultFixBlock = $('.js-bottom-result-fix-top');

  var $navBlock = $('.js-nav-block');
  var $navBar = $('.js-nav-bar');
  var $navItem = $('.js-nav-item');
  var $navBarWrapper = $('.js-nav-bar-wrapper');
  var $navUl = $('.js-nav-ul');
  var $navLink = $('.js-nav-link');

  var $formPromoCode = $('.js-promo-form');

  var $bgBox = $('.b-bg');

  var windowHeight = $(window).height();
  var windowWidth = $(window).width();

  var statusCarouselHowToBuy = false;
  var howToBuy_interval;
  var index_howToBuy = -1;
  var STATUS_ANIMATE_HowToBuy = true;
  var MAGIC_TOP_RESULT_BOTTOM = 60;
  var NAX_TOP_MINUS = 25;

  /**
   * parallax effects on bg scroll blocks
   */
  function scrollParallaxBg() {
    if ($bgBox.length){
      $bgBox.each(function () {
        var thisVal = $(this)[0].getBoundingClientRect();
        var thisBgImg = $('.b-bg__pic', $(this));
        if (thisVal.top < 0 && thisVal.top > thisVal.height * -1){
          if ($(this).hasClass('b-bg__top')){
            var scaleVal = 1 + thisVal.top / -5000;
            thisBgImg.css('transform', 'scale('+scaleVal+')');
          } else {
            var moveVal = parseInt(thisVal.top / -2);
            thisBgImg.css('transform', 'translate(0,'+moveVal+'px)');
          }
        } else if (thisVal.top > 0) {
          thisBgImg.css('transform', 'translate(0,0)');
        }
      });
    }
  }
  scrollParallaxBg();

  /**
   * if calc result circle has promo link call add class to block
   */
  function statusResultCalcPromo() {
    if ($('.b-call-promo__link', $calcResultAll).length){
      $calcResultAll.addClass('mobile-hide-text');
    }
  }
  statusResultCalcPromo();


  /**
   * calc how mocuh block of $howToBuyColumns and add style if < 3
   */
  function HowToBuyStyle() {
    if ($howToBuyColumns.length < 3 ){
      $howToBuyColumns.addClass('b-travel-how-buy__column_wide');
    }
  }
  HowToBuyStyle();


  /**
   * move bottom calc result on mobile
   */
  function moveBottomCalc() {
    if (windowWidth < 768 && $calcBottomResult.length){
      $calcBottomResult.appendTo($insertMobileBottomCalc);
    } else if (windowWidth >= 768 && $('div', $insertMobileBottomCalc).length && $calcBottomResult.length){
      $calcBottomResult.appendTo($blockForFixBar_mobile);
    }
  }
  moveBottomCalc();

  /**
   * set default false result to array of status, that depends of amount calc blocks result
   */
  var arrCalcResults = [];
  for (var i = 0; i < $calcResultAll.length;  i++){
    arrCalcResults[i] = false
  }

  $('*', $calcResultAll).on('click', function () {
    if (!$(this).hasClass('calculated') && windowWidth < 768 && !$(this).hasClass('b-calc__result_link')){
      $body.animate({
        scrollTop: 0
      }, 250);
    }
  });

  /**
   * hide mobile result box when find inline on scroll
   */
  function hideFixMobileResult() {
    if (windowWidth < 768){
      $calcResultAll.each(function (index) {

        if (!$(this).hasClass('js-calc-fix-mobile-result')){
          var thisVals = $(this)[0].getBoundingClientRect();

          if (thisVals.top - windowHeight <= 0 && thisVals.top * -1 <= thisVals.height){
            arrCalcResults[index] = true;
          } else if ( (thisVals.top - windowHeight > 0 || thisVals.top * -1 > thisVals.height)){
            arrCalcResults[index] = false;
          }
        }
      });

      arrCalcResults.indexOf(true) > -1 ? $fixMobileResult.addClass('hidden') : $fixMobileResult.removeClass('hidden');
    }
  }

  /**
   * carousel how buy for mobile or destroy
   */
  function initCarouselHowBuy() {
    if (windowWidth <= 767 && !statusCarouselHowToBuy){
      statusCarouselHowToBuy = true;
      $howBuyCarousel.slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        touchThreshold: 20,
        adaptiveHeight: true
      });
    } else if (windowWidth > 767 && statusCarouselHowToBuy){
      $howBuyCarousel.slick('unslick');
    }
  }
  initCarouselHowBuy();

  /**
   * init active steps of how to buy block
   */
  function initHowBuySteps() {
    if (windowWidth > 767){
      var blockFixVals = $blockForFixBar[0].getBoundingClientRect();

      if (blockFixVals.top <= parseInt(windowHeight - windowHeight / 4) && blockFixVals.top * -1 < blockFixVals.height && STATUS_ANIMATE_HowToBuy){

        howToBuy_interval = setInterval(function () {
          if (index_howToBuy == $howToBuyColumns.length - 1){
            index_howToBuy = -1;
          }
          index_howToBuy++;
          $howToBuyColumns.removeClass('active');
          $howToBuyColumns.eq(index_howToBuy).addClass('active');
        }, 1500);
        STATUS_ANIMATE_HowToBuy = false;

      } else if ( (blockFixVals.top > parseInt(windowHeight - windowHeight / 4) || blockFixVals.top * -1 >= blockFixVals.height && howToBuy_interval) && !STATUS_ANIMATE_HowToBuy ){
        STATUS_ANIMATE_HowToBuy = true;
        window.clearInterval(howToBuy_interval);
        $howToBuyColumns.removeClass('active');
        index_howToBuy = -1;
      }
    } else if (windowWidth <= 767){
      window.clearInterval(howToBuy_interval);
    }

  }

  /**
   * send data when enough fields full
   */
  $('input', $calcForm).on('keyup paste change', function () {
    var $this = $(this);
    var sendStatus = true;

    $formFieldForChangeStatus.each(function () {
      if ($(this).val() == '')
        sendStatus = false;
    });
    if (sendStatus && !$(this).hasClass('js-code-input')){
      var data;
      if ($formPromoCode.length){
        data = $('.js-calc, .js-promo-form').serialize();
      } else {
        data = $calcForm.serialize();
      }
      resultBack(data);
    }
  });

  /**
   * after calculate send form
   */
  $buyPolis.on('click', function (e) {
    e.preventDefault();
    var data;
    if ($formPromoCode.length){
      data = $('.js-calc, .js-promo-form').serialize();
    } else {
      data = $calcForm.serialize();
    }
    resultBack(data);
  });

  /**
   * top result circle position
   */
  function topResultPoistion() {
    var topFixResultBox_top = $topResultFixBox[0].getBoundingClientRect().top;
    var calcTopResultHeight = $calcTopResult.outerHeight(true);

    if ($stopFixtopresultBox.is(':visible')){
      var stopTopFixResult_top = $stopFixtopresultBox[0].getBoundingClientRect().top;
      if (topFixResultBox_top <= 0 && stopTopFixResult_top - calcTopResultHeight - calcTopResultTop >= 0) {
        var scrollVal = parseInt(topFixResultBox_top * -1);
        $calcTopResult.css('transform', 'translate(0,'+scrollVal+'px)')
      }
    } else {
      var $topResultFixBoxStop_top = $topResultFixBoxStop[0].getBoundingClientRect().top;
      if (topFixResultBox_top <= 0 && $topResultFixBoxStop_top - calcTopResultHeight - calcTopResultTop - MAGIC_TOP_RESULT_BOTTOM > 0){
        var scrollVal = parseInt(topFixResultBox_top * -1);
        $calcTopResult.css('transform', 'translate(0,'+scrollVal+'px)')
      }

      // show scroll link to calc after srolled calc block
      var topFixResultBox_height = $topResultFixBox[0].getBoundingClientRect().height;
      if (topFixResultBox_top * -1 >= topFixResultBox_height && !$calcTopResult.hasClass('calc-left')){
        $calcTopResult.addClass('calc-left');
      } else if (topFixResultBox_top * -1 < topFixResultBox_height && $calcTopResult.hasClass('calc-left')){
        $calcTopResult.removeClass('calc-left');
      }

    }
  }
  topResultPoistion();

  /**
   * bottom result circle position
   */
  function bottomResultPoistion() {
    if ($calcBottomResult.length){
      var calcBottomResultFixBlockVals = $calcBottomResultFixBlock[0].getBoundingClientRect();
      var blockFixStopVals = $blockForFixBarStop[0].getBoundingClientRect();
      var calcBottomResultHeight = $calcBottomResult.outerHeight(true);

      if (calcBottomResultFixBlockVals.top <= 0 && blockFixStopVals.top * -1 + calcBottomResultHeight + MAGIC_TOP_RESULT_BOTTOM <= blockFixStopVals.height) {
        var scrollVal = parseInt(calcBottomResultFixBlockVals.top * -1);
        $calcBottomResult.css('transform', 'translate(0,'+scrollVal+'px)');
      } else if (calcBottomResultFixBlockVals.top > 0){
        $calcBottomResult.css('transform', 'translate(0,0)');
      }
    }
  }
  bottomResultPoistion();

  /**
   * set height to wrapper of mobile nav page
   */
  function setHeightWrapperMobileNav(){
    if (windowWidth < 768){
      var height = 0;
      $navItem.each(function () {
        if ($(this).outerHeight(true) != 0 ){
          height = $(this).outerHeight(true) * $navItem.length;
        }
      });
      $navBarWrapper.css('min-height', height+'px');
    }
  }
  setHeightWrapperMobileNav();

  /**
   * sroll state nav page bar
   */
  function navbarStateScroll() {
    var blockFixVals = $blockForFixBar[0].getBoundingClientRect();

    if (windowWidth >= 768){
      if (blockFixVals.top > windowHeight - NAX_TOP_MINUS && !$navBar.hasClass('fixed-bottom')){
        $navBar.addClass('fixed-bottom').removeClass('fixed-top');
      } else if (blockFixVals.top <= windowHeight - NAX_TOP_MINUS && blockFixVals.top > NAX_TOP_MINUS && ($navBar.hasClass('fixed-bottom') || $navBar.hasClass('fixed-top'))){
        $navBar.removeClass('fixed-top').removeClass('fixed-bottom');
      } else if (blockFixVals.top <= NAX_TOP_MINUS && !$navBar.hasClass('fixed-top')){
        $navBar.addClass('fixed-top').removeClass('fixed-bottom');
      }
    } else if (windowWidth < 768){
      var blockFixVals_mobile = $blockForFixBar_mobile[0].getBoundingClientRect();
      if (blockFixVals_mobile.top <= 0 && !$navBar.hasClass('fixed-top')){
        $navBar.addClass('fixed-top');
      } else if (blockFixVals_mobile.top > 0 && $navBar.hasClass('fixed-top')){
        $navBar.removeClass('fixed-top');
      }

      // remove open when scroll
      if ($navUl.hasClass('open')){
        $navUl.removeClass('open');
      }

    }
  }
  navbarStateScroll();

  /**
   * scroll to nav box
   */
  $navLink.on('click', function (e) {
    e.preventDefault();
    var thisHref = $(this).attr('href');
    if (windowWidth < 768){

      if ($(this).hasClass('active') && !$navUl.hasClass('open')){
        $navUl.addClass('open');
      } else if ($navUl.hasClass('open') && $(this).hasClass('active')){
        $navUl.removeClass('open');
      } else if ($navUl.hasClass('open') && !$(this).hasClass('active')) {
        scrollTo(thisHref);
      } else {
        scrollTo(thisHref);
      }

    } else {
      scrollTo(thisHref);
    }

  });

  /**
   * change nav bar state for responsive
   */
  var tabletPaddingWrapper = 85;
  var widthNewTabNumber = 45;

  function responsiveNavBarState() {
    // for tablet
    if (windowWidth <= 1199 && windowWidth > 767){
      var commonWidthItems = 0;
      var amountHideItems = 0;
      var maxWidth = windowWidth - tabletPaddingWrapper - widthNewTabNumber;

      // get each item width and add | del status for moving
      $navItem.each(function () {
        var thisItemWidth = $(this).outerWidth(true);
        commonWidthItems = parseInt(commonWidthItems + thisItemWidth);
        if (maxWidth < commonWidthItems){
          $(this).addClass('js-nav-item-move').removeClass('js-nav-item-move-back');
        } else if (maxWidth >= commonWidthItems && $(this).hasClass('js-nav-item-move')) {
          $(this).removeClass('js-nav-item-move').addClass('js-nav-item-move-back');
        }
      });

      // move items to their places
      if ($('.js-nav-item-move').length){
        amountHideItems = $('.js-nav-item-move').length;
        // check if added box is
        if (!$('.js-nav-added-li').length){
          $navUl.append('<li class="js-nav-added-li b-nav-page__item b-nav-page__item_added"><a href="#" class="js-nav-added-num b-nav-page__link b-nav-page__link_num">+' + amountHideItems +
            '</a><ul class="js-nav-added-ul b-nav-page__sub"></ul></li>');
        }

        $('.js-nav-item-move').appendTo('.js-nav-added-ul');
        $('.js-nav-added-num').html("+"+amountHideItems);

      }
      if ( $('.js-nav-item-move-back').length && $('.js-nav-item-move').length ){
        $('.js-nav-item-move-back').insertBefore('.js-nav-added-li');
      } else if($('.js-nav-item-move-back').length && !$('.js-nav-item-move').length){
        $('.js-nav-item-move-back').insertBefore('.js-nav-added-li');
        $('.js-nav-added-li').remove();
      }

    } else if (windowWidth > 1199 || windowWidth < 768){

      if ($('.js-nav-item-move').length){
        $('.js-nav-item-move').insertBefore('.js-nav-added-li');
        $('.js-nav-added-li').remove();
      }

    }
  }
  responsiveNavBarState();

  /**
   * open hide nav items
   */
  $(document).on('click', '.js-nav-added-num' , function (e) {
    e.preventDefault();
    $(this).closest('.js-nav-added-li').toggleClass('active');
  });

  /**
   * nav bar status active fields by scroll to block
   */
  function navBarActivate() {

    $navBlock.each(function () {

      var thisVals = $(this)[0].getBoundingClientRect();

      if ( thisVals.top <= 0 && thisVals.top + thisVals.height > 0 && !$(this).hasClass('active') ){
        $(this).addClass('active');
        $('.js-nav-link[href="#'+$(this).attr('id')+'"]').addClass('active');
      } else if ( thisVals.top > 0 || thisVals.top + thisVals.height <= 0 && $(this).hasClass('active') ){
        $(this).removeClass('active');
        $('.js-nav-link[href="#'+$(this).attr('id')+'"]').removeClass('active');
      }

    });

  }
  navBarActivate();


  $(window).on('scroll', function () {
    navbarStateScroll();
    topResultPoistion();
    navBarActivate();
    bottomResultPoistion();
    initHowBuySteps();
    hideFixMobileResult();
    scrollParallaxBg();
  });

  $(window).on('resize', function () {
    windowHeight = $(window).height();
    windowWidth = $(window).width();
    navbarStateScroll();
    topResultPoistion();
    navBarActivate();
    bottomResultPoistion();
    initHowBuySteps();
    initCarouselHowBuy();
    responsiveNavBarState();
    setHeightWrapperMobileNav();
    moveBottomCalc();
    hideFixMobileResult();
    scrollParallaxBg();
  });

});

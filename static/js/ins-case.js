$(function () {

  var $body = $('body');
  var $popupInsOverlay = $('.js-ins-case-overlay');
  var $insCaseCall = $('.js-ins-case-call');

  var $callSecondStep = $('.js-ins-case-last-link');
  var $insSecondBlock = $('.js-second-block');
  var $secondStepErrorBlock = $('.js-second-step-error');
  var $secondStepTitle = $('.js-second-step-title');
  var $secondStepInsertBlock = $('.js-second-step-insert');
  var $secondStepPic = $('.js-ins-case-pic');
  var $insCaseFormCall = $('.js-ins-case-form-call');

  var $form = $('.js-ins-case-form');
  var $errorField = $('.js-ins-case-form-error');
  var $successField = $('.js-ins-case-form-success');
  var $popupInsFormOverlay = $('.js-ins-case-form-overlay');
  var $insCaseFrom_product = $('.js-ins-case-form-product');
  var $insCaseFrom_type = $('.js-ins-case-form-type');

  var windowWidth = $(window).width();
  var insType = {
    type: '',
    product: ''
  };
  var insPicUrl = '';
  var actionForSecondStep = 'http://index.php';

  var fakeContent = '<ol><li><h4>Не волнуйтесь. Звоните</h4><div class="b-text__wrapper"><p>Из любой точки мира: +7 495 787-21-78</p><p>Из Греции: +30 289 704-17-77</p><p>Из Египта: +20 106 544-40-40</p><p>Из Турции: +90 212 337-20-93</p></div></li><li><h4>Расскажите нашему представителю:</h4><div class="b-text__wrapper"><ul><li>Что случилось</li><li>Как вас зовут</li><li>Где вы находитесь</li><li>Ваш контактный телефон</li><li>Номер и срок действия полиса</li></ul></div></li><li><h4>И всё. Наш представитель вызовет помощь или сообщит, в какую клинику нужно поехать.</h4></li></ol>';



  /**
   * textarea height with content text
   */
  $('textarea', $form).each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
  }).on('input', function () {
    this.style.height = '0';
    this.style.height = (this.scrollHeight) + 'px';
  });

  /**
   *  mobile tabs reconstruction
   */
  var tabReconstStatus = false;
  function resconstructTabs() {

    if (windowWidth < 768 && !tabReconstStatus){
      tabReconstStatus = true;

      $('.js-tabs-result', $popupInsOverlay).each(function () {
        var thisId = $(this).attr('id');
        var $thisLinkId = $('.js-tabs[href="#'+thisId+'"]');
        if ($thisLinkId.parents('li')){
          $(this).appendTo($thisLinkId.parents('li'));
        }

      })

    } else if (windowWidth > 767 && tabReconstStatus) {
      tabReconstStatus = false;
      $('.js-tabs-result', $popupInsOverlay).appendTo('.b-ins-case__tab-box_result', $popupInsOverlay);
    }
  }
  resconstructTabs();
  

  /**
   * call is case
   */
  $insCaseCall.on('click', function (e) {
    e.preventDefault();
    $popupInsOverlay.fadeIn(250).addClass('show');
    $body.addClass('overflow');
  });

  /**
   * close on click
   */
  $('.js-popup-close', $popupInsOverlay).on('click', function (e) {
    e.preventDefault();
    closeInsCase();
  });

  /**
   * close popup if esc
   */
  $(document).keyup(function (e) {
    if (e.which == 27) {
      closeInsCase();
      closePopup();
    }
  });

  /**
   * fnc to close ins case
   */
  function closeInsCase() {
    if ($popupInsOverlay.is(':visible')){
      $popupInsOverlay.fadeOut(250, function () {
        $insSecondBlock.fadeOut(0);
        $popupInsOverlay.removeClass('second');
      }).removeClass('show');
      $body.removeClass('overflow');
      $('.js-tabs', $popupInsOverlay).removeClass('active');
      $('.js-tabs-result', $popupInsOverlay).fadeOut(0);
    }
  }

  /**
   * set second step circle position
   */
  function setPositionToCircle() {
    var secondBlockWrapperVals = $('.b-wrapper', $insSecondBlock)[0].getBoundingClientRect();
    $('.js-ins-case-form-call', $popupInsOverlay).css('right', secondBlockWrapperVals.left+'px');
  }
  setPositionToCircle();

  /**
   * set type of ins case by click on tab link
   */
  $('.js-tabs', $popupInsOverlay).on('click', function () {
    insType.type = $(this).text();
  });

  /**
   * get product name and pic url for send steps
   * send type and product name for get info for second step
   */
  $callSecondStep.on('click', function (e) {
    e.preventDefault();
    insType.product = $(this).html();
    insPicUrl = $(this).attr('data-pic');
    getSecondStepContent();
  });

  /**
   * send insType for get content for second step
   */
  function getSecondStepContent() {
    $.ajax({
      url: actionForSecondStep,
      method: "GET",
      data: insType,
      success: function (data) {
        data.result == 'ok' ? showSecondStep(data.html) : errorGetSecondStep();
      },
      error: function () {
        errorGetSecondStep();
      }
    });
  }

  /**
   * second step get info error show
   */
  function errorGetSecondStep() {
    $secondStepErrorBlock.removeClass('hidden');
    setTimeout(function () {
      $secondStepErrorBlock.addClass('hidden');
    }, 2000)
  }

  /**
   * show second step with content
   * @param data
   */
  function showSecondStep(data) {
    $secondStepTitle.html(insType.product);
    $secondStepPic.css('background-image', 'url('+insPicUrl+')');
    // change fake for data
    $secondStepInsertBlock.html(data);
    $popupInsOverlay.addClass('second');
    $insSecondBlock.fadeIn(250);
    setPositionToCircle();
  }

  /**
   * call ins case popup and set type and product to from
   */
  $insCaseFormCall.on('click', function (e) {
    e.preventDefault();

    if ($(this).attr('data-type') && $(this).attr('data-product')){
      insType.type = $(this).attr('data-type');
      insType.product = $(this).attr('data-product');
    } else {
      closeInsCase();
    }

    $insCaseFrom_type.val(insType.type).trigger('change');
    $insCaseFrom_product.val(insType.product).trigger('change');

    $popupInsFormOverlay.fadeIn(250).addClass('show');
    $body.addClass('overflow');

  });

  /**
   * close popup on click any out of form
   */
  $popupInsFormOverlay.on('click', function (e) {
    var $target = $(e.target);
    if (!$target.is('.js-ins-case-form-popup *') && !$target.is('.js-ins-case-form-popup')) closePopup();
  });


  /**
   * close ins case form popup
   */
  function closePopup(){
    if ($popupInsFormOverlay.is(':visible')){
      $popupInsFormOverlay.fadeOut(250).removeClass('show');
      $body.removeClass('overflow');
    }
  }


  // VALIDATION

  /**
   * validate form for amount of filled required felds
   * @param $form - form dom
   */
  function chkform($form) {
    var emailMask = /^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-zA-Z0-9]{1}[a-zA-Z0-9\-]{0,62}[a-zA-Z0-9]{1})|[a-zA-Z])\.)+[a-zA-Z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/;
    var validEmail = emailMask.test($('.email', $form).val());

    if ($('.js-required.js-filled', $form).length < $('.js-required', $form).length) {
      $('.b-button', $form).attr('disabled', 'disabled');
    } else if ($('.phone', $form).val().length < 17) {
      $('.b-button', $form).attr('disabled', 'disabled');
    } else if (!validEmail){
      $('.b-button', $form).attr('disabled', 'disabled');
    } else {
      $('.b-button', $form).removeAttr('disabled');
    }
  }

  /**
   * set status filled of value more than 0
   */
  $('input, textarea', $form).on('keyup paste change input', function () {
    var $this = $(this);
    this.value.length > 0 ? $this.addClass('js-filled') : $this.removeClass('js-filled');
    chkform($form);
  });

  /**
   * submit form
   */
  $form.on('submit', function(e) {
    var $this = $(this);
    e.preventDefault();
    e.stopPropagation();

    submit($this);
    return false;
  });

  function submit($this) {
    $.ajax({
      url: $this.attr('action'),
      method: "POST",
      data: $this.serialize(),
      dataType: "JSON",
      success: function (data) {
        data.result == 'ok' ? showSuccess() : showError();
      },
      error: function () {
        showError();
      }
    });
  }

  /**
   * show error text
   * @param text
   */
  function showError(text) {
    $errorField.removeClass('hidden');
    setTimeout(function () {
      $errorField.addClass('hidden');
    }, 3000)
  }

  /**
   * reset form of success submit
   * @param $this - form
   */
  function showSuccess(num) {
    $form.addClass('hidden');
    $successField.removeClass('hidden');
    setTimeout(function () {
      closePopup();
      setTimeout(function () {
        $('input, textarea', $form).val('').trigger('change');
        $form.removeClass('hidden');
        $successField.addClass('hidden');
      }, 250);
    }, 3000)
  }

  /**
   * phone mask
   */
  $('.phone', $form).mask('+7 (000) 000-0000');


  $(window).on('resize', function () {
    windowWidth = $(window).width();
    setPositionToCircle();
    resconstructTabs();
  });
});
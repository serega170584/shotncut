$(function () {

  var $body = $('body');
  var $form = $('.js-promo-form');
  var $errorField = $('.js-promo-form-error');
  var $successField = $('.js-promo-form-success');
  var $popupOverlay = $('.js-promo-popup-overlay');
  var $popupCall = $('.js-call-promo-popup');
  var $popupCloseLink = $('.js-promo-popup-close');
  var $calcForm = $('.js-calc');
  var promoSubmittedCode;

  var $calcResultAll = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');

  /**
   * close popup on click any out of form
   */
  $popupOverlay.on('click', function (e) {
    var $target = $(e.target);
    if (!$target.is('.js-popup-promo *') && !$target.is('.js-popup-promo')) closePopup();
  });

  /**
   * on close click
   */
  $popupCloseLink.on('click', function (e) {
    e.preventDefault();
    closePopup();
  });

  /**
   * call popup
   */
  $popupCall.on('click', function (e) {
    e.preventDefault();
    $popupOverlay.fadeIn(250).addClass('show');
    $body.addClass('overflow');
  });

  /**
   * func close popup
   */
  function closePopup() {
    $popupOverlay.fadeOut(250).removeClass('show');
    $body.removeClass('overflow');
    $('input', $form).val(promoSubmittedCode);
  }

  /**
   * close popup if esc
   */
  $(document).keyup(function (e) {
    if (e.which == 27 && $popupOverlay.is(':visible')) {
      closePopup();
    }
  });



  // VALIDATION

  /**
   * validate form for amount of filled required felds
   * @param $form - form dom
   */
  function chkform($form) {
    if ($('.js-required.js-filled', $form).length < $('.js-required', $form).length) {
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

    var data;
    if ($calcForm.length){
      data = $('.js-calc, .js-promo-form').serialize();
    } else {
      data = $this.serialize();
    }

    promoSubmittedCode = $('input', $this).val();

    resultBack(data, promoSubmittedCode);
    showSuccess();
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
  function showSuccess() {
    closePopup();
  }


});
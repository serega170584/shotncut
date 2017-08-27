$(function () {

  var $body = $('body');
  var $activationCall = $('.js-activation-call');
  var $activationAgree = $('.js-activation-agree');
  var $form = $('.js-activation-form');
  var $errorField = $('.js-activation-form-error');
  var $popupActivationOverlay = $('.js-activation-overlay');

  var $activationChooseProduct = $('.js-activation-next');
  var $activationProductInput =  $('.js-activation-product-input');
  var $textProductTitleName = $('.js-activation-name');
  var $activationStepBack = $('.js-activation-step-back');

  /**
   * choose product set to hide input and tot title and show second step
   */
  $activationChooseProduct.on('click', function (e) {
    e.preventDefault();

    var thisText = $(this).text();
    $textProductTitleName.html(thisText);
    $activationProductInput.val(thisText).trigger('change');
    $popupActivationOverlay.addClass('second');
  });

  /**
   * step back in activation
   */
  $activationStepBack.on('click', function (e) {
    e.preventDefault();
    $popupActivationOverlay.removeClass('second');
  });


  /**
   * on close click
   */
  $('.js-popup-close', $popupActivationOverlay).on('click', function (e) {
    e.preventDefault();
    closePopup();
  });

  /**
   * open popup activation
   */
  $activationCall.on('click', function (e) {
    e.preventDefault();
    $popupActivationOverlay.fadeIn(250).addClass('show');
    $body.addClass('overflow');
  });

  /**
   * func close popup
   */
  function closePopup() {
    $popupActivationOverlay.fadeOut(250, function () {
      $popupActivationOverlay.removeClass('second');
      $('input, textarea', $form).val('').trigger('change');
      $activationAgree.prop('checked', false).trigger('change');
    }).removeClass('show');
    $body.removeClass('overflow');
  }

  /**
   * close popup if esc
   */
  $(document).keyup(function (e) {
    if (e.which == 27 && $popupActivationOverlay.is(':visible')) {
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
    } else if (!$activationAgree.is(':checked')){
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
        data.result == 'ok' ? showSuccess(data.url) : showError();
      },
      error: function () {
        showError()
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

  function showSuccess(url) {
    window.location.href = url;
  }

});
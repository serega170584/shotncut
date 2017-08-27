$(function () {

  var $body = $('body');
  var $searchCall = $('.js-search-call');
  var $popupSearchOverlay = $('.js-search-overlay');
  var $searchInput = $('.js-search-input');
  var $searchCloseLink = $('.js-search-close');
  var $appendSearchBlock = $('.js-append-search');
  var $form = $('.js-search-form');
  var $errorField = $('.js-search-form-error');
  var $menuCallLink = $('.js-toggle-menu');
  var $searchFaq = $('.js-search-form-faq');

  /**
   * send dorm on input
   */
  $searchInput.on('keyup paste change', function () {
    var thisVal = $(this).val();
    if (thisVal.length > 2){
      submit($form);
      $searchFaq.addClass('hidden')
    } else {
      $searchFaq.removeClass('hidden');
      $appendSearchBlock.html('');
    }
  });

  /**
   * submit fn
   * @param $this
   */
  function submit($this) {
    $.ajax({
      url: $this.attr('action'),
      method: "POST",
      data: $this.serialize(),
      dataType: "JSON",
      success: function (data) {
        data.result == 'ok' ? showSuccess(data.html) : showError();
      },
      error: function () {
        showError()
      }
    });
  }

  function showSuccess(html){
    $appendSearchBlock.html(html);
  }

  function showError() {
    $errorField.removeClass('hidden');
    setTimeout(function () {
      $errorField.addClass('hidden');
    }, 3000)
  }

  /**
   * open search
   */
  $searchCall.on('click', function (e) {
    e.preventDefault();
    if ($menuCallLink.hasClass('open')){
      $menuCallLink.trigger('click');
    }
    $popupSearchOverlay.fadeIn(250, function () {
      $searchInput.focus();
    }).addClass('show');
    $body.addClass('overflow');
  });

  /**
   * func close popup
   */
  function closePopup() {
    $popupSearchOverlay.fadeOut(250, function () {
      $searchInput.val('').trigger('change');
    }).removeClass('show');
    $body.removeClass('overflow');
  }

  /**
   * close popup if esc
   */
  $(document).keyup(function (e) {
    if (e.which == 27 && $popupSearchOverlay.is(':visible')) {
      closePopup();
    }
  });

  /**
   * close on click
   */
  $searchCloseLink.on('click', function (e) {
    e.preventDefault();
    closePopup();
  });





});
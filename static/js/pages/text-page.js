$(function () {

  var $galleryText = $('.js-text-gallery');

  var $votingInput = $('.js-voting-input');
  var $votingForm = $('.js-voting-from');
  var $votingText = $('.js-voting-text');
  var $votingError = $('.js-voting-error');

  var fake_result = {
    text : '871',
    voting: {
      voting_0 : '12%',
      voting_1 : '40%',
      voting_2 : '48%'
    }
  };

  $votingInput.on('change', function () {
    $votingForm.trigger('submit');
  });

  $votingForm.on('submit', function (e) {
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
      url: $(this).attr('action'),
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function (data) {
        data.result == 'ok' ? showSuccess(fake_result) : showError();
      },
      error: function () {
        showError();
      }
    });
  });

  function showSuccess(result) {
    $votingForm.addClass('voted');
    $votingText.html('Всего '+result.text+' проголосовавших');
    $votingInput.prop('disabled', true);
    $.each(result.voting, function (index, value) {
      var $thisLabel = $('#'+index).next('label');
      $('.js-voting-result', $thisLabel).html(value);
      $('.js-voting-progress', $thisLabel).css('width', value);
    })
  }

  function showError() {
    $votingInput.prop('checked', false);
    $votingError.removeClass('hidden');
    setTimeout(function () {
      $votingError.addClass('hidden');
    }, 3000)
  }

  /**
   * init img gallery
   */
  if ($galleryText){
    $galleryText.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: true,
      touchThreshold: 20
    });
  }

});
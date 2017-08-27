$(function () {

  var $body = $('body');
  var $insertCalendarText = $('.js-insert-calendar-text');
  var $datepicker = $('.js-date-picker');
  var $insertCalendarTextFrom = $('.js-calendar-text-from');
  var $insertCalendarTextTo = $('.js-calendar-text-to');
  var $insertCalendarTextAlone = $('.js-calendar-text-alone');
  var $themeDropdown = $('.js-theme-dropdown');

  var $datesInputResult =  $('.js-dates-input');
  var $datesInputResult_1 = $('.js-dates-input-1');
  var $datesInputResult_2 = $('.js-dates-input-2');

  var $calcSection = $('.js-calc-section');
  var $calendarFaq = $('.js-calendar-faq');
  var $selectInputNextShow = $('.js-select-next-show-input');
  var $buttonAmount = $('.js-amount-button');
  var $checkboxHoverBlock = $('.js-checkbox-hover');
  var $checkboxFaqPopup = $('.js-checkbox-faq-popup');
  var $amountsPeople = $('.js-amount');
  var $calcDescProtection = $('.js-calc-desc-protection');
  var $calcDescCall = $('.js-calc-show-desc');
  var $sectionCalc = $('.js-section-calc');
  var $checkBoxCallMobilePopup = $('.js-checkbox-text-box-call');
  var $checkBoxCloseMobilePopup = $('.js-checkbox-text-box-close');
  var $checkBoxTextPopup = $('.js-checkbox-text');

  var $calcForm = $('.js-calc');
  var $formFieldForChangeStatus = $('.js-change-calc-status');
  var $calcResultAll = $('.js-calc-result-blocks');
  var $calcResultSum = $('.js-calc-result-sum');
  var $calcResultTopText = $('.js-calc-result-top-text');

  var $dropdownCity = $('.js-dropdown-city');
  var $dropDownPricesBox = $('.js-dropdown-prices-box');

  var $calcPromoResult = $('.js-call-promo-popup');

  var windowHeight = $(window).height();
  var windowWidth = $(window).width();
  var THEME_SINGLE = 'single';
  var THEME_RANGE = 'range';
  var THEME = THEME_RANGE;
  var ZERO_AMOUNT_TEXT = 'нет';
  var WORLD_WORDS = 'миру';
  var DATA_RUS = 'russia';
  var MAGIC_LEFT_PADDING_FAQ_CHECKBOX = 30;
  var targetTextCity = '';

  /**
   * position checkbox faq popup
   */
  function checkBoxFaqLeftPos() {
    if (windowWidth > 1600)
      MAGIC_LEFT_PADDING_FAQ_CHECKBOX = 0;

    var calcPost = $calcForm[0].getBoundingClientRect();
    var needLeft = parseInt(calcPost.left + calcPost.width + MAGIC_LEFT_PADDING_FAQ_CHECKBOX);
    $checkboxFaqPopup.css('left', needLeft+'px');
  }
  checkBoxFaqLeftPos();

  /**
   * function for back result sum
   */
  resultBack = function (data, promoVal) {

    var result = {
      "annualPolicy": 0,
      "insuranceProgram": 0,
      "insuranceTerritory": 0,
      "babes": 0,
      "adultsAndChildren": 1,
      "old": 0,
      "dayCount": 0,
      "optionSport": 0
    };

    Object.keys(data).map(function (t) {
      var val = data[t].value;
      var name = data[t].name;
      if (/^\d+$/.test(val)) {
        val = parseInt(val);
      }
      if (val === 'нет') {
        val = 0;
      }
      if (val !== '') {
        result[name] = val;
      }
    });

    if (result['annualPolicy'] === 0) {
      if (!result['dates1'] || !result['dates2']) {
        return;
      }
      result['dayCount'] = days_between(new Date(result['dates1']), new Date(result['dates2']));
    } else if (result['annualPolicy'] === 1) {
      result['annualPolicyType'] = 0;
    }

    if (result['dopSport']) {
      result['optionSport'] = 1;
    }

    //console.log(result);

    showSuccess(1232, promoVal);

    return;

    result['_csrf'] = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
      url: $calcForm.attr('action'),
      method: "POST",
      data: result,
      dataType: "JSON",
      success: function (data) {
        data.result == 'ok' ? showSuccess(data.price, promoVal) : showErrorForm();
      },
      error: function () {
        showErrorForm();
      }
    });
  };

  /**
   * error send form
   */
  function showErrorForm(){
    console.log('ooops');
  }

  /**
   * check for inputs need not empty
   * if empty remove Calculated class and set def price
   */
  $('input', $calcForm).on('keyup paste change', function () {
    var sendStatus = true;

    $formFieldForChangeStatus.each(function () {
      if ($(this).val() == '')
        sendStatus = false;
    });
    if (!sendStatus && $calcResultAll.hasClass('calculated')){
      $calcResultAll.removeClass('calculated');
      $calcResultTopText.html('Полис за 7 минут');
      $calcResultSum.html('75');
    }
  });

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
   * calculator travel result
   */
  initResultcalcsChanges = function () {
    var peopleAmount = 0;
    var days = 0;
    var whereTravel = 'зарубеж';
    var timeText = '';

    // get people amount
    $amountsPeople.each(function () {
      if ($(this).val() != ZERO_AMOUNT_TEXT){
        peopleAmount = peopleAmount + parseInt($(this).val());
      }
    });

    //place of travel
    if (!targetTextCity.includes(WORLD_WORDS)){
      whereTravel = targetTextCity;
    }

    // get days amount
    if (THEME == THEME_SINGLE){
      days = 90
    } else {
      var from = $insertCalendarTextFrom.html().split(' ')[1].split('/');
      var to = $insertCalendarTextTo.html().split(' ')[1].split('/');

      var fromDate = new Date (from[2], from[1], from[0]);
      var toDate = new Date (to[2], to[1], to[0]);
      days = days_between(fromDate, toDate) + 1;
    }

    var peopleWord = declension(peopleAmount, 'человека', 'людей', 'людей');
    var ends = declensionAdj(peopleAmount, '-го', '-x');
    var daysWord = declension(days, 'день', 'дня', 'дней');
    if (days){
      timeText = 'на&nbsp;'+days+'&nbsp;'+daysWord
    } else {
      timeText = ''
    }


    $calcResultTopText.html('Полис <span>'+whereTravel+'</span><br/>'+timeText+'<span> за&nbsp;'+peopleAmount+ends+' '+peopleWord+'</span>');
  };

  /**
   * func to compare two dayts and return amount of days
   * @param date1
   * @param date2
   * @returns {number}
   */
  function days_between(date1, date2) {

    // The number of milliseconds in one day
    var ONE_DAY = 1000 * 60 * 60 * 24

    // Convert both dates to milliseconds
    var date1_ms = date1.getTime()
    var date2_ms = date2.getTime()

    // Calculate the difference in milliseconds
    var difference_ms = Math.abs(date1_ms - date2_ms)

    // Convert back to days and return
    return Math.round(difference_ms/ONE_DAY)

  }


  /**
   * call checkbox mobile popup
   */
  $checkBoxCallMobilePopup.on('click', function (e) {
    e.preventDefault();
    $body.addClass('overflow');
    $(this).closest($sectionCalc).addClass('z-index');
    $('.b-content').addClass('z-index');
    $(this).next($checkBoxTextPopup).removeClass('hidden');
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
   * show calc sum-price description
   */
  $calcDescCall.on('click', function (e) {
    e.preventDefault();
    if (!$calcDescProtection.hasClass('show')){
      $calcDescCall.text('Скрыть')
    } else {
      $calcDescCall.text('Что входит')
    }
    $calcDescProtection.toggleClass('show').slideToggle(250);
  });

  /**
   * show popup width text from checkbox hover
   */
  $checkboxHoverBlock.on('mouseenter', function () {
    if ($('.js-checkbox-text', $(this)).length){
      var text = $('.js-checkbox-text', $(this)).html();
      $checkboxFaqPopup.html(text).addClass('open');
    }
  }).on('mouseleave', function () {
    $checkboxFaqPopup.removeClass('open');
  });

  /**
   * show next step if frist step input date is full and next step not shown
   */
  $datesInputResult.on('change', function () {
    showNextStepEasy($(this));
  });

  /**
   * depends on select next show init
   */
  $selectInputNextShow.on('change', function () {
    showNextStepEasy($(this));
  });

  /**
   * common easy depends func for next show step
   */
  function showNextStepEasy($this) {
    var $thisSection = $this.closest($calcSection);
    if ($this.val() != '' && $thisSection.next($calcSection).hasClass('hidden')){
      $thisSection.addClass('passed');
      $thisSection.next($calcSection).removeClass('hidden');
    }
  }

  /**
   * amount button events
   */
  $buttonAmount.on('click', function (e) {
    e.preventDefault();
    var $thisAmountBox = $(this).closest('.js-amount-box');
    var $thisInput = $('.js-amount', $thisAmountBox);
    var currentValInput = $thisInput.val();
    var newVal = 0;

    // change world НЕТ from default value input to 0 for calculation
    if (currentValInput == ZERO_AMOUNT_TEXT){
      currentValInput = 0
    } else {
      currentValInput = parseInt(currentValInput);
    }
    // event + | -
    if ($(this).hasClass('b-amount-input__i_plus')){
      newVal = currentValInput+1;
    } else if ($(this).hasClass('b-amount-input__i_minus') && currentValInput != 0) {
      newVal = currentValInput-1;
    }
    // change set Val
    if (newVal == 0){
      $thisAmountBox.addClass('b-amount__box_zero');
      newVal = ZERO_AMOUNT_TEXT;
    } else {
      $thisAmountBox.removeClass('b-amount__box_zero');
    }

    $thisInput.val(newVal).trigger('change');
    noPeopleAmount();
  });


  /**
   * if all people amount 0 set 1 to adults by default
   */
  function noPeopleAmount() {
    var checkAmount = 0;
    $amountsPeople.each(function () {
      if ($(this).val() == ZERO_AMOUNT_TEXT){
        checkAmount++
      }
    });
    if (checkAmount >= 3){
      $('.js-amount-adult').val('1').trigger('change');
      $('.js-amount-adult').closest('.js-amount-box').removeClass('b-amount__box_zero');
    }
  }

  /**
   * change calc fields depends on ciuntries dropdown
   */
  $('.b-dropdown__item', $dropdownCity).on('click', function (e) {
    var targetVal = $(this).data('email');
    targetTextCity = $(this).html();
    var $thisBlockForShow = $('.b-dropdown[data-dropdown="'+targetVal+'"]', $dropDownPricesBox);
    $('.b-dropdown', $dropDownPricesBox).addClass('hidden').removeClass('b-dropdown_open first-open');
    $('.js-link-stop', $dropDownPricesBox).html('');
    $('.b-dropdown__sub li', $dropDownPricesBox).removeClass('hidden active');
    $thisBlockForShow.removeClass('hidden').addClass('b-dropdown_open first-open');
    $('.js-input-for-select', $dropDownPricesBox).val('').trigger('change');

    if (targetVal == DATA_RUS){
      $('.b-dropdown__item', $thisBlockForShow).eq(0).trigger('click');
    }
  });


  /**
   * change state of datapicker when choose theme
   */
  $('.b-dropdown__item', $themeDropdown).on('click', function (e) {
    e.preventDefault();
    THEME = $(this).attr('data-email');

    openDatapicker();

    if (THEME == THEME_SINGLE){
      $datepicker.datepick('clear');
      $datepicker.datepick('option',  {multiSelect: 0});
      $insertCalendarTextAlone.removeClass('hidden').addClass('active');
      $insertCalendarTextTo.addClass('hidden').removeClass('active').text('по дату');
      $insertCalendarTextFrom.addClass('hidden').addClass('active').text('c даты');
    } else {
      $datepicker.datepick('clear');
      $datepicker.datepick('option',  {multiSelect: 2});
      $insertCalendarTextAlone.addClass('hidden');
      $('span', $insertCalendarTextAlone).text('даты');
      $insertCalendarTextTo.removeClass('hidden');
      $insertCalendarTextFrom.removeClass('hidden');
    }
  });

  var localizeRUtoENMonth = {
    'Январь': 'January',
    'Февраль': 'February',
    'Март': 'March',
    'Апрель': 'April',
    'Май': 'May',
    'Июнь': 'June',
    'Июль': 'July',
    'Август': 'August',
    'Сентябрь': 'September',
    'Октябрь': 'October',
    'Ноябрь': 'November',
    'Декабрь': 'December'
  };

  /**
   * function reset datapicker and set last date if it smaller than first date
   * @param date
   */
  function resetDatapicker(date) {
    $datepicker.datepick('clear');
    $datepicker.datepick('setDate', date);
  }

  /**
   * after dirst period date set new on click
   */
  $(document).on('click', function (e) {
    var $target = $(e.target);

    if ($target.is('a') && $target.hasClass('datepick-highlight') && statusFull == true){
      var currentDay = $target.html();
      var topCal = $target.closest('table').prev('.datepick-month-header').html().split(' ');
      var currentMonth = localizeRUtoENMonth[topCal[0]];
      var currentYear = topCal[1];

      openDatapicker();
      statusFull = false;

      $datepicker.datepick('clear');
      $datepicker.datepick('setDate', new Date(currentDay+' '+currentMonth+' '+currentYear));
    }
  });

  /**
   * datapicker
   */
  var statusFull = false;

  $datepicker.datepick({
    // rangeSelect: true,
    changeMonth: false,
    changeYear: false,
    regionalOptions: ['ru'],
    minDate: 0,
    multiSelect: 2,
    onSelect: function(dates) {
      var firstDate = dates[0];
      var lastDate = dates[1];
      var dateFrom = $.datepick.formatDate('dd/mm/yyyy', dates[0]);
      $datesInputResult.val('').trigger('change');

      if (THEME == THEME_RANGE && firstDate){

        // because of didn't reset date after clear set second date from dates as first to our field
        if (firstDate >= lastDate)
          dateFrom = $.datepick.formatDate('dd/mm/yyyy', dates[1]);

        $insertCalendarTextFrom.text('c '+dateFrom).removeClass('active');
        $insertCalendarTextTo.addClass('active');

        if (lastDate && firstDate < lastDate){
          var dateTo = $.datepick.formatDate('dd/mm/yyyy', dates[1]);
          $insertCalendarTextTo.text('по '+dateTo);
          $datesInputResult_1.val($insertCalendarTextFrom.text().replace('c ', '')).trigger('change');
          $datesInputResult_2.val($insertCalendarTextTo.text().replace('по ', '')).trigger('change');
          closeDatapicker();


          // close dropdown theme if first select date and not choose theme
          if ($('.b-dropdown', $themeDropdown).hasClass('first-open')){
            var $thisDropDownItem = $('.b-dropdown__item[data-email="'+THEME_RANGE+'"]');

            $thisDropDownItem.addClass('hidden');
            $('.b-dropdown__text', $themeDropdown).html($thisDropDownItem.html());
            $('.js-input-for-select', $themeDropdown).val($thisDropDownItem.attr('data-value')).trigger('change');
            $('.b-dropdown', $themeDropdown).removeClass('first-open').removeClass('b-dropdown_open');
          }

        } else if (lastDate && firstDate >= lastDate){

          resetDatapicker(lastDate);

        } else {
          $insertCalendarTextTo.text('по дату');
        }

      } else if (THEME == THEME_SINGLE && firstDate){
        $('span', $insertCalendarTextAlone).text(dateFrom);
        $datesInputResult_1.val($('span', $insertCalendarTextAlone).text()).trigger('change');
        closeDatapicker();
      }
    },
    onShow: function(picker, inst) {

      var firstTitle = $.datepick.formatDate('D, M d', inst.selectedDates[0]);
      var firstAcriveTD = picker.find('a.datepick-selected[title="'+firstTitle+'"]').parent('td');
      firstAcriveTD.addClass('active-first-td');

      if (inst.selectedDates[0] != inst.selectedDates[1] && inst.selectedDates[1]){
        var lastTitle = $.datepick.formatDate('D, M d', inst.selectedDates[1]);
        var lastAcriveTD = picker.find('a.datepick-selected[title="'+lastTitle+'"]').parent('td');
        lastAcriveTD.addClass('active-last-td');
        picker.find('a.datepick-selected').parent('td').addClass('active-td');

        firstAcriveTD.closest('tr').addClass('first-active-row');
        lastAcriveTD.closest('tr').addClass('last-active-row');
        if (!$('.first-active-row').hasClass('last-active-row')){
          firstAcriveTD.closest('tr').nextUntil(lastAcriveTD.closest('tr')).addClass('active-row');
          lastAcriveTD.closest('tr').prevUntil(firstAcriveTD.closest('tr')).addClass('active-row');
        }

        // if month new and between active dates show as active
        if (inst.drawDate < inst.selectedDates[1] && inst.drawDate > inst.selectedDates[0] && picker.find('.first-active-row').length == 0 && picker.find('.last-active-row').length == 0){
          picker.find('.datepick-month tr').addClass('active-row');
        }

      } else if (inst.selectedDates.length == 0){
        picker.find('a.datepick-selected').removeClass('datepick-selected');
        picker.find('.first-active-row').removeClass('first-active-row');
        picker.find('.last-active-row').removeClass('last-active-row');
        picker.find('.active-row').removeClass('active-row');
      }
    }
  });

  /**
   * close datapicker if value and click not calendar
   */
  $(document).on('click', function (e) {
    var $target = $(e.target);
    if (!$target.is('.b-calendar__box *') && !$target.is('.datepick *') && $datesInputResult.val() != ''){
      closeDatapicker();
    }
  });

  /**
   * open datapicker on click result field
   */
  $insertCalendarText.on('click', function (e) {
    e.preventDefault();
    if (!$datepicker.is(':visible')) {
      openDatapicker();
    } else if ($datepicker.is(':visible') && $datesInputResult.val() != '') {
      closeDatapicker();
    }
  });

  /**
   * func close datapicker
   */
  function closeDatapicker() {
    $datepicker.addClass('hidden');
    $insertCalendarText.removeClass('open');
    $insertCalendarTextTo.removeClass('active');
    $insertCalendarTextAlone.removeClass('active')
    if (!$calendarFaq.hasClass('hidden')){
      $calendarFaq.addClass('hidden')
    }
  }

  /**
   * func open calendar
   */
  function openDatapicker() {

    if (!$datepicker.is(':visible')){
      $datepicker.removeClass('hidden');
      $insertCalendarText.addClass('open');
      $insertCalendarTextFrom.addClass('active');
      $insertCalendarTextAlone.addClass('active');
      if ($calendarFaq.hasClass('hidden')){
        $calendarFaq.removeClass('hidden')
      }
      statusFull = true;
    }
  }

  $(window).on('scroll', function () {
    
  });

  $(window).on('resize', function () {
    windowHeight = $(window).height();
    windowWidth = $(window).width();
    checkBoxFaqLeftPos();
    closeMobilePopup();
  });

});
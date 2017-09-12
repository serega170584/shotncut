$(function () {

  var $projects = $('.js-project');
  var $sortLink = $('.js-sort-link');
  var windowHeight = $(window).height();
  var windowWidth = $(window).width();
  var allSort = 'all';

  /**
   * set height to product's box
   */
  function productsHeight() {
    var heightProduct = 0;

    if (windowWidth > 1024) {
      heightProduct = parseInt($projects.width() * .7);
    } else if (windowWidth <=1024 && windowWidth > 767 ){
      heightProduct = parseInt($projects.width() * .7);
    } else if (windowWidth < 768 ){
      heightProduct = parseInt($projects.width() * .7);
    }
    $projects.css('height', heightProduct+'px');
  }
  productsHeight();

  /**
   * sorting
   */
  $sortLink.on('click', function (e) {
    e.preventDefault();

    if (!$(this).hasClass('active')){
      $sortLink.removeClass('active');
      $(this).addClass('active');
      $projects.addClass('hidden');
      var thisSort = $(this).attr('data-sort');

      if (thisSort != allSort){
        $projects.each(function () {
          var thisTypes = $(this).attr('data-project');
          if (thisTypes.indexOf(thisSort) >= 0)
            $(this).removeClass('hidden');
        })
      } else {
        $projects.removeClass('hidden');
      }
    }
  });


  $(window).on('resize', function () {
    windowHeight = $(window).height();
    windowWidth = $(window).width();
    productsHeight();
  });


});
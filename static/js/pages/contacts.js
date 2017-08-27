$(function(){

  var windowWidth = $(window).width();
  var $body = $('body');
  var myPoints = {
    'sbs': [55.72006896182018,37.628273228836065],
    'sbg':[55.72085686035579,37.61026381349177]
  };

  var myCenter = {
    'sbs': [55.72103787670517,37.626728276443494],
    'sbg': [55.721789798897355,37.608267243793634]
  };

  var myCenterMobile = {
    'sbs': [55.72274553042113,37.62873456878661],
    'sbg': [55.723696798697084,37.610574949737476]
  };

  $body.addClass('b-contact-page');

  ymaps.ready(function () {

    var myMap = new ymaps.Map('map', {
        center: (windowWidth >= 768) ? myCenter.sbs : myCenterMobile.sbs,
        zoom: 17,
        controls: []
      }, {
        searchControlProvider: 'yandex#search'
      }),
      clusterer = new ymaps.Clusterer(),
      getPointData = function (index) {
        return;
      },
      points = [
        myPoints.sbs
      ],
      geoObjects = [];

    myMap.controls.add(
      'zoomControl', {
        position: {
          top: 60,
          right: 20
        }
      }).add('geolocationControl', {
      position: {
        top: 20,
        right: 20
      }
    });

    for (var i = 0, len = points.length; i < len; i++) {
      geoObjects[i] = new ymaps.Placemark(
        points[i],
        getPointData(i),
        {
          iconLayout: 'default#imageWithContent',
          iconImageHref:'i/new/i-map-point.svg',
          iconImageSize: [57, 57],
          iconImageOffset: [-28, -28]
        }
      );
    }

    clusterer.add(geoObjects);
    myMap.behaviors.disable('scrollZoom');
    myMap.geoObjects.add(clusterer);

    /**
     * set new point on tabs click
     */
    $('.js-tabs').on('click', function () {
      var thisHref = $(this).attr('href');
      if (thisHref == '#tab1'){
        changePoint(myPoints.sbs);
        myMap.panTo((windowWidth >= 768) ? myCenter.sbs : myCenterMobile.sbs);
      } else {
        changePoint(myPoints.sbg);
        myMap.panTo((windowWidth >= 768) ? myCenter.sbg : myCenterMobile.sbg);
      }
    });

    /**
     * remove and set new geoObjects
     * @param points
     */
    function changePoint(points) {
      clusterer.remove(geoObjects);
      geoObjects = new ymaps.Placemark(
        points,
        getPointData(),
        {
          iconLayout: 'default#imageWithContent',
          iconImageHref:'i/new/i-map-point.svg',
          iconImageSize: [57, 57],
          iconImageOffset: [-28, -28]
        }
      );

      clusterer.add(geoObjects);
      myMap.behaviors.disable('scrollZoom');
      myMap.geoObjects.add(clusterer);
    }

  });

  $(window).on('resize', function () {
    windowWidth = $(window).width();
  });


});
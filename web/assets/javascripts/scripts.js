'use strict';

$(document).on('click', '.si-good-accordion__head', function (e) {
    //e.preventDefault();
    //e.stopPropagation();
    //
    //setTimeout(function(){
    //    $(this).parent().toggleClass('active');
    //}, 300);
});


var timer_top_menu_hover = false;
var shuffle_prod_init = false;

var first_news_is_list = false;
var padd;



// Событие открытие модала "Обратная связь"
var timer_feedbak = false;
var timer_feedbak_max = 30;
var timer_feedbak_i = 0;

function feedbak_on_show() {

    timer_feedbak_i = 0;
    clearInterval(timer_feedbak);

    timer_feedbak = setInterval(function() {

        clearInterval(timer_feedbak);
        $( document ).trigger("feedbakShow", ['1'] );

        timer_feedbak_i++;

        if (timer_feedbak_i > timer_feedbak_max) {
            clearInterval(timer_feedbak);
            timer_feedbak_i = 0;
        }
    }, 100);
}









var widget_feedbak_recaptcha;   // каптча в обратной связи
var recaptcha_ready = false;

//var verifyCallback = function(response) {
//    alert(response);
//};

var onloadCallback = function() {
    recaptcha_ready = true;
    $( document ).trigger("recaptcha_first_init", ['1'] );
};







function recaptcha_feedbak_render() {
    if (recaptcha_ready) {
        widget_feedbak_recaptcha = grecaptcha.render(document.getElementById('feedbak_recaptcha'), {
            'sitekey' : re_site_key
        });
    } else {
        $(document).on('recaptcha_first_init', function (e) {
            widget_feedbak_recaptcha = grecaptcha.render(document.getElementById('feedbak_recaptcha'), {
                'sitekey' : re_site_key
            });
        });
    }
}




var curr_vakans = false;



$(function () {

    // Новости шары
    if (share_news_id > 0) {
        if(show_news_item(share_news_id)) {
            $('#news-popup').removeClass('g-hidden');
            $('.si-layout__body').addClass('pp_hide');

            setTimeout(function () {
                if ($('.js__first_prod_menu_it[data-type="news"]').length) {
                    $('.js__first_prod_menu_it[data-type="news"]').trigger('click');
                }
            }, 1000);
        }
    }



    //var $rootScope = $('.si-footer-feedback__button');
    //
    //$rootScope.$on('ngDialog.opened', function (e, $dialog) {
    //    console.log('ngDialog opened: ' + $dialog.attr('id'));
    //});


    // setTimeout(function () {
    //     $('.js__resume').trigger('click');
    // }, 300);

    $(document).on('click', '.js__resume', function (e) {

        curr_vakans = $(this).data('vakans');

        // console.log($('.si-resume .inp__vakans').val());
    });







    $(document).on('click', '.lnk_upfile', function (e) {
        e.preventDefault();
        $('.upfile_inp').trigger('click');
    });





    $(document).on('change', '#chek_up_file', function (event, files, label) {

        var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');

        $('.js__resume_file_name_inn').text(file_name);

        if (file_name != '') {
            // $(this).closest('form').submit();
        }
    });







    // Отправка резюме
    $(document).on('submit', '#resume__form', function (e) {

        e.preventDefault();

        var form = $(this);
        var error = false;

        form.find('.si-input').removeClass('error');
        form.find('.inp__error_out').removeClass('show');
        form.find('.f_success').hide();

        var data = new FormData();

        data.append("file",                     $('#chek_up_file').get(0).files[0]);
        data.append("inp__vakans",              form.find('[name="inp__vakans"]').val());
        data.append("inp__company",             form.find('[name="inp__company"]').val());
        data.append("inp__fio",                 form.find('[name="inp__fio"]').val());
        data.append("inp__name",                form.find('[name="inp__name"]').val());
        data.append("inp__mname",               form.find('[name="inp__mname"]').val());
        data.append("inp__email",               form.find('[name="inp__email"]').val());
        data.append("inp__message",             form.find('[name="inp__message"]').val());
        data.append("g-recaptcha-response",     form.find('[name="g-recaptcha-response"]').val());


        if (!error) {
            $.ajax({
                type: 'POST',
                processData: false,
                contentType: false,
                url: '/ajax/resume',
                // data: form.serialize(),
                data: data,
                dataType: 'json',
                success: function (data) {

                    // console.log(data);

                    if(data.code == 200) {

                        form.find('.si-input').val('');
                        form.find('.f_success').slideDown(300);
                        form.find('.si-input').removeClass('error');
                        form.find('.inp__error_out').removeClass('show');
                        $('.js__si-feedbak__form-felds, .js__si-feedbak__form-felds_2').slideUp(300);

                    } else {

                        var errors = data.errors;
                        var err;

                        for(err in errors) {
                            form.find('.si-input[name="inp__'+err+'"]').addClass('error');
                            form.find('.inp__error_'+err).text(errors[err]);
                            form.find('.inp__error_'+err).closest('.inp__error_out').addClass('show');

                            if (err == 'recaptcha') {
                                grecaptcha.reset();
                            }
                        }
                    }
                }
            });
        }
        return false;
    });
    
    
    
    
    
    
    
    
    
    
    
    
    

    // схлопывание сегментов в продуктах
    $(document).on('click', '.si-good-accordion__head', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
    });



    $(".chosen-select").chosen({disable_search: true});

    $(document).on('feedbakShow', function (e) {
        console.log('feedbakShow');

        if ($('.ngdialog-theme-default .ngdialog-overlay').length > 0) {
            $('.ngdialog-theme-default .ngdialog-overlay').css('min-height', ($('.si-layout').outerHeight(true)*2)+'px');
        }


        // в разделе о компании в обратной связи установить селект компании
        var sel_comp = $('.js__about_navbar_sub .navbar__item .navbar__link_active');
        if (sel_comp.length) {
            sel_comp = sel_comp.parent().index()+1;
            $('.chosen-select[name="inp__company"] option[value="'+sel_comp+'"]').prop('selected', true);
        }


        $(".chosen-select").chosen({disable_search: true});







        if (curr_vakans && $('.si-resume .inp__vakans').length) {
            // console.log(curr_vakans);
            // console.log(sel_comp);
            $('.si-resume .inp__vakans').val(curr_vakans);
            $('.si-resume .inp__company').val(sel_comp);
        }



        //if ($('.si-feedbak-modal').length) {
            setTimeout(function() {
                recaptcha_feedbak_render();
            }, 100);
        //}

    });


    //feedbak_on_show();

    //$('.si-footer-feedback__button').trigger('click');

    //$('.js__request_lnk').trigger('click');


    $('.js__request_comp').on('click', function(e) {
        e.preventDefault();

        var comp = $(this).data('comp');

        $('#inp__company_email').val(comp);

        $('.request_step_1').stop().fadeOut(300);
        $('.request_step_2').stop().fadeIn(300);
        $('.js__request__prev').stop().animate({marginLeft: '0', opacity: 1}, 300);

    });

    $('.js__request__prev').on('click', function(e) {
        e.preventDefault();

        $('.request_step_2').stop().fadeOut(300);
        $('.request_step_1').stop().fadeIn(300);
        $('.js__request__prev').stop().animate({marginLeft: '-41px', opacity: 0}, 300);
        $('#inp__what_h').removeClass('error');
    });


    /*

        if (window.location.hash) {
            var t1 = window.location.hash.replace(/^#/, '');
            //console.log(t1);
            if (t1 == 'contact') {
                $('.js__footer_cont_popup').trigger('click');
                window.location.hash = '#';
            }
        }
    */


    $(document).on('click', '.si-header__logo', function (e) {
        document.location = $(this).attr('href');
    });


    $('.si-layout__header').css('right', scrollbarWidth());

    if ( $('.js-about-company-slider').length) {
        var aboutCompanySlider = new Swiper('.js-about-company-slider',
            {
                direction: 'horizontal',
                loop: false,
                simulateTouch: false,
                spaceBetween: 150,
                nextButton: '.js-about-company-right',
                prevButton: '.js-about-company-left',
                //buttonDisabledClass: '',
                onInit: function(swiper) {
                    $('.js-about-company-active').html(swiper.activeIndex + 1);
                    $('.js-about-company-slides').html(swiper.slides.length);
                },
                onSlideChangeStart: function(swiper) {
                    $('.js-about-company-active').html(swiper.activeIndex + 1);
                }
            }
        );
    }



    if ( $('.js-our-team-slider').length) {
        var ourTeamSlider = new Swiper('.js-our-team-slider', {
            direction: 'horizontal',
            loop: false,
            spaceBetween: 30,
            simulateTouch: false,
            paginationClickable: true,
            pagination: '.js-our-team-pagination',
            bulletClass: 'pagination-dot__page',
            bulletActiveClass: 'pagination-dot__page_active'
        });
    }



    if ( $('.js-history-slider').length) {
        var historySlider = new Swiper('.js-history-slider', {
            direction: 'horizontal',
            loop: false,
            simulateTouch: false,
            autoHeight: true,
            prevButton: '.js-history-controls-left',
            nextButton: '.js-history-controls-right',
            onInit: function (swiper) {
                $('.js-history-timeline').find('div').eq(swiper.activeIndex).addClass('timeline__point_active');
            },
            onSlideChangeStart: function (swiper) {
                $('.js-history-timeline').find('div').removeClass('timeline__point_active');
                $('.js-history-timeline').find('div').eq(swiper.activeIndex).addClass('timeline__point_active');
            }
        });
    }




    $('.js__inp_phone').mask('+7 (999) 999-99-99');

    $(document).on('focus', '.js__inp_phone_din', function (e) {
        $(this).mask('+7 (999) 999-99-99').removeClass('js__inp_phone_din');
    });






    //accordion btn
    $('.js-accordeon-title').on('click', function() {
        if ($(this).parent('.js-accordeon').hasClass('_active'))
            $(this).parent('.js-accordeon').removeClass('_active');
        else
            $(this).parent('.js-accordeon').addClass('_active');
    });


    // Обратная связь
    $(document).on('submit', '#feedbak__form', function (e) {

        e.preventDefault();

        var form = $(this);
        var error = false;

        form.find('.si-input').removeClass('error');
        form.find('.inp__error_out').removeClass('show');
        form.find('.f_success').hide();

        if (!error) {
            $.ajax({
                type: 'POST',
                url: '/ajax/feedback',
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {
                    //console.log(data);

                    if(data.code == 200) {

                        form.find('.si-input').val('');
                        form.find('.f_success').slideDown(300);
                        form.find('.si-input').removeClass('error');
                        form.find('.inp__error_out').removeClass('show');
                        $('.js__si-feedbak__form-felds, .js__si-feedbak__form-felds_2').slideUp(300);

                    } else {

                        var errors = data.errors;
                        var err;

                        for(err in errors) {
                            form.find('.si-input[name="inp__'+err+'"]').addClass('error');
                            form.find('.inp__error_'+err).text(errors[err]);
                            form.find('.inp__error_'+err).closest('.inp__error_out').addClass('show');

                            if (err == 'recaptcha') {
                                grecaptcha.reset();
                            }
                        }

                    }
                }
            });
        }
        return false;
    });





    // Перезвонить
    $(document).on('submit', '.js__good-declare__form', function (e) {

        e.preventDefault();

        var form = $(this);
        var error = false;

        form.find('.sb-input').removeClass('error');
        form.find('.f_success').hide();

        if (!error) {
            $.ajax({
                type: 'POST',
                url: '/ajax/callback_prod',
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {

                    //console.log(data);

                    if(data.code == 200) {

                        form.find('.sb-input').val('');
                        form.find('.sb-input').removeClass('error');
                        form.find('.f_success').slideDown(300);

                    } else {

                        var errors = data.errors;
                        var err;

                        for(err in errors) {
                            form.find('.sb-input[name="inp__'+err+'"]').addClass('error');
                        }
                    }
                }
            });
        }
        return false;
    });


    // Заявка на получение выплаты - Что произошло
    $(document).on('click', '.js__request_next', function (e) {

        $('.js__request__form .f_success').removeClass('show');

        var inp_what = $('#inp__what_h');
        var inp_what_val = replace_space(inp_what.val());
        inp_what.val(inp_what_val);
        $('#inp__what').val(inp_what_val);

        inp_what.removeClass('error');

        if (inp_what_val == '') {
            inp_what.addClass('error');
            $('.si-request__close').trigger('click');
        }
        $('.js__si-request__slide_1, .js__si-request__slide_2').show();
    });


    // Заявка на получение выплаты
    $(document).on('submit', '.js__request__form', function (e) {

        e.preventDefault();

        var form = $(this);
        var error = false;

        form.find('.si-input').removeClass('error');
        form.find('.inp__error').hide();
        form.find('.f_success').removeClass('show');

        TweenMax.to(".si-layout", .75, { y: $(".si-menu").outerHeight(), ease: Power4.easeOut });
        TweenMax.to(".si-layout__backdrop", .75, {opacity: 1, display: "block", ease: Power4.easeOut});

        if (!error) {
            $.ajax({
                type: 'POST',
                url: '/ajax/request_form',
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {

                    //console.log(data);

                    if(data.code == 200) {

                        form.find('.si-input').val('');
                        $('#inp__what_h, #inp__what').val('');
                        form.find('.f_success').addClass('show');
                        $('.js__si-request__slide_1, .js__si-request__slide_2').hide();

                        $('.request_step_1').show();
                        $('.request_step_2').hide();

                        TweenMax.to(".si-layout", .75, { y: $(".si-menu").outerHeight(), ease: Power4.easeOut });
                        TweenMax.to(".si-layout__backdrop", .75, {opacity: 1, display: "block", ease: Power4.easeOut});

                    } else {

                        var errors = data.errors;
                        var err;

                        for(err in errors) {

                            form.find('.si-input[name="inp__'+err+'"]').addClass('error');
                            form.find('.inp__error_'+err).text(errors[err]);
                            form.find('.inp__error_'+err).show();

                            TweenMax.to(".si-layout", .75, { y: $(".si-menu").outerHeight(), ease: Power4.easeOut });
                            TweenMax.to(".si-layout__backdrop", .75, {opacity: 1, display: "block", ease: Power4.easeOut});
                        }
                    }
                }
            });
        }
        return false;
    });


    // Расширение верхнего меню
    $('.si-menu-navigation__link').hover(
        function() {
            clearTimeout(timer_top_menu_hover);

            timer_top_menu_hover = setTimeout(
                function () {
                    TweenMax.to(".si-layout", .75, { y: $(".si-menu").outerHeight(), ease: Power4.easeOut });
                }, 100
            );
        },
        function() {}
    );


    $(document).on('click', '.product-video-button', function (e) {
        e.preventDefault();

        $('.b-video-popup').removeClass('g-hidden');
        $('.si-layout__body').addClass('pp_hide');

        $('#youtubevideo').html('<iframe src="'+ $(this).attr('video_url') +'?rel=0&amp;controls=1" frameborder="0" allowfullscreen></iframe>');

    });




    /*********** NEWS ***********/

    $(document).on('click', '.js__ajax_view', function (e) {
        e.preventDefault();

        var news_id = $(this).data('id');

        if(show_news_item(news_id)) {
            $('#news-popup').removeClass('g-hidden');
            $('.si-layout__body').addClass('pp_hide');
        }
    });



    $(document).on('click', '.js__prev_news, .js__next_news', function (e) {
        e.preventDefault();
        var news_id = $(this).data('id');
        show_news_item(news_id);
    });



    /*********** VIDEO ***********/
    $(document).on('click', '.js__view_video', function (e) {
        e.preventDefault();

        //console.log('sdadasd');

        var vid_id = $(this).data('id');

        if(show_video_item(vid_id)) {
            $('#video-popup').removeClass('g-hidden');
            $('.si-layout__body').addClass('pp_hide');
        }
    });





    $('.b-popup-closer-background, .b-popup-controls-close-button').on('click', function(event){
        $(this).closest('.b-popup').addClass('g-hidden');
        $('.si-layout__body').removeClass('pp_hide');
        if ($('#youtubevideo').length) {
            $('#youtubevideo').html('');
        }
        if ($('#video-popup').length) {
            $('.js__vid_media').html('');
        }
        event.preventDefault();
    });


    // меню продуктов
    $(document).on('click', '.js__first_prod_menu_it', function (e) {
        e.preventDefault();

        var prod_outer = $('.js__prod_outer');
        var $container = $('.si-isotope__container');

        $container.isotope({
            transitionDuration: 400
        });

        prod_curr_sect = $(this).data('type');
        $('.js__prod_item.hide').removeClass('hide');


        $('.js__first_prod_menu_sub, .js__first_prod_menu_sub_2, .js__first_video_menu').hide();

        $('.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a').removeClass('si-tag-button_active');
        $('.js__first_video_menu a').removeClass('si-tag-button_active');
        $('.js__first_nw_menu_outer a').removeClass('si-tag-button_active');

        $('.js__first_prod_menu_sub_2 a[data-cat="all"]').addClass('si-tag-button_active');
        $('.js__first_video_menu a[data-cat="all"]').addClass('si-tag-button_active');


        if ($(this).data('type') == 'news') {

            $('.js__first_prod_menu_sub_nw').show();

            $('.news_list__header_filtr').stop().fadeIn(200);

            $('#news_toggle_date').MonthPicker('Clear');

            if(first_news_is_list) {
                prod_outer.addClass('list');
                $container.isotope({ sortBy: 'original-order' });
            }
        } else {

            $('.js__first_prod_menu_sub_nw').hide();

            $('.news_list__header_filtr').stop().fadeOut(200);

            if(first_news_is_list) {
                prod_outer.removeClass('list');
            }
        }


        if ($(this).data('type') == 'policy') {

            $('.js__first_prod_menu_sub, .js__first_prod_menu_sub_2').show();

        } else if ($(this).data('type') == 'video') {

            $('.js__first_video_menu').show();

        }

        if ($(this).data('type') == 'all') {

            prodShuffle();
            prod_outer_resize_init();

        } else {

            $('.js__prod_more').hide();
            $('.js__prod_outer').height('auto');
            prodUnShuffle();
        }
    });



    $(document).on('click', '.js__prod_more', function (e) {
        e.preventDefault();

        prod_curr_page++;

        prod_outer_resize(false);

    });



    // todo удалить
    // подразделы продуктов
/*

    $(document).on('click', '.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a', function (e) {
        e.preventDefault();

        //console.log($(this).data('cat'));

        var menu_outer = $(this).closest('.js__first_prod_menu_outer');

        //$('.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a').removeClass('si-tag-button_active');
        menu_outer.find('a').removeClass('si-tag-button_active');
        //$(this).addClass('si-tag-button_active');

        var sel_cat = $('.js__first_prod_menu_sub a.si-tag-button_active').data('cat');
        var sel_cat2 = $('.js__first_prod_menu_sub_2 a.si-tag-button_active').data('cat');

        var prod_outer = $('.js__prod_outer');
        var prod_items_all = prod_outer.find('.js__prod_item');
        var prod_items = prod_items_all.filter('.type_policy');

        prod_items_all.removeClass('iss_show');

        if ((sel_cat == 'all') && (sel_cat2 == 'all')) {

            prod_items.addClass('iss_show');//.show();

        } else {

            prod_items.removeClass('iss_show');//.hide();

            if (sel_cat == 'all') {

                prod_items.filter('[data-cat]').filter('[data-cat2="' + sel_cat2 + '"]').addClass('iss_show');//.show();

            } else if (sel_cat2 == 'all') {


                $('.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a').removeClass('si-tag-button_active');
                prod_items.addClass('iss_show');

                if (sel_cat) {
                    prod_items.filter('[data-cat2]').filter('[data-cat="' + sel_cat + '"]').addClass('iss_show');//.show();
                } else {
                    prod_items.addClass('iss_show');
                }

            } else {
                if (sel_cat && sel_cat2) {
                    prod_items.filter('[data-cat2="' + sel_cat2 + '"]').filter('[data-cat="' + sel_cat + '"]').addClass('iss_show');//.show();
                } else if (sel_cat) {
                    prod_items.filter('[data-cat="' + sel_cat + '"]').addClass('iss_show');
                } else if (sel_cat2) {
                    prod_items.filter('[data-cat2="' + sel_cat2 + '"]').addClass('iss_show');//.show();
                }
            }
        }

        $(this).addClass('si-tag-button_active');

        //$('.js__first_prod_menu_it[data-type="policy"]').trigger('click');

        var $container = $('.si-isotope__container');

        $container.isotope({ filter: '.iss_show' });

        //$container.isotope('layout');
        //$container.isotope('reloadItems');
        //setTimeout( function() {
        //    $container.isotope('reloadItems')
        //    $container.isotope('layout');
        //}, 1000 );

    });

*/


    // подразделы продуктов
    $(document).on('click', '.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a', function (e) {
        e.preventDefault();

        var menu_outer = $(this).closest('.js__first_prod_menu_outer');

        menu_outer.find('a').removeClass('si-tag-button_active');
        $(this).addClass('si-tag-button_active');


        if ($('.js__first_prod_menu_sub_2 a.si-tag-button_active').data('cat') == 'all') {
            $('.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a').removeClass('si-tag-button_active');
            $(this).addClass('si-tag-button_active');
        }

        var sel_cat = $('.js__first_prod_menu_sub a.si-tag-button_active').data('cat');
        var sel_cat2 = $('.js__first_prod_menu_sub_2 a.si-tag-button_active').data('cat');


        var prod_outer = $('.js__prod_outer');
        var prod_items_all = prod_outer.find('.js__prod_item');
        var prod_items = prod_items_all.filter('.type_policy');

        prod_items_all.removeClass('iss_show');

        if (sel_cat2 == 'all') {

            prod_items.addClass('iss_show');

        } else {

            $('.js__first_prod_menu_sub_2 a[data-cat="all"]').removeClass('si-tag-button_active');

            if (sel_cat && sel_cat2) {
                prod_items.filter('[data-cat2="' + sel_cat2 + '"]').filter('[data-cat="' + sel_cat + '"]').addClass('iss_show');
            } else if (sel_cat) {
                prod_items.filter('[data-cat="' + sel_cat + '"]').addClass('iss_show');
            } else if (sel_cat2) {
                prod_items.filter('[data-cat2="' + sel_cat2 + '"]').addClass('iss_show');
            }
        }

        var $container = $('.si-isotope__container');
        $container.isotope({ filter: '.iss_show' });
    });





    if ($('.js_news_tooltip').length) {

        $('.js_news_tooltip').tooltip({
            delay: { show: 400, hide: 200 },
            trigger: 'hover',
            placement: 'top'
        });
    }








    // новости фильтр по компании
    $(document).on('click', '.js__first_nw_menu_outer a', function (e) {
        e.preventDefault();

        var nw_menu_outer = $(this).closest('.js__first_nw_menu_outer');

        nw_menu_outer.find('a').removeClass('si-tag-button_active');
        $(this).addClass('si-tag-button_active');

        news_filtr_date_comp();

    });



    // Новости переключить на список
    $('.js_news_toggle_view a').on('click', function(event){

        $('.js_news_toggle_view a').removeClass('active');

        $(this).addClass('active');

        event.preventDefault();



        first_news_is_list = ($(this).index()!=0);

        if ($('.first_prod_menu .js__first_prod_menu_it.si-tag-button_active').data('type') != 'news') {
            return;
        }


        var $container = $('.si-isotope__container');
        var prod_outer = $('.js__prod_outer');

        if(!first_news_is_list) {

            prod_outer.removeClass('list');

            $container.isotope({
                transitionDuration: 400
            });
            setTimeout( function() {
                $container.isotope({ sortBy: 'original-order'});
            }, 10 );

        } else {

            prod_outer.addClass('list');

            $container.isotope({
                transitionDuration: 0
            });
            setTimeout( function() {
                // $container.isotope('layout');
                $container.isotope({ sortBy: 'original-order' });
            }, 10 );

        }
    });



    if ($('#news_toggle_date').length) {

        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: '&#x3c;Пред',
            nextText: 'След&#x3e;',
            currentText: 'Сегодня',
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthNamesShort: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
            dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            weekHeader: 'Нед',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);




        $('#news_toggle_date').MonthPicker({
            MonthFormat: 'MM / yy',
            Position: {
                my: 'left top+9',
                at: 'left-123 bottom',
                collision: 'none'
            },
            i18n: {
                year: '&nbsp;',
                prevYear: 'Предыдущий год',
                nextYear: 'Следующий год',
                jumpYears: 'Выбрать год',
                backTo: 'Назад к',
                months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
            },
            Button: '<button type="button" class="ui-datepicker-trigger"></button>',
            OnBeforeMenuOpen: function(){
                $('.js_toggle_date').addClass('active');
                news_month_picker_pos();
            },
            OnAfterMenuOpen: function(){
                news_month_picker_pos();
            },
            OnBeforeMenuClose: function(){
                $('.js_toggle_date').removeClass('active');
            }, 
            OnAfterMenuClose: function(){

                // console.log($('#news_toggle_date').MonthPicker('GetSelectedMonthYear'));
                // console.log($('#news_toggle_date').MonthPicker('GetSelectedYear'));
                // console.log($('#news_toggle_date').MonthPicker('GetSelectedMonth'));

                if ($('#news_toggle_date').MonthPicker('GetSelectedMonth')) {
                    news_filtr_date_comp();
                }

            }
        });


        $(window).resize(function() {

            if (first_news_is_list
                    && ($('.first_prod_menu .js__first_prod_menu_it.si-tag-button_active').data('type') == 'news')) {

                var $container = $('.si-isotope__container');
                $container.isotope({
                    transitionDuration: 0
                });
            }



            news_month_picker_pos();
            //$('#news_toggle_date').MonthPicker('Close');
        });
    }




    window.onresize = function() {
        clearTimeout(timer_prod_outer_resize);
        timer_prod_outer_resize = setTimeout(function() {
            prod_outer_resize_init();
        }, 500);


        if ($('.si-layout__backdrop').is(':visible')) {

            clearTimeout(timer_top_menu_hover);

            timer_top_menu_hover = setTimeout(
                function () {
                    TweenMax.to(".si-layout", .75, { y: $(".si-menu").outerHeight(), ease: Power4.easeOut });
                }, 300
            );
        }

        if ($('.ngdialog-theme-default .ngdialog-overlay').length > 0) {
            $('.ngdialog-theme-default .ngdialog-overlay').css('min-height', ($('.si-layout').outerHeight(true)*2)+'px');
        }

    };


/*

    $(document).on('click', '.js__first_prod_menu_sub_2 a', function (e) {
        e.preventDefault();

        //console.log($(this).data('cat'));

        $('.js__first_prod_menu_sub a, .js__first_prod_menu_sub_2 a').removeClass('si-tag-button_active');
        $(this).addClass('si-tag-button_active');


        var sel_cat = $(this).data('cat');
        var prod_outer = $('.js__prod_outer');
        var prod_items = prod_outer.find('.js__prod_item.type_policy');

        if (sel_cat == 'all') {
            prod_items.show();
        } else {
            prod_items.hide();
            prod_items.filter('[data-cat2="' + sel_cat + '"]').show();
        }
        $('.js__first_prod_menu_it[data-type="policy"]').trigger('click');

    });

*/



    // фильтр видео
    $(document).on('click', '.js__first_video_menu a', function (e) {
        e.preventDefault();

        $('.js__first_video_menu a').removeClass('si-tag-button_active');
        $(this).addClass('si-tag-button_active');

        var sel_cat = $(this).data('cat');

        //console.log(sel_cat);

        var prod_outer = $('.js__prod_outer');
        var prod_items_all = prod_outer.find('.js__prod_item');
        var prod_items = prod_items_all.filter('.type_video');

        prod_items_all.removeClass('iss_show');

        if (sel_cat == 'all') {
            prod_items.addClass('iss_show');//.show();
        } else {
            prod_items.removeClass('iss_show');//.hide();
            prod_items.filter('[data-videocat="'+sel_cat+'"]').addClass('iss_show');//.show();
        }

        //$('.js__first_prod_menu_it[data-type="video"]').trigger('click');

        var $container = $('.si-isotope__container');
        $container.isotope({ filter: '.iss_show' });
        //$container.isotope('layout');
    });



    //setTimeout(function() {
    //    $('.si-header__logo').unbind();
    //}, 500);




    // О компании - команда, подменю
/*

    $(document).on('click', '.js__about_navbar_sub a.link', function (e) {
        e.preventDefault();

        var num_el = $(this).parent().index();

        $('.js__about_navbar_sub a.link').removeClass('navbar__link_active');
        $(this).addClass('navbar__link_active');


        $('.js__about_navbar_sub_cont .accordion-list').removeClass('active');
        $('.js__about_navbar_sub_cont .accordion-list:nth-of-type('+(num_el+1)+')').addClass('active');

    });


*/


    if($("[data-map]").length) {
        initializeMaps();
    }
});





function news_filtr_date_comp() {

        var prod_outer = $('.js__prod_outer');
        var prod_items_all = prod_outer.find('.js__prod_item');
        var prod_items = prod_items_all.filter('.type_news');

        prod_items.removeClass('iss_show');

        if ($('#news_toggle_date').MonthPicker('GetSelectedMonth')) {
            prod_items = prod_items.filter('[data-pub-y="'+$('#news_toggle_date').MonthPicker('GetSelectedYear')+'"]');
            prod_items = prod_items.filter('[data-pub-m="'+$('#news_toggle_date').MonthPicker('GetSelectedMonth')+'"]');
        }

        var sel_comp = $('.js__first_nw_menu_outer a.si-tag-button_active');

        if (sel_comp.length > 0) {
            prod_items = prod_items.filter('[data-nwcomp="'+sel_comp.data('nwcomp')+'"]');
        }

        prod_items.addClass('iss_show');

        var $container = $('.si-isotope__container');
        $container.isotope({
            transitionDuration: 400
        });
        $container.isotope({ filter: '.iss_show' });
}




// Показать новость
function show_news_item(news_id) {

    var news_list   = $('.news_hidden_content');

    if ( news_list.find('.news_item[data-id="'+news_id+'"]').length == 0 ) {
        return false;
    }
    var news_popup  = $('#news-popup');
    var news_item = news_list.find('.news_item[data-id='+news_id+']');
    news_popup.data('id', news_id).attr('data-id', news_id);


    news_popup.find('.js__nw_title').html(news_item.find('.news_item__title').html());
    news_popup.find('.text').html(news_item.find('.news_item__detail_text').html());
    news_popup.find('.date').html(news_item.find('.news_item__date').html());
    news_popup.find('.company').html(news_item.find('.news_item__company').html());

    if (news_item.find('.detailThumbUrl').length > 0) {
        var im_big = news_item.find('.detailThumbUrl');
        news_popup.find('.article_im').removeClass('no_im').css({'background-image': 'url(\''+im_big.attr('src')+'\')'});
        news_popup.find('.b-popup-controls').removeClass('no_im');
    } else {
        news_popup.find('.article_im').addClass('no_im').css({'background-image': 'none'});
        news_popup.find('.b-popup-controls').addClass('no_im');
    }

    var homeurl = $('.homeurl').data('url');
    news_popup.find('.article_im .soc .links').html('<script' +
        ' src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>' +
        '<script src="//yastatic.net/share2/share.js" async="async"></script>' +
        '<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki" ' +
            ' data-title="'+news_item.find('.news_item__title').text()+'" ' +
            ' data-description="'+news_item.find('.news_item__preview_text2').text()+'" ' +
            ' data-url="'+homeurl+'/?news='+news_id+'" ' +
            ((news_item.find('.detailThumbUrl').length > 0)?' data-image="'+homeurl+im_big.attr('src')+'">':'')+
        '</div>');
    

    var news_prev = news_item.prev('.news_item');
    var news_next = news_item.next('.news_item');

    if (news_prev.length) {
        $('.js__prev_news').css('display','inline-block').data('id', news_prev.data('id'));
    } else {
        $('.js__prev_news').hide();
    }

    if (news_next.length) {
        $('.js__next_news').css('display','inline-block').data('id', news_next.data('id'));
    } else {
        $('.js__next_news').hide();
    }
    return true;
}




function show_video_item(vid_id) {

    var news_list   = $('.videos_hidden_content');
    //console.log(vid_id);
    if ( news_list.find('.news_item[data-id="'+vid_id+'"]').length == 0 ) {
        return false;
    }

    var news_popup  = $('#video-popup');
    var news_item = news_list.find('.news_item[data-id='+vid_id+']');
    news_popup.data('id', vid_id).attr('data-id', vid_id);


    news_popup.find('.js__nw_title').html(news_item.find('.news_item__title').html());
    news_popup.find('.js__nw_cat').html(news_item.find('.news_item__cat').html());

    var video_code = news_item.find('.news_item__preview_text').html();
    var video_media = '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+video_code+'" frameborder="0" allowfullscreen></iframe>';
    var img_prew_src = 'http://img.youtube.com/vi/'+video_code+'/maxresdefault.jpg';

    news_popup.find('.js__vid_media').html(video_media);
    news_popup.find('.js__vid_img').attr('src', img_prew_src);

    news_popup.find('.text').html(news_item.find('.news_item__detail_text').html());
    //news_popup.find('.date').html(news_item.find('.news_item__date').html());


    return true;
}






function replace_space(v) {
    var reg_sp = /^\s+/g;
    v = v.replace(reg_sp, '');
    var reg_sp = /\s+$/g;
    v = v.replace(reg_sp, '');
    return v;
}







var about_map_pos;
var about_map_zoom;
var about_map_addr;


/* Map */
var maps = {};
var mapsProperties = {

    "contacts": {

        containerID: "yamap",
        activeItemClass: "b-locations-article-current-link",
        center: about_map_pos,
        zoom: about_map_zoom,
        points: {
            "general": {

                position: about_map_pos,
                contents: about_map_addr,
                icon: {
                    preset: "twirl#darkgreenDotIcon"
                },
                balloon: '<div class="b-map-balloon"><span class="b-map-balloon-contents">$[properties.contents]</span></div>'
            }
        }
    }
};

function initializeMaps() {

    $("[data-map]").each(function() {

        var mapID = generateIdentificator();
        var mapDescriptor = ($(this).attr("data-map-descriptor") ? $(this).attr("data-map-descriptor") : "");

        maps[mapID] = {

            map: $(this),
            descriptor: mapDescriptor,
            currentPoint: null,
            entity: null,
            points: (mapsProperties[mapDescriptor] ? mapsProperties[mapDescriptor].points : {}),
            properties: (mapsProperties[mapDescriptor] ? mapsProperties[mapDescriptor] : {})
        }

        maps[mapID].map.attr("data-map-identificator", mapID);

        ymaps.ready( function() {

            maps[mapID].entity = new ymaps.Map(maps[mapID].properties.containerID, {
                center: maps[mapID].properties.center,
                zoom: maps[mapID].properties.zoom,
                behaviors: ['default', 'scrollZoom']
            });
            /*maps[mapID].entity.controls.add('zoomControl');*/

            $.each(maps[mapID].properties.points, function( index, value ) {

                var BalloonContentLayout = ymaps.templateLayoutFactory.createClass(value.balloon);

                maps[mapID].points[index].mapEntity = new ymaps.Placemark( value.position, {
                        contents: value.contents
                    }, $.extend( {}, {
                        balloonLayout: BalloonContentLayout,
                        balloonShadow: false
                    }, value.icon)
                );

            });

            $.each(maps[mapID].points, function( index, value ) {
                maps[mapID].entity.geoObjects.add(value.mapEntity);
            });
        });

        $('[data-map-point][data-map-descriptor="' + mapDescriptor + '"]').click( function() {

            var pointDescriptor = $(this).data('map-point-descriptor');

            if ($("[data-map-container][data-map-container-descriptor='" + pointDescriptor + "']").length > 0)
                maps[mapID].map.appendTo( $("[data-map-container][data-map-container-descriptor='" + pointDescriptor + "']") );

            maps[mapID].entity.setCenter(maps[mapID].points[pointDescriptor].position);
            maps[mapID].points[pointDescriptor].mapEntity.balloon.open();
            $(this).selectPoint(mapID);
        });

    });

}

(function( $ ) {
    $.fn.selectPoint = function (mapID) {

        var selectedPoint = this;
        $('[data-map-point][data-map-descriptor="' + maps[mapID].descriptor + '"]').each( function() {

            if ($(this).is(selectedPoint))
                $(this).addClass(maps[mapID].properties.activeItemClass);
            else
                $(this).removeClass(maps[mapID].properties.activeItemClass);
        })
    }
})(jQuery);



var identificators = {};

function generateIdentificator() {

    var identificator = '';
    var identificatorLength = 10;
    var charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charsetLength = charset.length;

    for (var i = 0; identificatorLength > i; i += 1) {

        var charIndex = Math.random() * charsetLength;
        identificator += charset.charAt(charIndex);
    }

    identificator = identificator.toLowerCase();

    if (identificators[identificator])
        return generateIdentificator();

    identificators[identificator] = true;

    return identificator;
}



function scrollbarWidth() {
    var block = $('<div>').css({'height':'50px','width':'50px', 'visibility': 'hidden'}),
        indicator = $('<div>').css({'height':'200px'});

    $('body').append(block.append(indicator));
    var w1 = $('div', block).innerWidth();
    block.css('overflow-y', 'scroll');
    var w2 = $('div', block).innerWidth();
    $(block).remove();
    return (w1 - w2);
}




// открытие закрытие меню
var timer_simenu_is_first_act = false;
var simenu_is_first_act = false;

$(document).on('click', 'a.js__menu_toggle_oth', function (e) {
    simenu_is_first_act = false;
});

$('.si-header__toggle').on('click', 'a.js__menu_toggle', function (e) {

    if ($('.si-layout__backdrop').is(':visible') && simenu_is_first_act) {
        TweenMax.to('.si-layout', .75, {
            y: 0,
            ease: Power4.easeOut
        });

        TweenMax.to('.si-layout__backdrop', .75, {
            opacity: 0,
            display: 'none',
            ease: Power4.easeOut
        });
    }

    clearTimeout(timer_simenu_is_first_act);

    timer_simenu_is_first_act = setTimeout(function() { simenu_is_first_act = true; }, 100);
});


var prod_curr_page = 1;
var prod_num_row_on_page = 3;
var prod_curr_sect = 'all';
var prod_show_all = false;
var timer_prod_outer_resize = false;
var timer_2 = false;



function prod_outer_resize_init() {

    clearTimeout(timer_prod_outer_resize);

    timer_prod_outer_resize = setTimeout(function() {
        prod_outer_resize();
    }, 500);
}





function prod_outer_resize() {

    if ($('.js__prod_outer').length == 0) {
        return;
    }

    var wrap = $('.js__prod_outer');
    var inner_wrap = wrap.find('.si-isotope__container');
    var inner_wrap_hg = inner_wrap.height();
    var res_hg = 0;

    var prod_item = $('.js__prod_item');
    var prod_item_policy = prod_item.filter('.type_policy:visible').first();
    var prod_item_policy_hg = prod_item_policy.outerHeight(true);

    prod_item.removeClass('hide');

    if ((prod_curr_sect != 'all') || prod_show_all) {
        wrap.height('auto');
        $('.js__prod_more').hide();
        return;
    }

    res_hg = prod_item_policy_hg * (prod_curr_page * prod_num_row_on_page);


    var wrap_top = wrap.offset().top + res_hg;
    var max_offset_bott = wrap_top;

    prod_item.each(function() {
        var item_offset_bott = $(this).offset().top + $(this).outerHeight(true);
        if (item_offset_bott > max_offset_bott) {
            max_offset_bott = item_offset_bott;
        }
    });

    var max_hg = max_offset_bott-wrap.offset().top;

    if (((res_hg + 50) > max_hg) ) {

        res_hg = max_hg;
        wrap.height(res_hg);

        clearTimeout(timer_2);

        timer_2 = setTimeout(function() {
            wrap.height('auto');
        }, 300);

        $('.js__prod_more').hide();
        prod_show_all = true;

        return;

    } else {
        $('.js__prod_more').show();
    }

    wrap.height(res_hg);

    wrap_top = wrap.offset().top+res_hg;

    max_offset_bott = 0;

    prod_item.each(function() {

        var item_offset_bott = $(this).offset().top + $(this).outerHeight(true);

        if (item_offset_bott > (wrap_top+50)) {
            $(this).addClass('hide');
        } else {
            if (item_offset_bott > max_offset_bott) {
                max_offset_bott = item_offset_bott;
            }
            $(this).removeClass('hide');
        }
    });

    if (max_offset_bott < wrap_top) {
        res_hg = max_offset_bott-wrap.offset().top;
        wrap.height(res_hg);
    }
}





// перемешать материалы на главной
function prodShuffleInit() {

    if (shuffle_prod_init) {
        return;
    }
    var $container = $('.si-isotope__container');
    $container.isotope('shuffle');
    shuffle_prod_init = true;

    clearTimeout(timer_prod_outer_resize);
    timer_prod_outer_resize = setTimeout(function() {
        prod_outer_resize_init();
    }, 500);

}



// перемешать материалы на главной
function prodShuffle() {
    var $container = $('.si-isotope__container');
    $container.isotope('shuffle');
    shuffle_prod_init = true;

    prod_outer_resize_init();
}



// вернуть начальную сортировку материалов на главной
function prodUnShuffle() {
    var $container = $('.si-isotope__container');
    $container.isotope({ sortBy: 'original-order' });
}



function news_month_picker_pos() {
    // return;
    // padd = ( $('.news__header_menu_mob__select-field').is(':visible')? -2 : 12);
    padd = 12;
    //console.log(padd);
    var inp = $('#news_toggle_date');
    var month_picker = $('#MonthPicker_news_toggle_date');

    var pos_top = inp.offset().top + inp.outerHeight() + $('.si-layout__container').scrollTop() + 6;
    var pos_left = $('.news_list__header_filtr').offset().left + padd;

    setTimeout(function() {
        month_picker.css({ 'top': pos_top+'px', 'left': pos_left+'px' });
        month_picker.width(($('.news_list__header_filtr').outerWidth() - padd-2));
    }, 10);
}
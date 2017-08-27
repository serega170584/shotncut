$(document).ready(function(){
    $('.js_fam_tabs_links a').on('click', function(event) {

        if (!$(this).hasClass('active')) {

            var wrap = $(this).closest('.js_fam_tabs_wrap');

            if (wrap.hasClass('proceed')) {
                return;
            }

            var el_nm = $(this).parent().index();

            wrap.find('.js_fam_tabs_links a').removeClass('active');
            $(this).addClass('active');

            var hg1 = wrap.find('.js_fam_tab.active').outerHeight();
            var hg2 = wrap.find('.js_fam_tab:nth-child('+(el_nm+1)+')').outerHeight();

            wrap.find('.js_fam_tabs').height(hg1);
            wrap.addClass('proceed');

            wrap.find('.js_fam_tab.active').stop().fadeOut(200, function() {});

            wrap.find('.js_fam_tab:nth-child('+(el_nm+1)+')').stop().fadeIn(200, function() {

                wrap.find('.js_fam_tabs').stop().animate({'height': hg2}, 200, function () {
                    wrap.removeClass('proceed');
                });

                wrap.find('.js_fam_tab').removeClass('active');
                $(this).addClass('active');
            });
        }
        event.preventDefault();
    });
});
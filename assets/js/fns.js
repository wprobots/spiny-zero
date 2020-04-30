
jQuery(document).ready(function ($) {
    $('.post_gallery').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    var caption = item.el.attr('title');
                    if( caption !== '' ) {
                        caption += '<br>';
                    }
                    return caption;
                }
            }
        });
    });
});
jQuery(document).on('touch click', '.spiny_main_nav_mobile_btn', function () {
    jQuery('nav').addClass('open');
    jQuery('body').addClass('overflow_hidden');
});
jQuery(document).on('touch click', '.spiny_main_nav_mobile_close', function () {
    jQuery('nav').removeClass('open');
    jQuery('body').removeClass('overflow_hidden');
});



// jQuery(document).on('click touch','.search_link', function () {
//     jQuery('.header_search_form').fadeIn(250);
//
//     return false;
// });
// jQuery(document).on('click touch','.search_close', function () {
//     jQuery('.header_search_form').fadeOut(250);
//
//     return false;
// });


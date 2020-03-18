jQuery(function( $ ) {

    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( newVal ) {
            if( ! newVal ) {
                newVal = '';
            }
            $( '.site-title a, .site-description' ).css( {color: newVal} );
        });
    });

    wp.customize( 'spiny_header_bg_color', function( value ) {
        value.bind( function( newVal ) {
            if( ! newVal ) {
                newVal = '';
                $( '.spiny_header_bg_color' ).remove();
            }
            $( '.page_header header' ).css( {background: newVal} );
        });
    });

    wp.customize( 'spiny_font_color', function( value ) {
        value.bind( function( newVal ) {
            if( ! newVal ) {
                newVal = '';
                $( '.spiny_font_color' ).remove();
            }
            $( '.page_container, .page_container a, .page_footer, .page_footer a' ).css( {color: newVal} );
        });
    });

    wp.customize( 'spiny_title_font_color', function( value ) {
        value.bind( function( newVal ) {
            var $headers = $( '.page_container :header, .page_container :header a, .post_title a' );
            var $footer_headers = $( '.page_footer :header, .page_footer :header a' );

            if( ! newVal ) {
                newVal = '';
                $( '.spiny_title_font_color' ).remove();
            }

            $headers.css( {color: newVal} );
            $footer_headers.css( {color: newVal} );
        });
    });

    // настройка
    wp.customize( 'spiny_sidebar', function( value ) {
        value.bind( function( newVal ) {
            var val = parseInt(newVal);
            if( isNaN(val) ) {
                val = 0;
            }

            if( val === 1 ) {
                $('.sidebar_position_1').show();
                $('.sidebar_position_2').hide();
            }
            else if( val === 2 ) {
                $('.sidebar_position_1').hide();
                $('.sidebar_position_2').show();
            }
            else {
                $('.sidebar_position_1').hide();
                $('.sidebar_position_2').hide();
            }
        } );
    });


    wp.customize( 'spiny_copyright', function( value ) {
        value.bind( function( newVal ) {
            if( newVal !== '' ) {
                $( '.copy' ).text( newVal );
            }
            else {
                var default_copy = $( '.copy_default' ).html();
                $( '.copy' ).html( default_copy );
            }
        });
    });

});
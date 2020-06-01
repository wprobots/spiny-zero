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

    wp.customize( 'spiny_top_header_bg_color', function( value ) {
        value.bind( function( newVal ) {
            if( ! newVal ) {
                newVal = '';
                $( '.spiny_top_header_bg_color' ).remove();
            }
            $( 'header .top_menu' ).css( {background: newVal} );
        });
    });
    wp.customize( 'spiny_top_header_font_color', function( value ) {
        value.bind( function( newVal ) {
            if( ! newVal ) {
                newVal = '';
                $( '.spiny_top_header_font_bg_color' ).remove();
            }
            $( 'header .top_menu, header .top_menu a' ).css( {color: newVal} );
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

    wp.customize( 'spiny_post_background', function( value ) {
        value.bind( function( newVal ) {
            if( ! newVal ) {
                newVal = '';
                $( '.spiny_post_background' ).remove();
            }
            $( '.post_container' ).css( {background: newVal} );
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
            var spiny_copyright_checkbox = wp.customize( 'spiny_copyright_checkbox' ).get();

            if( newVal !== '' && ! spiny_copyright_checkbox ) {
                $( '.copy' ).text( newVal );
            }
            else {
                var default_copy = $( '.copy_default' ).html();
                $( '.copy' ).html( default_copy );
            }
        });
    });
    wp.customize( 'spiny_copyright_checkbox', function( value ) {
        value.bind( function( newVal ) {
            var spiny_copyright = wp.customize( 'spiny_copyright' ).get();

            if( ! newVal && spiny_copyright !== '' ) {
                $( '.copy' ).text( spiny_copyright );
            }
            else {
                var default_copy = $( '.copy_default' ).html();
                $( '.copy' ).html( default_copy );
            }
        });
    });

    wp.customize( 'spiny_post_layout_comment', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.post .post_comments').show();
            }
            else {
                $('.post .post_comments').hide();
            }
        } );
    });
    wp.customize( 'spiny_post_layout_thumbnail', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.post .post_thumbnail').show();
            }
            else {
                $('.post .post_thumbnail').hide();
            }
        } );
    });
    wp.customize( 'spiny_post_layout_date', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.post .post_date').show();
            }
            else {
                $('.post .post_date').hide();
            }
        } );
    });
    wp.customize( 'spiny_post_layout_author', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.post .post_author').show();
            }
            else {
                $('.post .post_author').hide();
            }
        } );
    });

    wp.customize( 'spiny_page_layout_comment', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.page .post_comments').show();
            }
            else {
                $('.page .post_comments').hide();
            }
        } );
    });
    wp.customize( 'spiny_page_layout_thumbnail', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.page .post_thumbnail').show();
            }
            else {
                $('.page .post_thumbnail').hide();
            }
        } );
    });
    wp.customize( 'spiny_page_layout_date', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.page .post_date').show();
            }
            else {
                $('.page .post_date').hide();
            }
        } );
    });
    wp.customize( 'spiny_page_layout_author', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.page .post_author').show();
            }
            else {
                $('.page .post_author').hide();
            }
        } );
    });

    wp.customize( 'spiny_archive_layout_thumbnail', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.archive .post_thumbnail').show();
            }
            else {
                $('.archive .post_thumbnail').hide();
            }
        } );
    });
    wp.customize( 'spiny_archive_layout_date', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.archive .post_date').show();
            }
            else {
                $('.archive .post_date').hide();
            }
        } );
    });
    wp.customize( 'spiny_archive_layout_author', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.archive .post_author').show();
            }
            else {
                $('.archive .post_author').hide();
            }
        } );
    });
    wp.customize( 'spiny_archive_layout_category', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.archive .post_category').show();
            }
            else {
                $('.archive .post_category').hide();
            }
        } );
    });
    wp.customize( 'spiny_archive_layout_tag', function( value ) {
        value.bind( function( newVal ) {
            if( newVal ) {
                $('.archive .post_tag').show();
            }
            else {
                $('.archive .post_tag').hide();
            }
        } );
    });

});
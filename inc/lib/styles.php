<?php
/**
 * Enqueue scripts and styles.
 */
function spiny_scripts() {
    wp_enqueue_style(
        'spiny-css-normalize',
        get_template_directory_uri() . '/assets/css/normalize.css',
        false,
        filemtime(get_template_directory() . '/assets/css/normalize.css'),
        false
    );
    wp_enqueue_style(
        'spiny-css-milligram',
        get_template_directory_uri() . '/assets/css/milligram.min.css',
        false,
        filemtime(get_template_directory() . '/assets/css/milligram.min.css'),
        false
    );
    wp_enqueue_style(
        'spiny-css-magnific-popup',
        get_template_directory_uri() . '/assets/css/magnific-popup.css',
        false,
        filemtime(get_template_directory() . '/assets/css/magnific-popup.css'),
        false
    );
    wp_enqueue_style(
        'spiny-css-style',
        get_template_directory_uri() . '/style.css',
        false,
        filemtime(get_template_directory() . '/style.css'),
        false
    );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script(
        'spiny-js-magnific-popup',
        get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/jquery.magnific-popup.min.js'),
        true
    );
    wp_enqueue_script(
        'spiny-js-fns',
        get_template_directory_uri() . '/assets/js/fns.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/fns.js'),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'spiny_scripts' );


/**
 * Add meta-viewport for response layout
 */
function spiny_viewport_meta_tag() {
    echo '<meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1" />';
}
add_action( 'wp_head', 'spiny_viewport_meta_tag' );
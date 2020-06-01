<?php

/*
$string = file_get_contents(__DIR__ . "/posts.json");
$json_a = json_decode($string, true);

$i = 0;
foreach($json_a as $msg) {
    remove_filter('content_save_pre', 'wp_filter_post_kses');
    remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

    $post_data = array(
        'post_title'    => $msg['title'],
        'post_content'  => $msg['msg'],
        'post_date'     =>  date('Y-m-d H:i:s', $msg['date']),
        'post_status'   => 'publish',
        'post_author'   => 2,
    );
    $post_id = wp_insert_post( $post_data );

    add_filter('content_save_pre', 'wp_filter_post_kses');
    add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
    usleep( 250000 );
    print $i . ') ' . date('Y-m-d H:i:s', $msg['date']) . ' ' . $msg['title'] . '<br>';
    $i++;
}
//    print_r('<pre>');
//    print_r($json_a);

//    $posts = get_posts( array(
//        'numberposts' => -1,
//        'category'    => 0,
//        'orderby'     => 'date',
//        'order'       => 'DESC',
//        'include'     => array(),
//        'exclude'     => array(),
//        'meta_key'    => '',
//        'meta_value'  =>'',
//        'post_type'   => 'post',
//        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
//    ) );
//    foreach($posts as $post) {
//        wp_delete_post( $post->ID, true );
//    }

exit();
*/

/**
 * Default WP settings:
 * Theme setup
 * Content width
 * Register sidebar
 */
require_once get_template_directory() . '/inc/lib/default.php';

/**
 * Enqueue styles && scripts
 */
require_once get_template_directory() . '/inc/lib/styles.php';

/**
 * Gutenberg options
 */
require_once get_template_directory() . '/inc/lib/gutenberg.php';

/**
 * Enable svg support
 */
require_once get_template_directory() . '/inc/lib/svg.php';

/**
 * Transform basic gallery to magnific popup gallery
 */
require_once get_template_directory() . '/inc/lib/gallery.php';

/**
 * Enable excerpt functions
 */
require_once get_template_directory() . '/inc/lib/excerpt.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require_once get_template_directory() . '/inc/jetpack.php';
}

/**
 * Include default hooks
 */
require_once get_template_directory() . '/inc/hooks/header-hooks.php';
require_once get_template_directory() . '/inc/hooks/loop-hooks.php';
require_once get_template_directory() . '/inc/hooks/page-hooks.php';
require_once get_template_directory() . '/inc/hooks/post-hooks.php';


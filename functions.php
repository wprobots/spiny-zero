<?php
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




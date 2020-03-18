<?php
/**
 * Default WP settings:
 * Theme setup
 * Content width
 * Register sidebar
 */
require get_template_directory() . '/inc/lib/default.php';

/**
 * Enqueue styles && scripts
 */
require get_template_directory() . '/inc/lib/styles.php';

/**
 * Enable svg support
 */
require get_template_directory() . '/inc/lib/svg.php';

/**
 * Enable excerpt functions
 */
require get_template_directory() . '/inc/lib/excerpt.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}




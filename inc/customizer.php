<?php
/**
 * spiny-zero Theme Customizer
 *
 * @package spiny-zero
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spiny_customize_register( $wp_customize ) {
    $transport = 'postMessage';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'spiny_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'spiny_customize_partial_blogdescription',
		) );
	}

    /**
     * Add settings:
     * Copyright
     */
    $wp_customize->add_setting(
        'spiny_copyright',
        array(
            'default'           => '',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_text_sanitizer'
        )
    );

    /**
     * Add controls:
     * Copyright
     */
    $wp_customize->add_control(
        'spiny_copyright',
        array(
            'label'    => __( 'Copyright', 'spiny' ),
            'section'  => 'title_tagline',
            'settings' => 'spiny_copyright'
        )
    );

	/**
     * Add settings:
     * Header background color
     * Site font color
     * Titles font color
     */
    $wp_customize->add_setting(
        'spiny_header_bg_color',
        array(
            'default'           => '',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_color_sanitizer'
        )
    );
    $wp_customize->add_setting(
        'spiny_font_color',
        array(
            'default'           => '',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_color_sanitizer'
        )
    );
    $wp_customize->add_setting(
        'spiny_title_font_color',
        array(
            'default'           => '',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_color_sanitizer'
        )
    );

    /**
     * Add controls:
     * Header background color
     * Site font color
     * Titles font color
     */
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'spiny_header_bg_color', array(
                'label'    => __( 'Header background color', 'spiny' ),
                'section'  => 'colors',
                'settings' => 'spiny_header_bg_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'spiny_font_color', array(
                'label'    => __( 'Font color', 'spiny' ),
                'section'  => 'colors',
                'settings' => 'spiny_font_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'spiny_title_font_color', array(
                'label'    => __( 'Titles font color', 'spiny' ),
                'section'  => 'colors',
                'settings' => 'spiny_title_font_color'
            )
        )
    );

    /**
     * Add section:
     * Left Sidebar for archive.php, index.php, search.php
     * Right Sidebar for archive.php, index.php, search.php
     * No Sidebar for archive.php, index.php, search.php
     */
    $wp_customize->add_section( 'spiny_section_sidebar' , array( 'title' => __( 'Sidebar', 'spiny' ), 'priority' => 81 ) );

    /**
     * Add settings:
     * Sidebar
     */
    $wp_customize->add_setting(
        'spiny_sidebar',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    /**
     * Add controls:
     * Copyright
     */
    $wp_customize->add_control(
        'spiny_sidebar',
        array(
            'label'    => __( 'Sidebar position', 'spiny' ),
            'section'  => 'spiny_section_sidebar',
            'settings' => 'spiny_sidebar',
            'type'     => 'select',
            'choices'  => [
                '0' => __( 'No sidebar', 'spiny' ),
                '1' => __( 'Right sidebar', 'spiny' ),
                '2' => __( 'Left sidebar', 'spiny' )
            ]
        )
    );
}
add_action( 'customize_register', 'spiny_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function spiny_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function spiny_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spiny_customize_preview_js() {
	wp_enqueue_script(
	    'spiny-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true
    );
}
add_action( 'customize_preview_init', 'spiny_customize_preview_js' );


function spiny_color_sanitizer( $val ) {
    return sanitize_hex_color( $val );
}
function spiny_text_sanitizer( $val ) {
    return sanitize_text_field( $val );
}



function spiny_customizer_css() {
//    global $themelog_subset;
//
//    $extra_font_styles = get_option( 'extra_font_styles', 'No' );
//
//    if ( $extra_font_styles == 'Yes' ) {
//        $font_styles = ':300,400,600,700,800,900,300italic,400italic,600italic,700italic,800italic,900italic';
//    }
//    else {
//        $font_styles = ':300,400,300italic,400italic';
//    }
//
//    $setting_header_main_font = get_theme_mod( 'setting_header_main_font', "" );
//    if ( $setting_header_main_font != "" ) {
//        echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' . $setting_header_main_font . $font_styles . $themelog_subset . '">';
//    }
//    $setting_heading_font = get_theme_mod( 'setting_heading_font', "" );
//    if ( $setting_heading_font != "" ) {
//        echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' . $setting_heading_font . $font_styles . $themelog_subset . '">';
//    }
//    $setting_text_font = get_theme_mod( 'setting_text_font', "" );
//    if ( $setting_text_font != "" ) {
//        echo '<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=' . $setting_text_font . $font_styles . $themelog_subset . '">';
//    }

    /**
     * Controls:
     * Header background color
     * Site font color
     * Titles font color
     */

    // spiny_header_bg_color
    // spiny_font_color
    // spiny_title_font_color

    $spiny_header_bg_color  = get_theme_mod('spiny_header_bg_color');
    $spiny_font_color       = get_theme_mod('spiny_font_color');
    $spiny_title_font_color = get_theme_mod('spiny_title_font_color');
    ?>
    <style type="text/css" class="spiny_header_bg_color">
        <?php
        if( $spiny_header_bg_color && !empty($spiny_header_bg_color) ) {
            ?>
            .page_header header {
                background: <?php echo $spiny_header_bg_color; ?>
            }
            <?php
        }
        ?>
    </style>
    <style type="text/css" class="spiny_font_color">
        <?php
        if( $spiny_font_color && !empty($spiny_font_color) ) {
            ?>
            .page_container,
            .page_container a,
            .page_footer,
            .page_footer a {
                color: <?php echo $spiny_font_color; ?>
            }
            <?php
        }
        ?>
    </style>
    <style type="text/css" class="spiny_title_font_color">
        <?php
        if( $spiny_title_font_color && !empty($spiny_title_font_color) ) {
            ?>
            .page_container h1,
            .page_container h2,
            .page_container h3,
            .page_container h4,
            .page_container h5,
            .page_container h6,
            .page_container h1 a,
            .page_container h2 a,
            .page_container h3 a,
            .page_container h4 a,
            .page_container h5 a,
            .page_container h6 a,
            .post_title a,
            .page_footer h1,
            .page_footer h2,
            .page_footer h3,
            .page_footer h4,
            .page_footer h5,
            .page_footer h6,
            .page_footer h1 a,
            .page_footer h2 a,
            .page_footer h3 a,
            .page_footer h4 a,
            .page_footer h5 a,
            .page_footer h6 a {
                color: <?php echo $spiny_title_font_color; ?>
            }
            <?php
        }
        ?>
    </style>
    <?php
}
add_action( 'wp_head', 'spiny_customizer_css');

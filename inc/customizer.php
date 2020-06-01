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

    /**
     * Add custom scripts field
     */
    $wp_customize->add_section( 'spiny_section_scripts' , array( 'title' => __('Scripts', 'spiny'), 'priority' => 1000 ) );
    $wp_customize->add_setting(
        'spiny_scripts',
        array(
            'default'   => '',
            'transport' => $transport,
        )
    );
    $wp_customize->add_control(
        'spiny_scripts',
        array(
            'label'    => __('Insert scripts code', 'spiny'),
            'section'  => 'spiny_section_scripts',
            'settings' => 'spiny_scripts',
            'type'     => 'textarea'
        )
    );


    /**
     * Cusomize google fonts
     * Field for custom google font
     */
    $wp_customize->add_section( 'spiny_section_fonts' , array( 'title' => __('Fonts', 'spiny'), 'priority' => 70 ) );
    $wp_customize->add_setting(
        'spiny_fonts',
        array(
            'default'   => 'Roboto',
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_fonts_custom',
        array(
            'default'   => '',
            'transport' => $transport,
        )
    );
    $wp_customize->add_control(
        'spiny_fonts',
        array(
            'label'    => __('Select site font', 'spiny'),
            'section'  => 'spiny_section_fonts',
            'settings' => 'spiny_fonts',
            'type'     => 'select',
            'choices'  => [
                'Roboto' => 'Roboto',
                'Open+Sans' => 'Open Sans',
                'Montserrat' => 'Montserrat',
                '-1' => 'No google fonts',
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_fonts_custom',
        array(
            'label'    => __( 'Custom Google Fonts include', 'spiny' ),
            'description'    => __( 'Example: <br>&lt;link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet"&gt;', 'spiny' ),
            'section'  => 'spiny_section_fonts',
            'settings' => 'spiny_fonts_custom',
            'type'     => 'textarea',
        )
    );

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
     * Top Header background color
     * Top Header font color
     * Header background color
     * Site font color
     * Titles font color
     */
    $wp_customize->add_setting(
        'spiny_top_header_bg_color',
        array(
            'default'           => '#003b73',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_color_sanitizer'
        )
    );
    $wp_customize->add_setting(
        'spiny_top_header_font_color',
        array(
            'default'           => '#ffffff',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_color_sanitizer'
        )
    );
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
    $wp_customize->add_setting(
        'spiny_post_background',
        array(
            'default'           => '',
            'transport'         => $transport,
            'sanitize_callback' => 'spiny_color_sanitizer'
        )
    );

    /**
     * Add controls:
     * Top Header background color
     * Top Header font color
     * Header background color
     * Site font color
     * Titles font color
     */
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'spiny_top_header_bg_color', array(
                'label'    => __( 'Top Header background color', 'spiny' ),
                'section'  => 'colors',
                'settings' => 'spiny_top_header_bg_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'spiny_top_header_font_color', array(
                'label'    => __( 'Top Header font color', 'spiny' ),
                'section'  => 'colors',
                'settings' => 'spiny_top_header_font_color'
            )
        )
    );
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
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'spiny_post_background', array(
                'label'    => __( 'Post background', 'spiny' ),
                'section'  => 'colors',
                'settings' => 'spiny_post_background'
            )
        )
    );



    $wp_customize->add_panel('spiny_panel_layout', array(
        'title'=>'Layout',
        'description'=> 'Site layout settings',
        'priority'=> 80,
    ));


    /**
     * Add section:
     * Left Sidebar for archive.php, index.php, search.php
     * Right Sidebar for archive.php, index.php, search.php
     * No Sidebar for archive.php, index.php, search.php
     */
    $wp_customize->add_section( 'spiny_section_sidebar' , array( 'title' => __( 'Layout Settings', 'spiny' ), 'priority' => 81, 'panel' => 'spiny_panel_layout' ) );

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
     * Sidebar
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

    /**
     * Add settings:
     * Copyright checkbox
     */
    $wp_customize->add_setting(
        'spiny_copyright_checkbox',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );

    /**
     * Add controls:
     * Copyright checkbox
     */
    $wp_customize->add_control(
        'spiny_copyright_checkbox',
        array(
            'label'    => __( 'Disable footer credits', 'spiny' ),
            'section'  => 'spiny_section_sidebar',
            'settings' => 'spiny_copyright_checkbox',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );

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
            'label'    => __( 'Footer credits', 'spiny' ),
            'section'  => 'spiny_section_sidebar',
            'settings' => 'spiny_copyright',
            'type'     => 'textarea',
        )
    );


    /**
     * Add section:
     * Add section "Single post layout": Post layout settings
     */
    $wp_customize->add_section( 'spiny_section_post_layout' , array( 'title' => __( 'Single post layout', 'spiny' ), 'priority' => 82, 'panel' => 'spiny_panel_layout' ) );

    /**
     * Add controls:
     * Show post comments
     * Show post thumbnail
     * Show post date
     * Show post author
     */
    $wp_customize->add_setting(
        'spiny_post_layout_comment',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_post_layout_thumbnail',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_post_layout_date',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_post_layout_author',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );

    /**
     * Add controls:
     * Show post comments
     * Show post thumbnail
     * Show post date
     * Show post author
     */
    $wp_customize->add_control(
        'spiny_post_layout_comment',
        array(
            'label'    => __( 'Show comments', 'spiny' ),
            'section'  => 'spiny_section_post_layout',
            'settings' => 'spiny_post_layout_comment',
            'type'     => 'checkbox',
        )
    );
    $wp_customize->add_control(
        'spiny_post_layout_thumbnail',
        array(
            'label'    => __( 'Show thumbnail', 'spiny' ),
            'section'  => 'spiny_section_post_layout',
            'settings' => 'spiny_post_layout_thumbnail',
            'type'     => 'checkbox',
        )
    );
    $wp_customize->add_control(
        'spiny_post_layout_date',
        array(
            'label'    => __( 'Show date', 'spiny' ),
            'section'  => 'spiny_section_post_layout',
            'settings' => 'spiny_post_layout_date',
            'type'     => 'checkbox',
        )
    );
    $wp_customize->add_control(
        'spiny_post_layout_author',
        array(
            'label'    => __( 'Show author', 'spiny' ),
            'section'  => 'spiny_section_post_layout',
            'settings' => 'spiny_post_layout_author',
            'type'     => 'checkbox',
        )
    );


    /**
     * Add section:
     * Add section "Single page layout": Page layout settings
     */
    $wp_customize->add_section( 'spiny_section_page_layout' , array( 'title' => __( 'Single page layout', 'spiny' ), 'priority' => 83, 'panel' => 'spiny_panel_layout' ) );

    /**
     * Add controls:
     * Show page comments
     * Show page thumbnail
     * Show page date
     * Show page author
     */
    $wp_customize->add_setting(
        'spiny_page_layout_comment',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_page_layout_thumbnail',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_page_layout_date',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_page_layout_author',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );

    /**
     * Add controls:
     * Show page comments
     * Show page thumbnail
     * Show page date
     * Show page author
     */
    $wp_customize->add_control(
        'spiny_page_layout_comment',
        array(
            'label'    => __( 'Show comments', 'spiny' ),
            'section'  => 'spiny_section_page_layout',
            'settings' => 'spiny_page_layout_comment',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_page_layout_thumbnail',
        array(
            'label'    => __( 'Show thumbnail', 'spiny' ),
            'section'  => 'spiny_section_page_layout',
            'settings' => 'spiny_page_layout_thumbnail',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_page_layout_date',
        array(
            'label'    => __( 'Show date', 'spiny' ),
            'section'  => 'spiny_section_page_layout',
            'settings' => 'spiny_page_layout_date',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_page_layout_author',
        array(
            'label'    => __( 'Show author', 'spiny' ),
            'section'  => 'spiny_section_page_layout',
            'settings' => 'spiny_page_layout_author',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );



    /**
     * Add section:
     * Add section "Posts archive layout": Posts archive loop layout settings
     */
    $wp_customize->add_section( 'spiny_section_archive_layout' , array( 'title' => __( 'Posts archive layout', 'spiny' ), 'priority' => 84, 'panel' => 'spiny_panel_layout' ) );

    /**
     * Add controls:
     * Show archive posts thumbnail
     * Show archive posts date
     * Show archive posts author
     * Show archive posts category
     * Show archive posts tag
     */
    $wp_customize->add_setting(
        'spiny_archive_layout_thumbnail',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_archive_layout_date',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_archive_layout_author',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_archive_layout_category',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );
    $wp_customize->add_setting(
        'spiny_archive_layout_tag',
        array(
            'default'   => 0,
            'transport' => $transport,
        )
    );

    /**
     * Add controls:
     * Show archive posts thumbnail
     * Show archive posts date
     * Show archive posts author
     * Show archive posts category
     * Show archive posts tag
     */
    $wp_customize->add_control(
        'spiny_archive_layout_thumbnail',
        array(
            'label'    => __( 'Show thumbnail', 'spiny' ),
            'section'  => 'spiny_section_archive_layout',
            'settings' => 'spiny_archive_layout_thumbnail',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_archive_layout_date',
        array(
            'label'    => __( 'Show date', 'spiny' ),
            'section'  => 'spiny_section_archive_layout',
            'settings' => 'spiny_archive_layout_date',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_archive_layout_author',
        array(
            'label'    => __( 'Show author', 'spiny' ),
            'section'  => 'spiny_section_archive_layout',
            'settings' => 'spiny_archive_layout_author',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_archive_layout_category',
        array(
            'label'    => __( 'Show categories', 'spiny' ),
            'section'  => 'spiny_section_archive_layout',
            'settings' => 'spiny_archive_layout_category',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );
    $wp_customize->add_control(
        'spiny_archive_layout_tag',
        array(
            'label'    => __( 'Show tags', 'spiny' ),
            'section'  => 'spiny_section_archive_layout',
            'settings' => 'spiny_archive_layout_tag',
            'type'     => 'checkbox',
            'input_attrs'  => [
                'value' => 1
            ]
        )
    );

}
add_action( 'customize_register', 'spiny_customize_register', 10 );

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
     * Fonts
     */
    $spiny_fonts        = get_theme_mod('spiny_fonts');
    $spiny_fonts_custom = get_theme_mod('spiny_fonts_custom');
    ?>

    <?php
    if( empty($spiny_fonts_custom) ) {
        if( $spiny_fonts && (int)$spiny_fonts >= 0 ) {
            $spiny_fonts = str_replace('+', ' ', $spiny_fonts);
            ?>
            <style type="text/css" class="spiny_fonts">
                html,
                body,
                input,
                button,
                textarea {
                    font-family: '<?php echo $spiny_fonts; ?>', sans-serif;
                }
            </style>
            <?php
        }
        else {
            ?>
            <style type="text/css" class="spiny_fonts">
                html,
                body,
                input,
                button,
                textarea {
                    font-family: sans-serif;
                }
            </style>
            <?php
        }
    }
    ?>
    <?php

    /**
     * Controls:
     * Header background color
     * Site font color
     * Titles font color
     */
    $spiny_top_header_bg_color   = get_theme_mod('spiny_top_header_bg_color');
    $spiny_top_header_font_color = get_theme_mod('spiny_top_header_font_color');
    $spiny_header_bg_color       = get_theme_mod('spiny_header_bg_color');
    $spiny_font_color            = get_theme_mod('spiny_font_color');
    $spiny_title_font_color      = get_theme_mod('spiny_title_font_color');
    $spiny_post_background       = get_theme_mod('spiny_post_background');
    ?>

    <?php
    if( $spiny_top_header_bg_color && !empty($spiny_top_header_bg_color) ) {
        ?>
        <style type="text/css" class="spiny_top_header_bg_color">
        header .top_menu {
            background: <?php echo $spiny_top_header_bg_color; ?>
        }
        </style>
        <?php
    }
    ?>

    <?php
    if( $spiny_top_header_font_color && !empty($spiny_top_header_font_color) ) {
        ?>
        <style type="text/css" class="spiny_top_header_font_color">
        header .top_menu, header .top_menu a {
            color: <?php echo $spiny_top_header_font_color; ?>
        }
        </style>
        <?php
    }
    ?>

    <?php
    if( $spiny_header_bg_color && !empty($spiny_header_bg_color) ) {
        ?>
        <style type="text/css" class="spiny_header_bg_color">
        .page_header header {
            background: <?php echo $spiny_header_bg_color; ?>
        }
        </style>
        <?php
    }
    ?>

    <?php
    if( $spiny_font_color && !empty($spiny_font_color) ) {
        ?>
        <style type="text/css" class="spiny_font_color">
        .page_container,
        .page_container a,
        .page_footer,
        .page_footer a {
            color: <?php echo $spiny_font_color; ?>
        }
        </style>
        <?php
    }
    ?>

    <?php
    if( $spiny_title_font_color && !empty($spiny_title_font_color) ) {
        ?>
        <style type="text/css" class="spiny_title_font_color">
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
        </style>
        <?php
    }
    ?>

    <?php
    if( $spiny_post_background && !empty($spiny_post_background) ) {
        ?>
        <style type="text/css" class="spiny_post_background">
        .post_container {
            background: <?php echo $spiny_post_background; ?>
        }
        </style>
        <?php
    }
    ?>
    <?php
}
add_action( 'wp_head', 'spiny_customizer_css' );

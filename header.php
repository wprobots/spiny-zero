<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <?php
    /**
     * Include google fonts from customizer
     * Priority for custom user font include
     */
    $spiny_fonts_custom = get_theme_mod('spiny_fonts_custom');
    if( ! empty ($spiny_fonts_custom) ) {
        echo $spiny_fonts_custom;
    }
    else {
        $spiny_fonts = get_theme_mod('spiny_fonts');
        if( $spiny_fonts && (int)$spiny_fonts >= 0 ) {
            ?>
            <link href="https://fonts.googleapis.com/css2?family=<?php echo $spiny_fonts; ?>:wght@400;700&display=swap" rel="stylesheet">
            <?php
        }
    }
    ?>

    <?php wp_head(); ?>

    <?php
    if( function_exists('is_amp_endpoint') && is_amp_endpoint() ) {
        ?>
        <script async custom-element="amp-mega-menu" src="https://cdn.ampproject.org/v0/amp-mega-menu-0.1.js"></script>
        <?php
    }
    ?>

    <?php
    $spiny_scripts = get_theme_mod('spiny_scripts');
    if( $spiny_scripts && ! empty($spiny_scripts) ) {
        echo $spiny_scripts;
    }
    ?>
</head>
<body <?php body_class(); ?>>
<div class="layout">
    <div class="page_header">
        <?php
        /**
         * Custom header image
         */
        $header_image = get_header_image();
        if($header_image) {
            ?>
            <div class="container">
                <img src="<?php echo $header_image; ?>" alt="<?php echo get_bloginfo('title'); ?>">
            </div>
            <?php
        }
        ?>

        <header>
            <?php
            do_action('spiny_header_additional_header');
            ?>
            <div class="container">
                <div class="header_cols">
                    <div class="header_col1">
                        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );

                        if( (int)$custom_logo_id === 0 ) {
                            ?>
                            <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                            <?php
                            $spiny_zero_description = get_bloginfo( 'description', 'display' );
                            if ( $spiny_zero_description || is_customize_preview() ) :
                                ?>
                                <div class="site-description"><?php echo $spiny_zero_description; ?></div>
                            <?php
                            endif;
                        }
                        else {
                            the_custom_logo();
                        }
                        ?>
                    </div>
                    <div class="header_col2">
                        <nav class="spiny_main_nav">
                            <div class="spiny_main_nav_mobile_btn"></div>
                            <div class="spiny_main_nav_mobile_close"></div>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'header',
                                'menu'            => 'header',
                                'container'       => false,
                                'menu_class'      => 'spiny_main_nav_list',
                                'echo'            => true,
                            ) );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="page_container">
        <section>
            <?php
            if( ! is_front_page() ) {
                do_action('spiny_breadcrumbs');
            }
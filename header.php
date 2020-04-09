<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <?php wp_head(); ?>
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
            <div class="header_search_form" style="display: none;">
                <div class="container">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="top_menu">
                <div class="container">
                    <div class="row ">
                        <div class="column">
                            <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'top',
                                'menu'            => 'top',
                                'container'       => false,
                                'menu_class'      => 'spiny_top_nav',
                                'echo'            => true,
                            ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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
                // TODO. Breadcrumbs
            }
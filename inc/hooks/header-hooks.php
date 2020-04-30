<?php
/**
 * Header search form
 */
add_filter('spiny_header_searchform', 'spiny_header_searchform', 10);
function spiny_header_searchform() {
    ?>
    <div class="header_search_form" style="display: none;">
        <div class="container">
            <?php get_search_form(); ?>
        </div>
    </div>
    <?php
}


/**
 * Header additional
 */
add_filter('spiny_header_additional_header', 'spiny_header_additional_header', 10);
function spiny_header_additional_header() {
    ?>
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
    <?php
}

<?php

/**
 * Header additional
 */
add_filter('spiny_header_additional_header', 'spiny_header_additional_header', 10);
function spiny_header_additional_header() {
    $menu = wp_nav_menu( array(
        'theme_location'  => 'top',
        'menu'            => 'top',
        'container'       => false,
        'menu_class'      => 'spiny_top_nav',
        'echo'            => false,
        'fallback_cb' => '__return_false',
    ) );

    if( ! empty( $menu ) ) {
        ?>
        <div class="top_menu">
            <div class="container">
                <div class="row ">
                    <div class="column">
                        <?php echo $menu; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

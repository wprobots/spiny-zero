<?php
global $wp_customize;

$spiny_sidebar = get_theme_mod('spiny_sidebar');
?>
<div class="container<?php echo ( (int)$spiny_sidebar === 1 || (int)$spiny_sidebar === 2 ) ? ' spiny-sidebar' : ''; ?>">

    <div class="row">
        <?php
        if ( isset( $wp_customize ) ) {
            /**
             * Left sidebar in customizer
             */
            get_sidebar( 'customizer-left');
        }
        else {
            if( (int)$spiny_sidebar === 2 ) {
                get_sidebar();
            }
        }
        ?>
        
        <div class="column">
            <?php
            if( have_posts() ) {
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'inc/grid/single', '' );
                endwhile; // End of the loop.
            }
            else {
                echo __( 'Post without content', 'spiny' );
            }
            ?>
        </div>

        <?php
        if ( isset( $wp_customize ) ) {
            /**
             * Right sidebar in customizer
             */
            get_sidebar( 'customizer-right');
        }
        else {
            if( (int)$spiny_sidebar === 1 ) {
                get_sidebar();
            }
        }
        ?>
    </div>

</div>
<div class="container">

    <div class="row">
        <?php
        get_sidebar();
        ?>

        <div class="column mxw860">
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
    </div>

</div>
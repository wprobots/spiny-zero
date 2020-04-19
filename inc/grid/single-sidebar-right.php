<div class="container spiny-sidebar">

    <div class="row">
        <div class="column">
            <?php
            if( have_posts() ) {
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'inc/grid/single', get_post_type() );
                endwhile; // End of the loop.
            }
            else {
                echo __( 'Post without content', 'spiny' );
            }
            ?>
        </div>

        <?php
        get_sidebar();
        ?>
    </div>

</div>
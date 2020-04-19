<div class="container spiny-sidebar">

    <div class="row">
        <?php
        get_sidebar();
        ?>
        <div class="column">
            <?php
            if( have_posts() ) {
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'inc/grid/page', '' );
                endwhile; // End of the loop.
            }
            else {
                echo __( 'Page without content', 'spiny' );
            }
            ?>
        </div>
    </div>


</div>
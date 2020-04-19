<?php
get_header();

if( 'page' == get_option('show_on_front') ) {
    if (have_posts()) {
        while (have_posts()) :
            the_post();

            ?>
            <div class="container">
                <div class="row">
                    <div class="column">
                        <article class="page">
                            <div class="post_content">
                                <?php
                                the_content();
                                ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        <?php
        endwhile; // End of the loop.
    } else {
        echo __('Page without content', 'spiny');
    }
}
else {
    get_template_part( 'inc/grid/loop', '' );
}

get_footer();

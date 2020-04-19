<?php
global $wp_query;
global $wp_customize;

$spiny_sidebar = get_theme_mod('spiny_sidebar');
?>

<div class="container">

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
            if( is_archive() ) {
                ?>
                <div class="row">
                    <div class="column">
                        <?php
                        if( is_category() || is_tag() || is_tax() ) {
                            $current = $wp_query->get_queried_object();
                            ?>
                            <h1><?php echo $current->name; ?></h1>
                            <?php

                            if( ! empty($current->description) ) {
                                echo wpautop($current->description);
                            }
                        }
                        elseif( is_post_type_archive() ) {
                            $current = $wp_query->get_queried_object();

                            ?>
                            <h1><?php echo $current->label ?></h1>
                            <?php

                            if( is_post_type_archive() ) {
                                global $wp_post_types;

                                $post_type_description = $wp_post_types[$wp_query->query['post_type']]->description;
                                if( ! empty($post_type_description) ) {
                                    echo wpautop($post_type_description);
                                }

                            }
                        }
                        elseif( is_author() ) {
                            $current = $wp_query->get_queried_object();

                            $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
                            $author_meta = get_user_meta($author->ID);

                            ?>
                            <h1><?php echo $current->data->display_name ?></h1>
                            <?php

                            if( ! empty($author_meta['description'][0]) ) {
                                ?>
                                <div>
                                    <?php echo wpautop($author_meta['description'][0]); ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
            if( is_search() ) {
                ?>
                <div class="row">
                    <div class="column">
                        <h1><?php printf( esc_html__( 'Search Results for: %s', 'spiny' ), '<span>' . get_search_query() . '</span>' );; ?></h1>

                        <?php
                        get_search_form();
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
            if( have_posts() ) {
                while ( have_posts() ) :
                    the_post();

                    ?>
                    <div class="row">
                        <article class="column">
                            <div class="post_container archive">
                                <?php
                                do_action('spiny_loop_before_post', $post);
                                ?>
                                <?php
                                do_action('spiny_loop_before_post_thumbnail', $post);
                                do_action('spiny_loop_post_thumbnail', $post);
                                do_action('spiny_loop_after_post_thumbnail', $post);
                                ?>
                                <div class="post_content">
                                    <?php
                                    do_action('spiny_loop_before_post_title', $post);
                                    do_action('spiny_loop_post_title', $post);
                                    do_action('spiny_loop_after_post_title', $post);
                                    ?>
                                    <?php
                                    do_action('spiny_loop_before_post_meta', $post);
                                    do_action('spiny_loop_post_meta', $post);
                                    do_action('spiny_loop_after_post_meta', $post);
                                    ?>
                                    <?php
                                    do_action('spiny_loop_post_category', $post);
                                    do_action('spiny_loop_post_tag', $post);
                                    ?>

                                    <?php
                                    do_action('spiny_loop_before_post_content', $post);
                                    do_action('spiny_loop_post_content', $post);
                                    do_action('spiny_loop_after_post_content', $post);
                                    ?>
                                </div>
                                <?php
                                do_action('spiny_loop_after_post', $post);
                                ?>
                            </div>
                        </article>
                    </div>
                <?php
                endwhile;
                ?>

                <?php
                include_once( __DIR__ . '/../pagination.php' );
            }
            else {
                ?>
                <div class="row">
                    <div class="column">
                        <?php esc_html_e( 'Nothing Found', 'spiny' ); ?>
                    </div>
                </div>
                <?php

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
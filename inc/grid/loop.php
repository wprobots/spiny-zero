<?php
global $wp_query;
global $wp_customize;

$spiny_sidebar = get_theme_mod('spiny_sidebar');

$spiny_archive_layout_thumbnail = get_theme_mod('spiny_archive_layout_thumbnail');
$spiny_archive_layout_date      = get_theme_mod('spiny_archive_layout_date');
$spiny_archive_layout_author    = get_theme_mod('spiny_archive_layout_author');
$spiny_archive_layout_category  = get_theme_mod('spiny_archive_layout_category');
$spiny_archive_layout_tag       = get_theme_mod('spiny_archive_layout_tag');

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

                    $image = get_the_post_thumbnail( $post->ID, 'large' );
                    ?>
                    <div class="row">
                        <article class="column">
                            <div class="post_container archive">
                                <?php
                                if( $image && $spiny_archive_layout_thumbnail ) {
                                    ?>
                                    <div class="post_thumbnail">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <?php echo $image; ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="post_content">
                                    <p class="post_title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></p>
                                    <div class="post_meta">
                                        <?php
                                        if( $spiny_archive_layout_author ) {
                                            $author_id = $post->post_author;
                                            ?>
                                            <div class="post_author">
                                                <a href="<?php echo get_author_posts_url($author_id); ?>" itemprop="author"><?php echo get_the_author($author_id); ?></a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if( $spiny_archive_layout_date ) {
                                            $date = get_the_date( 'd.m.Y', $post );
                                            ?>
                                            <div class="post_date" itemprop="datePublished"><?php echo $date; ?></div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $spiny_archive_layout_category ) {
                                        $categories_str = get_the_category_list( ', ' );
                                        if( ! empty( $categories_str ) ) {
                                            ?>
                                            <div class="post_category">
                                                <?php echo __( 'Categories:', 'spiny' ); ?>
                                                <?php echo $categories_str; ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if( $spiny_archive_layout_tag ) {
                                        $tags_str = get_the_tag_list( '', ', ', '' );
                                        if( $tags_str ) {
                                            ?>
                                            <div class="post_tag">
                                                <?php echo __( 'Tags:', 'spiny' ); ?>
                                                <?php echo get_the_tag_list( '', ', ', '' ); ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    if( has_excerpt($post->ID) ) {
                                        $excerpt = get_the_excerpt( $post->ID );
                                    }
                                    else {
                                        $excerpt = wp_trim_excerpt( '', $post->ID );
                                    }

                                    echo wpautop($excerpt);
                                    ?>
                                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo __( 'Read more', 'spiny' ); ?></a>
                                </div>
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
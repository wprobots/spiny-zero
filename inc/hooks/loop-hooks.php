<?php
/**
 * Loop post thumbnail hook
 */
add_filter('spiny_loop_post_thumbnail', 'spiny_loop_post_thumbnail', 10, 1);
function spiny_loop_post_thumbnail($post) {
    $spiny_archive_layout_thumbnail = get_theme_mod('spiny_archive_layout_thumbnail');
    $image = get_the_post_thumbnail( $post->ID, 'large' );

    if( $image && $spiny_archive_layout_thumbnail ) {
        ?>
        <div class="post_thumbnail">
            <a href="<?php echo get_permalink($post->ID); ?>">
                <?php echo $image; ?>
            </a>
        </div>
        <?php
    }
}


/**
 * Loop post title hook
 */
add_filter('spiny_loop_post_title', 'spiny_loop_post_title', 10, 1);
function spiny_loop_post_title($post) {
    ?>
    <p class="post_title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></p>
    <?php
}


/**
 * Loop post meta hook
 */
add_filter('spiny_loop_post_meta', 'spiny_loop_post_meta', 10, 1);
function spiny_loop_post_meta($post) {
    $spiny_archive_layout_date   = get_theme_mod('spiny_archive_layout_date');
    $spiny_archive_layout_author = get_theme_mod('spiny_archive_layout_author');
    ?>
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
}


/**
 * Loop post category hook
 */
add_filter('spiny_loop_post_category', 'spiny_loop_post_category', 10, 1);
function spiny_loop_post_category($post) {
    $spiny_archive_layout_category = get_theme_mod('spiny_archive_layout_category');

    if( $spiny_archive_layout_category ) {
        $categories_str = get_the_category_list( ', ', '', $post->ID );
        if( ! empty( $categories_str ) ) {
            ?>
            <div class="post_category">
                <?php echo __( 'Categories:', 'spiny' ); ?>
                <?php echo $categories_str; ?>
            </div>
            <?php
        }
    }
}


/**
 * Loop post tag hook
 */
add_filter('spiny_loop_post_tag', 'spiny_loop_post_tag', 10, 1);
function spiny_loop_post_tag($post) {
    $spiny_archive_layout_tag = get_theme_mod('spiny_archive_layout_tag');

    if( $spiny_archive_layout_tag ) {
        $tags_str = get_the_tag_list( '', ', ', '', $post->ID );
        if( $tags_str ) {
            ?>
            <div class="post_tag">
                <?php echo __( 'Tags:', 'spiny' ); ?>
                <?php echo get_the_tag_list( '', ', ', '' ); ?>
            </div>
            <?php
        }
    }
}


/**
 * Loop post content hook
 */
add_filter('spiny_loop_post_content', 'spiny_loop_post_content', 10, 1);
function spiny_loop_post_content($post) {
    if( has_excerpt($post->ID) ) {
        $excerpt = get_the_excerpt( $post->ID );
    }
    else {
        $excerpt = wp_trim_excerpt( '', $post->ID );
    }

    echo wpautop($excerpt);
    ?>
    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo __( 'Read more', 'spiny' ); ?></a>
    <?php
}
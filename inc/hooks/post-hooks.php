<?php
/**
 * Post thumbnail hook
 */
add_filter('spiny_post_thumbnail', 'spiny_post_thumbnail', 10, 1);
function spiny_post_thumbnail($post) {
    $spiny_post_layout_thumbnail = get_theme_mod('spiny_post_layout_thumbnail');
    $post_image = get_the_post_thumbnail( $post->ID, 'large' );

    $post_image = get_the_post_thumbnail( $post->ID, 'large' );
    if( $post_image && $spiny_post_layout_thumbnail ) {
        ?>
        <div class="post_thumbnail" itemscope itemtype="http://schema.org/ImageObject">
            <?php
            echo $post_image;
            ?>
        </div>
        <?php
    }
}


/**
 * Post title hook
 */
add_filter('spiny_post_title', 'spiny_post_title', 10, 1);
function spiny_post_title($post) {
    ?>
    <h1 itemprop="name"><?php echo get_the_title($post->ID); ?></h1>
    <?php
}


/**
 * Post meta hook
 */
add_filter('spiny_post_meta', 'spiny_post_meta', 10, 1);
function spiny_post_meta($post) {
    $spiny_post_layout_date   = get_theme_mod('spiny_post_layout_date');
    $spiny_post_layout_author = get_theme_mod('spiny_post_layout_author');
    ?>
    <div class="post_meta">
        <?php
        if( $spiny_post_layout_author ) {
            $author_id = $post->post_author;
            ?>
            <div class="post_author">
                <a href="<?php echo get_author_posts_url($author_id); ?>" itemprop="author"><?php echo get_the_author($author_id); ?></a>
            </div>
            <?php
        }
        ?>
        <?php
        if( $spiny_post_layout_date ) {
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
 * Post meta hook
 */
add_filter('spiny_post_content', 'spiny_post_content', 10, 1);
function spiny_post_content($post) {
    $content = get_the_content($post->ID);
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    echo $content;
}


/**
 * Post categories hook
 */
add_filter('spiny_post_categories', 'spiny_post_categories', 10, 1);
function spiny_post_categories($post) {
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


/**
 * Post tags hook
 */
add_filter('spiny_post_tags', 'spiny_post_tags', 10, 1);
function spiny_post_tags($post) {
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


/**
 * Post comments hook
 */
add_filter('spiny_post_comments', 'spiny_post_comments', 10, 1);
function spiny_post_comments($post) {
    $spiny_post_layout_comment = get_theme_mod('spiny_post_layout_comment');
    if( $spiny_post_layout_comment ) {
        if ( comments_open( $post->ID ) || get_comments_number( $post->ID ) ) :
            ?>
            <div class="post_comments">
                <?php
                comments_template();
                ?>
            </div>
        <?php
        endif;
    }
}
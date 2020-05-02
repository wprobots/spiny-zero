<?php
/**
 * Page thumbnail hook
 */
add_filter('spiny_page_thumbnail', 'spiny_page_thumbnail', 10, 1);
function spiny_page_thumbnail($post) {
    $spiny_page_layout_thumbnail = get_theme_mod('spiny_page_layout_thumbnail');
    $post_image = get_the_post_thumbnail( $post->ID, 'large' );

    if( $post_image && $spiny_page_layout_thumbnail ) {
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
 * Page title hook
 */
add_filter('spiny_page_title', 'spiny_page_title', 10, 1);
function spiny_page_title($post) {
    ?>
    <h1><?php echo get_the_title($post->ID); ?></h1>
    <?php
}


/**
 * Page meta hook
 */
add_filter('spiny_page_meta', 'spiny_page_meta', 10, 1);
function spiny_page_meta($post) {
    $spiny_page_layout_date   = get_theme_mod('spiny_page_layout_date');
    $spiny_page_layout_author = get_theme_mod('spiny_page_layout_author');

    if( $spiny_page_layout_author || $spiny_page_layout_date ) {
        ?>
        <div class="post_meta">
            <?php
            if( $spiny_page_layout_author ) {
                $author_id = $post->post_author;
                ?>
                <div class="post_author">
                    <a href="<?php echo get_author_posts_url($author_id); ?>" itemprop="author"><?php echo get_the_author($author_id); ?></a>
                </div>
                <?php
            }
            ?>
            <?php
            if( $spiny_page_layout_date ) {
                $date = get_the_date( 'd.m.Y', $post );
                ?>
                <div class="post_date" itemprop="datePublished"><?php echo $date; ?></div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}


/**
 * Page meta hook
 */
add_filter('spiny_page_content', 'spiny_page_content', 10, 1);
function spiny_page_content($post) {
    $content = get_the_content($post->ID);
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    echo $content;
}


/**
 * Page comments hook
 */
add_filter('spiny_page_comments', 'spiny_page_comments', 10, 1);
function spiny_page_comments($post) {
    $spiny_page_layout_comment = get_theme_mod('spiny_page_layout_comment');
    if( $spiny_page_layout_comment ) {
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
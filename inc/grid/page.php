<?php
$spiny_page_layout_comment   = get_theme_mod('spiny_page_layout_comment');
$spiny_page_layout_thumbnail = get_theme_mod('spiny_page_layout_thumbnail');
$spiny_page_layout_date      = get_theme_mod('spiny_page_layout_date');
$spiny_page_layout_author    = get_theme_mod('spiny_page_layout_author');
?>
<article class="page">
    <div class="post_container">
        <?php
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
        ?>
        <div class="post_content">
            <h1><?php the_title(); ?></h1>
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
            the_content();

            // If comments are open or we have at least one comment, load up the comment template.
            if( $spiny_page_layout_comment ) {
                if ( comments_open() || get_comments_number() ) :
                    ?>
                    <div class="post_comments">
                        <?php
                        comments_template();
                        ?>
                    </div>
                <?php
                endif;
            }
            ?>
        </div>
    </div>
</article>
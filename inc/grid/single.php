<?php
$spiny_post_layout_comment   = get_theme_mod('spiny_post_layout_comment');
$spiny_post_layout_thumbnail = get_theme_mod('spiny_post_layout_thumbnail');
$spiny_post_layout_date      = get_theme_mod('spiny_post_layout_date');
$spiny_post_layout_author    = get_theme_mod('spiny_post_layout_author');
?>
<article class="post" itemscope itemtype="http://schema.org/Article">
    <div class="post_container">
        <?php
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
        ?>
        <div class="post_content">
            <h1 itemprop="name"><?php the_title(); ?></h1>
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
            <div itemprope="articleBody">
                <?php
                the_content();
                ?>
            </div>

            <?php
            $categories_str = get_the_category_list( ', ' );
            if( ! empty( $categories_str ) ) {
                ?>
                <div class="post_category">
                    <?php echo __( 'Categories:', 'spiny' ); ?>
                    <?php echo $categories_str; ?>
                </div>
                <?php
            }
            ?>

            <?php
            $tags_str = get_the_tag_list( '', ', ', '' );
            if( $tags_str ) {
                ?>
                <div class="post_tag">
                    <?php echo __( 'Tags:', 'spiny' ); ?>
                    <?php echo get_the_tag_list( '', ', ', '' ); ?>
                </div>
                <?php
            }
            ?>

            <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if( $spiny_post_layout_comment ) {
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
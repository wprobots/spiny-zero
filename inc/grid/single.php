<article class="post" itemscope itemtype="http://schema.org/Article">
    <div class="post_container">
        <?php
        do_action('spiny_before_post_thumbnail', $post);
        do_action('spiny_post_thumbnail', $post);
        do_action('spiny_after_post_thumbnail', $post);
        ?>
        <div class="post_content">
            <?php
            do_action('spiny_before_post_title', $post);
            do_action('spiny_post_title', $post);
            do_action('spiny_after_post_title', $post);
            ?>
            <?php
            do_action('spiny_before_post_meta', $post);
            do_action('spiny_post_meta', $post);
            do_action('spiny_after_post_meta', $post);
            ?>
            <div itemprope="articleBody">
                <?php
                do_action('spiny_before_post_content', $post);
                do_action('spiny_post_content', $post);
                do_action('spiny_after_post_content', $post);
                ?>
            </div>
            <?php
            do_action('spiny_before_post_categories', $post);
            do_action('spiny_post_categories', $post);
            do_action('spiny_after_post_categories', $post);
            ?>
            <?php
            do_action('spiny_before_post_tags', $post);
            do_action('spiny_post_tags', $post);
            do_action('spiny_after_post_tags', $post);
            ?>
            <?php
            do_action('spiny_before_post_comments', $post);
            do_action('spiny_post_comments', $post);
            do_action('spiny_after_post_comments', $post);
            ?>
        </div>
    </div>
</article>
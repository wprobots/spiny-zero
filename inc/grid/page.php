<article class="page">
    <div class="post_container">
        <?php
        do_action('spiny_before_page_thumbnail', $post);
        do_action('spiny_page_thumbnail', $post);
        do_action('spiny_after_page_thumbnail', $post);
        ?>
        <div class="post_content">
            <?php
            do_action('spiny_before_page_title', $post);
            do_action('spiny_page_title', $post);
            do_action('spiny_after_page_title', $post);
            ?>
            <?php
            do_action('spiny_before_page_meta', $post);
            do_action('spiny_page_meta', $post);
            do_action('spiny_after_page_meta', $post);
            ?>
            <?php
            do_action('spiny_before_page_content', $post);
            do_action('spiny_page_content', $post);
            do_action('spiny_after_page_content', $post);
            ?>
            <?php
            do_action('spiny_before_page_comments', $post);
            do_action('spiny_page_comments', $post);
            do_action('spiny_after_page_comments', $post);
            ?>
        </div>
    </div>
</article>
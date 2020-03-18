<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package spiny
 */

get_header();
?>

    <div class="container">

        <div class="row">
            <div class="column">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'spiny' ); ?></h1>
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'spiny' ); ?></p>

                <?php
                get_search_form();
                ?>
            </div>
        </div>

    </div>

<?php
get_footer();

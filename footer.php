</section>
</div>
<div class="page_footer">
    <footer>
        <div class="container">
            <div class="row">
                <div class="column">
                    <nav class="spiny_footer_nav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu' => 'footer',
                            'container' => false,
                            'menu_class' => 'spiny_footer_nav_list',
                            'echo' => true,
                        ));
                        ?>
                    </nav>

                    <?php
                    $footer_copyright = get_theme_mod('spiny_copyright');
                    $footer_copyright_default = sprintf( esc_html__( '&copy; 2019 - %1$s. Theme: %2$s by %3$s.', 'spiny' ), date('Y'), 'Spiny Zero', '<a href="http://wp-robots.com/">WP/ROBOTS</a>' );

                    $footer_copyright_default_attr = '';
                    global $wp_customize;
                    if ( isset( $wp_customize ) ) {
                        $footer_copyright_default_attr = '<div class="copy_default" style="display: none;">' . ($footer_copyright_default) . '</div>';
                    }
                    ?>
                    <?php echo $footer_copyright_default_attr; ?>
                    <div class="copy">
                        <?php
                        if ($footer_copyright && trim($footer_copyright) !== '') {
                            echo $footer_copyright;
                        }
                        else {
                            echo $footer_copyright_default;
                        }
                        ?>
                    </div>
                    <?php

                    ?>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>

<?php

if ( ! is_active_sidebar( 'spiny-sidebar' ) ) {
	return;
}
?>

<aside class="column column-33 sidebar">
    <div id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'spiny-sidebar' ); ?>
    </div>
</aside>



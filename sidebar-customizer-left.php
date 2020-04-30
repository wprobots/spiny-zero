<?php

if ( ! is_active_sidebar( 'spiny-sidebar' ) ) {
	return;
}

$spiny_sidebar = get_theme_mod('spiny_sidebar');
$style = ' style="display: none;"';
if( (int)$spiny_sidebar === 2 ) {
    $style = '';
}
?>
<div class="column column-33 sidebar_position_2"<?php echo $style; ?>>
    <?php
    dynamic_sidebar( 'spiny-sidebar' )
    ?>
</div>



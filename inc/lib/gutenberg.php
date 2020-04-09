<?php
/**
 * Gutenberg wild align images support
 */
function spiny_wild_theme_setup() {
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'spiny_wild_theme_setup' );
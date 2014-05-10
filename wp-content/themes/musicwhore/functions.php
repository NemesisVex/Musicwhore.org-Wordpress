<?php

global $wpdb;

register_nav_menus( array(
	'primary' => __( 'Main Menu', 'musicwhore' ),
) );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function musicwhore_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'musicwhore_page_menu_args' );

/**
 * Register our footer widget area
 */
function musicwhore_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer', 'musicwhore' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'musicwhore_widgets_init' );

function musicwhore_register_mt_id_patterns() {
	if (function_exists('mt_id_mapper_register_pattern')) {
		mt_id_mapper_register_pattern( array('pattern' => "/^\/(mw\/|)entry\/([0-9]+)/", 'offset' => 2) );
		mt_id_mapper_register_pattern( array('pattern' => "/entry\.php\?entry_id=([0-9]+)/", 'offset' => 1) );
	}
}
add_action( 'mt_id_mapper_pattern_setup', 'musicwhore_register_mt_id_patterns' );
?>

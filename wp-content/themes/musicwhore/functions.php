<?php

global $wpdb;

register_nav_menus( array(
	'primary' => __( 'Main Menu', 'musicwhore' ),
) );

/**
 * _remap_mt_entry_to_wp_post
 * 
 * _remap_mt_entry_to_wp_post queries an imported mt_entry table from Movable Type
 * for an entry, then maps the Movable type entry_basename to the Wordpress
 * post_name.
 * 
 * @global object $wpdb The global Wordpress database object
 * @param int $entry_id The entry_id of the mt_entry record to find
 * @return object A Wordpress entry mapped to a Movable Type entry, if available
 */
function _remap_mt_entry_to_wp_post($mt_entry_id) {
	global $wpdb;
	$wpdb->show_errors();
	
	// Make sure the mt_entry table exists.
	if ($wpdb->get_var("show tables like '%mt_entry%'") != 'mt_entry') {
		throw new Exception("mt_entry has not yet been imported from Movable Type");
	}
	
	// Get the Movable Type entry
	$mt_entry = $wpdb->get_row('select * from mt_entry where entry_id = ' . $mt_entry_id);
	
	// Get the permalink name.
	$entry_base = $mt_entry->entry_basename;

	// Find the Wordpress entry that matches the permalink.
	// This does imply that imported entries can NEVER have their permalink names renamed.
	$wp_query = 'Select * From ' . DB_NAME . '.' . $wpdb->posts . ' Where post_name = \'' . $entry_base . '\'';
	$wp_entry = $wpdb->get_row($wp_query);
	
	// Return the Wordpress entry.
	return $wp_entry;
}

/**
 * _remap_mt_category_to_wp_category
 * 
 * _remap_mt_category_to_wp_category queries an imported mt_category table from Movable Type
 * for a category, then maps the Movable type category_label to the Wordpress
 * terms.
 * 
 * @global object $wpdb The global Wordpress database object
 * @param int $mt_category_id The category_id of the mt_category record to find
 * @return object A Wordpress category mapped to a Movable Type cateory, if available
 */
function _remap_mt_category_to_wp_category($mt_category_id) {
	global $wpdb;
	$wpdb->show_errors();
	
	// Make sure the mt_entry table exists.
	if ($wpdb->get_var("show tables like '%mt_category%'") != 'mt_category') {
		throw new Exception("mt_category has not yet been imported from Movable Type");
	}
	
	// Get the Movable Type category.
	$mt_entry = $wpdb->get_row('select * from mt_category where category_id = ' . $mt_category_id);

	// Get the permalink.
	$category_name = $mt_category->category_label;

	// Find the Wordpress entry that matches the category.
	$wp_query = 'Select * From ' . DB_NAME . '.' . $wpdb->terms . ' Where name = \'' . $category_name . '\'';
	$wp_category = $wpdb->get_row($wp_query);
	
	// Return the category.
	return $wp_category;
}

/**
 * musicwhore_remap_mt
 * 
 * musicwhore_remap_mt is the template function to remap Movable Type URLs to Wordpress URLs.
 * 
 * @global object $wpdb The global Wordpress database object.
 */
function musicwhore_remap_mt() {
	global $wpdb;
	$wpdb->show_errors();
	
	// Remapping mechanism is the same, but ID extraction isn't, so let's
	// encapsulate that within this anonymous function. It doesn't need to exist
	// in the global scope.
	$remap_mt_entry = function ($mt_entry_id) {
		try {
			// Get the Wordpress entry from a Movable Type ID.
			$wp_entry = _remap_mt_entry_to_wp_post($mt_entry_id);
			// Go there!
			$url = get_permalink($wp_entry->ID);
			header('Location: ' . $url, 301);
			
		} catch (Exception $ex) {
			// TODO: Log the exception, but let's send the user to the front page.
			header('Location: /', 301);
		}
		die();
	};
	
	// We've got two types of URLs for which to check.
	// Match /index.php/mw/entry/{id}/
	if (preg_match("/^\/(mw\/|)entry\/([0-9]+)/", $_SERVER['REQUEST_URI'], $match)) {
		$mt_entry_id = $match[2];
		$remap_mt_entry($mt_entry_id);
	}
	
	// Match /entry.php?entry_id={id}
	if (preg_match("/entry\.php\?entry_id=([0-9]+)/", $_SERVER['REQUEST_URI'], $match)) {
		$mt_entry_id = $match[1];
		$remap_mt_entry($mt_entry_id);
	}

	// As it turns out, there were only two entries that linked to categories,
	// so we edited those manually. We're leaving this bit of code in case
	// another project elsewhere needs.
	/*
	 * 
	if (preg_match("/^\/(mw\/|)category\/([0-9]+)/", $_SERVER['REQUEST_URI'], $match)) {
		$mt_category_id = $match[2];

		try {
			// Get the Movable Type entry.
			$wp_category = remap_mt_category_to_wp_category($mt_category_id);
			$url = get_category_link($wp_category->term_id);
			header('Location: ' . $url, 301);
			
		} catch (Exception $ex) {
			die($ex->getMessage());
			//header('Location: /', 301);
		}
		die();
	}
	 */
}

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
?>

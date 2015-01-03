<?php 

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

function wpbootstrap_scripts_with_jquery()
{

	wp_deregister_script('jquery');
  wp_register_script('jquery',  get_template_directory_uri() . '/bootstrap/js/jquery-1.11.2.min.js');
  wp_enqueue_script('jquery');

	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	wp_register_script( 'colorbox-script', get_template_directory_uri() . '/bootstrap/js/jquery.colorbox.js', array( 'jquery' ) );
	
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
	wp_enqueue_script( 'colorbox-script' );
}

if (!is_admin())
	add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

// add filter to remove admin-bar
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Get the assets directory.
 * @param {String} [$directory] Optional extra directory to append to the path.
 * @return {String} The asset path.
 */
function get_assets_directory($directory) {
  $path = get_stylesheet_directory_uri() . '/bootstrap';
  
  if (isset($directory)) {
    $path = $path . '/' . $directory;
  }
  
  return $path;
}

/**
 * Echo the asset directory.
 * @param {String} [$directory] Optional extra directory to append to the path.
 * @uses get_assets_directory();
 */
function assets_directory($directory) {
  echo get_assets_directory($directory);
}

/**
 * Get the specified asset URL.
 * @param {String} $dir The directory from which to grab the asset.
 * @param {String} $file The filename of the asset.
 * @uses get_assets_directory();
 */
function get_asset($dir, $file) {
  return get_assets_directory($dir) . '/' . $file;
}

/**
 * Echo the specified asset URL.
 * @param {String} $dir The directory from which to grab the asset.
 * @param {String} $file The filename of the asset.
 * @uses get_asset();
 */
function asset($dir, $file) {
  echo get_asset($dir, $file);
}

function week_number( $date = 'today' ) {
  return ceil( date( 'j', strtotime( $date ) ) / 7 );
} 

?>

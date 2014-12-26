<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	wp_register_script( 'colorbox-script', get_template_directory_uri() . '/bootstrap/js/jquery.colorbox.js', array( 'jquery' ) );
	
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
	wp_enqueue_script( 'colorbox-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

// add filter to remove admin-bar
// add_filter( 'show_admin_bar', '__return_false' );

function CinemaWorld_widgets_init() {
		register_sidebar(
		        array(
		            'name'          => __('Footer Content', 'CinemaWorld'),
		            'id'            => 'footer-content',
		            'description'   => __('Footer text or acknowledgements', 'bootstrapwp'),
		            'before_widget' => '<div id="%1$s" class="widget %2$s">',
		            'after_widget'  => '</div>',
		            'before_title'  => '<h4>',
		            'after_title'   => '</h4>'
		        )
		    );
}

add_action('init', 'CinemaWorld_widgets_init');
?>

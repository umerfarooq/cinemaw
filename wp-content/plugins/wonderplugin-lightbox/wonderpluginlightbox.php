<?php
/*
Plugin Name: WonderPlugin Lightbox
Plugin URI: http://www.wonderplugin.com
Description: WordPress Lightbox Plugin
Version: 1.7
Author: Magic Hills Pty Ltd
Author URI: http://www.wonderplugin.com
License: Copyright 2014 Magic Hills Pty Ltd, All Rights Reserved
*/

define('WONDERPLUGIN_LIGHTBOX_VERSION', '1.7');
define('WONDERPLUGIN_LIGHTBOX_URL', plugin_dir_url( __FILE__ ));
define('WONDERPLUGIN_LIGHTBOX_PATH', plugin_dir_path( __FILE__ ));

require_once 'app/class-wonderplugin-lightbox-controller.php';

class WonderPlugin_Lightbox_Plugin {
	
	function __construct() {
	
		$this->init();
	}
	
	public function init() {
		
		// init controller
		$this->wonderplugin_lightbox_controller = new WonderPlugin_Lightbox_Controller();
		
		add_action( 'admin_menu', array($this, 'register_menu') );
		
		add_shortcode( 'wonderplugin_lightbox', array($this, 'shortcode_handler') );
		
		add_action( 'wp_footer', array($this, 'print_lightbox_options') );
		add_action( 'init', array($this, 'register_script') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_script') );
		
		if ( is_admin() )
		{
			add_action( 'admin_init', array($this, 'admin_init_hook') );
		}
	}
	
	function register_menu()
	{
		$menu = add_menu_page(
				__('WonderPlugin Lightbox', 'wonderplugin_lightbox'),
				__('WonderPlugin Lightbox', 'wonderplugin_lightbox'),
				'manage_options',
				'wonderplugin_lightbox_overview',
				array($this, 'show_overview'),
				WONDERPLUGIN_LIGHTBOX_URL . 'images/logo-16.png' );
		add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_admin_script') );
		
		$menu = add_submenu_page(
				'wonderplugin_lightbox_overview',
				__('Overview', 'wonderplugin_lightbox'),
				__('Overview', 'wonderplugin_lightbox'),
				'manage_options',
				'wonderplugin_lightbox_overview',
				array($this, 'show_overview' ));
		add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_admin_script') );
		
		$menu = add_submenu_page(
				'wonderplugin_lightbox_overview',
				__('Quick Start', 'wonderplugin_lightbox'),
				__('Quick Start', 'wonderplugin_lightbox'),
				'manage_options',
				'wonderplugin_lightbox_show_quick_start',
				array($this, 'show_quick_start' ));
		add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_admin_script') );
		
		$menu = add_submenu_page(
				'wonderplugin_lightbox_overview',
				__('Lightbox Options', 'wonderplugin_lightbox'),
				__('Lightbox Options', 'wonderplugin_lightbox'),
				'manage_options',
				'wonderplugin_lightbox_show_options',
				array($this, 'show_options' ));
		add_action( 'admin_print_styles-' . $menu, array($this, 'enqueue_admin_script') );
		
	}
	
	function register_script()
	{		
		wp_register_script('wonderplugin-lightbox-script', WONDERPLUGIN_LIGHTBOX_URL . 'engine/wonderpluginlightbox.js', array('jquery'), WONDERPLUGIN_LIGHTBOX_VERSION, false);
		wp_register_style('wonderplugin-lightbox-admin-style', WONDERPLUGIN_LIGHTBOX_URL . 'wonderpluginlightbox.css');
	}
	
	function enqueue_script()
	{
		wp_enqueue_script('wonderplugin-lightbox-script');
	}
	
	function enqueue_admin_script($hook)
	{
		wp_enqueue_script('post');
		wp_enqueue_script('wonderplugin-lightbox-script');
		wp_enqueue_style('wonderplugin-lightbox-admin-style');
	}
	
	function admin_init_hook()
	{		
		// add meta boxes
		$this->wonderplugin_lightbox_controller->add_metaboxes();
	}
	
	function show_overview() {
		
		$this->wonderplugin_lightbox_controller->show_overview();
	}

	function show_quick_start() {
	
		$this->wonderplugin_lightbox_controller->show_quick_start();
	}
	
	function show_options() {
		
		$this->wonderplugin_lightbox_controller->show_options();
	}
	
	function print_lightbox_options()
	{
		$this->wonderplugin_lightbox_controller->print_lightbox_options();
	} 
}

/**
 * Init the plugin
 */
$wonderplugin_lightbox_plugin = new WonderPlugin_Lightbox_Plugin();


/**
 * Uninstallation
 */
function wonderplugin_lightbox_uninstall() {

	global $wpdb;
	$table_name = $wpdb->prefix . "wonderplugin_lightbox";
	$wpdb->query("DROP TABLE IF EXISTS $table_name");
}

if ( function_exists('register_uninstall_hook') )
{
	register_uninstall_hook( __FILE__, 'wonderplugin_lightbox_uninstall' );
}

define('WONDERPLUGIN_LIGHTBOX_VERSION_TYPE', 'F');

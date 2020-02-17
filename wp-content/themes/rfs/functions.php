<?php
/***************************************
 *	 CREATE GLOBAL VARIABLES
 ***************************************/
define( 'HOME_URI', home_url() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMAGES', THEME_URI . '/dist-assets/images' );
define( 'DEV_CSS', THEME_URI . '/dev-assets/css' );
define( 'DEV_JS', THEME_URI . '/dev-assets/js' );
define( 'DIST_CSS', THEME_URI . '/dist-assets/css' );
define( 'DIST_JS', THEME_URI . '/dist-assets/js' );

/***************************************
 * Include helpers
 ***************************************/

/***************************************
 * 		Theme Support
 ***************************************/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'title-tag' );

/***************************************
 * Custom Image Size
 ***************************************/

/***************************************
 * Add Wordpress Menus
 ***************************************/
function register_rfs_menu() {
	register_nav_menu( 'main-menu', 'Hauptmenü' );
}
//add_action( 'after_setup_theme', 'register_rfs_menu' );

/***************************************
 * 		Enqueue scripts and styles.
 ***************************************/
function rfs_startup_scripts() {
	wp_enqueue_style( "rfs-google-font", "https://fonts.googleapis.com/css?family=Work+Sans:400,500,600&display=swap", array(), false );
	if (WP_DEBUG) {
		$modificated_css = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dev-assets/css/theme.css' ) );
		$modificated_js = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dev-assets/js/theme.js' ) );
		wp_enqueue_style( "rfs-style", DEV_CSS . '/theme.css', array('rfs-google-font'), $modificated_css );
		wp_register_script( "rfs-script", DEV_JS ."/theme.js", array('jquery'), $modificated_js, true );
	} else {
		$modificated_css = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dist-assets/css/theme.min.css' ) );
		$modificated_js = date( 'YmdHis', filemtime( get_stylesheet_directory() . '/dist-assets/js/theme.min.js' ) );
		wp_enqueue_style( "rfs-style", DIST_CSS . '/theme.min.css', array('rfs-google-font'), $modificated_css );
		wp_register_script( "rfs-script", DIST_JS ."/theme.min.js", array('jquery'), $modificated_js, true );
	}
	wp_enqueue_script( 'rfs-script' );
	$localize_array = array(
		'web_url' => HOME_URI,
		'ajax_url' => admin_url('admin-ajax.php')
	);
	wp_localize_script( 'rfs-script', 'global_vars', $localize_array );
}
add_action( "wp_enqueue_scripts", "rfs_startup_scripts" );

/***************************************
 * 		Add CSS to Admin Backend
 ***************************************/
function rfs_load_admin_style() {
	wp_enqueue_style( 'rfs-admin-css', DIST_CSS . '/rfs-admin.css', false, '1.1.0' );
}
add_action( 'admin_enqueue_scripts', 'rfs_load_admin_style' );

/***************************************
 * 		rfs ACF Init
 ***************************************/
function rfs_acf_init() {
 	acf_update_setting('google_api_key', 'AIzaSyCHQJgXa8qiFPJUqCL4Ia4iLWuvA1V6VMY');
}
//add_action( 'acf/init', 'rfs_acf_init' );


/***************************************
 * Remove Menus from Backend
 ***************************************/
function remove_menus() {
	remove_menu_page( 'edit-comments.php' );
	//remove_menu_page( 'tools.php' );
}
add_action( 'admin_menu', 'remove_menus' );
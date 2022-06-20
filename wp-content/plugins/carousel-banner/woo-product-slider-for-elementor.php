<?php
/**
 Plugin Name: Carousel Slider for Elementor
 Description: Carousel Slider for Elementor Lets you display your WooCommerce Products as Carousel Slider. You can now show your Products using this plugin easily to your users as a Carousel Slider
 Author: BDD
 Author URI: https://bolehdicoba.com/
 Version: 1.0.2
 License: GPLv2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: bdd
*/

 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) { exit; }

 /**
  * Main class for News Ticker
  */
class BDD_SLIDER
 {
 	
 	private static $instance;

	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new BDD_SLIDER();
            self::$instance->init();
        }
        return self::$instance;
    }

    //Empty Construct
 	function __construct(){}
 	
 	//initialize Plugin
 	public function init(){
 		$this->defined_constants();
 		$this->include_files();
		add_action( 'elementor/init', array( $this, 'wb_create_category') ); // Add a custom category for panel widgets
 	}

 	//Defined all constants for the plugin
 	public function defined_constants(){
 		define( 'BDD_PATH', plugin_dir_path( __FILE__ ) );
		define( 'BDD_URL', plugin_dir_url( __FILE__ ) ) ;
		define( 'BDD_VERSION', '1.0.2' ) ; //Plugin Version
		define( 'BDD_MIN_ELEMENTOR_VERSION', '2.0.0' ) ; //MINIMUM ELEMENTOR Plugin Version
		define( 'BDD_MIN_PHP_VERSION', '5.4' ) ; //MINIMUM PHP Plugin Version
		define( 'BDD_PRO_LINK', 'https://plugin-devs.com/product/woocommerce-product-carousel-elementor/' ) ; //Pro Link
 	}

 	//Include all files
 	public function include_files(){

 		require_once( BDD_PATH . 'functions.php' );
 		require_once( BDD_PATH . 'admin/woo-product-slider-utils.php' );
 		if( is_admin() ){
 			// require_once( BDD_PATH . 'admin/admin-pages.php' );	
 			// require_once( BDD_PATH . 'class-plugin-deactivate-feedback.php' );	
 			// require_once( BDD_PATH . 'class-plugin-review.php' );	
 			// require_once( BDD_PATH . 'support-page/class-support-page.php' );	
 		}
 		//require_once( BDD_PATH . 'admin/notices/support.php' );
 	}

 	//Elementor new category register method
 	public function wb_create_category() {
	   \Elementor\Plugin::$instance->elements_manager->add_category( 
		   	'web-builder-element-bdd',
		   	[
		   		'title' => esc_html( 'Web Builders Element', 'news-ticker-for-elementor' ),
		   		'icon' => 'fa fa-plug', //default icon
		   	],
		   	2 // position
	   );
	}

 	// prevent the instance from being cloned
    public function __clone(){}

    // prevent from being unserialized
    public function __wakeup(){}
 }

function bdd_slider_register_function(){
	$BDD_SLIDER = BDD_SLIDER::getInstance();
	
	// if( is_admin() ){
	// 	$bdd_feedback = new BDD_Usage_Feedback(
	// 		__FILE__,
	// 		'bayu@bolehdicoba.com',
	// 		false,
	// 		true
	// 	);
	// }
}
add_action('plugins_loaded', 'bdd_slider_register_function');

add_action('wp_footer', 'bdd_display_custom_css');
function bdd_display_custom_css(){
	$custom_css = get_option( 'bdd_custom_css' );
	$css ='';
	if ( ! empty( $custom_css ) ) {
		$css .= '<style type="text/css">';
		$css .= '/* Custom CSS */' . "\n";
		$css .= $custom_css . "\n";
		$css .= '</style>';
	}
	echo $css;
}


/**
 * Submenu filter function. Tested with Wordpress 4.1.1
 * Sort and order submenu positions to match your custom order.
 *
 */
function bdd_order_submenu( $menu_ord ) {

  global $submenu;

  // Enable the next line to see a specific menu and it's order positions
  //echo '<pre>'; print_r( $submenu['bdd-slider'] ); echo '</pre>'; exit();

  $arr = array();

  $arr[] = $submenu['bdd-slider'][1];
  $arr[] = $submenu['bdd-slider'][2];
  $arr[] = $submenu['bdd-slider'][5];
  $arr[] = $submenu['bdd-slider'][4];

  $submenu['bdd-slider'] = $arr;

  return $menu_ord;

}

// add the filter to wordpress
add_filter( 'custom_menu_order', 'bdd_order_submenu' );


/**
 * Setup Plugin Activation Time
 *
 * @since 1.0.2
 *
 */
register_activation_hook(__FILE__,  'bdd_setup_plugin_activation_time' );
add_action('upgrader_process_complete', 'bdd_setup_plugin_activation_time');
add_action('init', 'bdd_setup_plugin_activation_time');
function bdd_setup_plugin_activation_time(){
	$installation_time = get_option('bdd_installed_time');
	if( !$installation_time ){
		update_option('bdd_installed_time', current_time('timestamp'));
	}
}
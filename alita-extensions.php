<?php
/**
 * Plugin Name:    	Alita Extensions
 * Plugin URI:     	https://demo2.chethemes.com/Alita/
 * Description:    	This selection of extensions compliment our lean and mean theme for WooCommerce, Alita. Please note: they don’t work with any WordPress theme, just Alita.
 * Author:         	MadrasThemes
 * Author URL:     	https://madrasthemes.com/
 * Version:        	2.4.2
 * Text Domain: 	Alita-extensions
 * Domain Path: 	/languages
 * WC tested up to: 3.6.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Alita_Extensions' ) ) {
	/**
	 * Main Alita_Extensions Class
	 *
	 * @class Alita_Extensions
	 * @version	1.0.0
	 * @since 1.0.0
	 * @package	Kudos
	 * @author Gabriel
	 */
	final class Alita_Extensions {
		/**
		 * Alita_Extensions The single instance of Alita_Extensions.
		 * @var 	object
		 * @access  private
		 * @since 	1.0.0
		 */
		private static $_instance = null;

		/**
		 * The token.
		 * @var     string
		 * @access  public
		 * @since   1.0.0
		 */
		public $token;

		/**
		 * The version number.
		 * @var     string
		 * @access  public
		 * @since   1.0.0
		 */
		public $version;

		/**
		 * Constructor function.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function __construct () {
			
			$this->token 	= 'Alita-extensions';
			$this->version 	= '0.0.1';
			
			add_action( 'plugins_loaded', array( $this, 'setup_constants' ),		10 );
			add_action( 'plugins_loaded', array( $this, 'includes' ),				20 );
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ),	30 );
		}

		/**
		 * Main Alita_Extensions Instance
		 *
		 * Ensures only one instance of Alita_Extensions is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @static
		 * @see Alita_Extensions()
		 * @return Main Kudos instance
		 */
		public static function instance () {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Setup plugin constants
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function setup_constants() {

			// Plugin Folder Path
			if ( ! defined( 'Alita_EXTENSIONS_DIR' ) ) {
				define( 'Alita_EXTENSIONS_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'Alita_EXTENSIONS_URL' ) ) {
				define( 'Alita_EXTENSIONS_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File
			if ( ! defined( 'Alita_EXTENSIONS_FILE' ) ) {
				define( 'Alita_EXTENSIONS_FILE', __FILE__ );
			}

			// Modules File
			if ( ! defined( 'Alita_MODULES_DIR' ) ) {
				define( 'Alita_MODULES_DIR', Alita_EXTENSIONS_DIR . '/modules' );
			}
		}

		/**
		 * Include required files
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function includes() {

			#-----------------------------------------------------------------
			# Plugin Functions
			#-----------------------------------------------------------------

			require Alita_EXTENSIONS_DIR . '/includes/functions.php';

			#-----------------------------------------------------------------
			# Post Formats
			#-----------------------------------------------------------------
			require Alita_MODULES_DIR . '/post-formats/post-formats.php';

			#-----------------------------------------------------------------
			# Static Block Post Type
			#-----------------------------------------------------------------
			require_once Alita_MODULES_DIR . '/post-types/static-block.php';

			#-----------------------------------------------------------------
			# Visual Composer Extensions
			#-----------------------------------------------------------------
			require_once Alita_MODULES_DIR . '/js_composer/js_composer.php';

			#-----------------------------------------------------------------
			# Theme Shortcodes
			#-----------------------------------------------------------------
			require_once Alita_MODULES_DIR . '/theme-shortcodes/theme-shortcodes.php';

			#-----------------------------------------------------------------
			# Elementor Extensions
			#-----------------------------------------------------------------
			require_once Alita_MODULES_DIR . '/elementor/elementor.php';

			#-----------------------------------------------------------------
			# Page Templates
			#-----------------------------------------------------------------
			// require Alita_MODULES_DIR . '/page-templates/class-Alita-page-templates.php';
		}

		/**
		 * Load the localisation file.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'Alita-extensions', false, dirname( plugin_basename( Alita_EXTENSIONS_FILE ) ) . '/languages/' );
		}

		/**
		 * Cloning is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __clone () {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'Alita-extensions' ), '1.0.0' );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __wakeup () {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'Alita-extensions' ), '1.0.0' );
		}
	}
}

/**
 * Returns the main instance of Alita_Extensions to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Alita_Extensions
 */
function Alita_Extensions() {
	return Alita_Extensions::instance();
}

/**
 * Initialise the plugin
 */
Alita_Extensions();
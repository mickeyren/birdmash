<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://programmingmind.com
 * @since      1.0.0
 *
 * @package    Birdmash
 * @subpackage Birdmash/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Birdmash
 * @subpackage Birdmash/admin
 * @author     David Ang <davidang09@gmail.com>
 */
class Birdmash_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


  private $settings_name = 'birdmash';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Birdmash_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Birdmash_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/birdmash-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Birdmash_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Birdmash_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/birdmash-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_settings_page() {

		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Birdmash Settings', 'birdmash-settings' ),
			__( 'Birdmash', 'birdmash' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_settings_page' )
		);

	}

	public function display_settings_page() {
		include_once 'partials/birdmash-admin-display.php';
	}

	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_settings() {
		add_settings_section(
			$this->settings_name . '_general',
			__( 'General', 'birdmash-general' ),
			array( $this, $this->settings_name . '_general_cb' ),
			$this->plugin_name
		);
		add_settings_field(
			$this->settings_name . '_day',
			__( 'Usernames', 'birdmash-usernames-desc' ),
			array( $this, $this->settings_name . '_usernames_cb' ),
			$this->plugin_name,
			$this->settings_name . '_general',
			array( 'label_for' => $this->settings_name . '_usernames' )
		);
		register_setting( $this->plugin_name, $this->settings_name . '_usernames' );
	}
	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function birdmash_general_cb() {
		echo '<p>' . __( 'Please enter a comma separate usernames.', 'birdmash-settings-desc' ) . '</p>';
	}

	public function birdmash_usernames_cb() {
		$usernames = get_option( $this->settings_name . '_usernames' );
		echo '<input type="text" name="' . $this->settings_name . '_usernames' . '" id="' . $this->settings_name . '_usernames' . '" value="' . $usernames . '"> ';
	}

}

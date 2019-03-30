<?php

class Class_Plugin_Main {

	private $loader;
	private $plugin_name;
  private $version;
  
	public function __construct( $version, $plugin_name ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( __DIR__ ) . 'includes/class-plugin-loader.php';
		require_once plugin_dir_path( __DIR__ ) . 'includes/class-plugin-i18n.php';
    require_once plugin_dir_path( __DIR__ ) . 'admin/class-plugin-admin.php';
    
		require_once plugin_dir_path( __DIR__ ) . 'public/class-public-post-accordeon.php';

		$this->loader = new Class_Plugin_Loader( $this->get_version(), $this->get_plugin_name() );
	}

	private function set_locale() {

		$plugin_i18n = new Class_Plugin_i18n( $this->get_version(), $this->get_plugin_name() );
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_admin_hooks() {

		//$plugin_admin = new Class_Wedo_Plugin_Admin( $this->version, $this->plugin_name );

		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
    //$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	private function define_public_hooks() {

		$public_post_accordeon = new Class_Public_Post_Accordeon( $this->get_version(), $this->get_plugin_name() );

		$this->loader->add_action( 'wp_enqueue_scripts', $public_post_accordeon, 'enqueue_styles' );
    $this->loader->add_action( 'wp_enqueue_scripts', $public_post_accordeon, 'enqueue_scripts' );
    
    $this->loader->add_shortcode( $this->plugin_name . "-post-accordeon", $public_post_accordeon, "post_accordeon_shortcode", $priority = 10, $accepted_args = 1 );

    $this->loader->add_action( 'after_setup_theme', $public_post_accordeon, 'after_setup_theme' );

	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}

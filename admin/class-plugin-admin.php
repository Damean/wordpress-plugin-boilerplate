<?php

class Class_Plugin_Admin {

	private $plugin_name;
  private $version;
  
	public function __construct( $version, $plugin_name ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-admin.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-admin.js', array( 'jquery' ), $this->version, false );

  }
  
}

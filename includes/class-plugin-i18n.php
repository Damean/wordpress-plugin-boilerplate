<?php

class Class_Plugin_i18n {

  private $plugin_name;
  private $version;
  
  public function __construct( $version, $plugin_name ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			$this->plugin_name,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

  }
  
}

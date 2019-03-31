<?php

class Class_Public_Post_Accordeon {

	private $plugin_name;
	private $version;

	public function __construct( $version, $plugin_name ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function enqueue_styles() {

    wp_register_style( 'bootstrap4-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array('divi-style'), '4.3.1', 'all' );
    wp_register_style( $this->plugin_name . '-post-accordeon-style', plugin_dir_url( __FILE__ ) . 'css/post-accordeon.css', array('bootstrap4-style'), $this->version, 'all' );

	}

	public function enqueue_scripts() {

    wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array( 'jquery' ), '1.14.7', true );
    wp_register_script( 'bootstrap4-script', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'popper' ), '4.3.1', true );    
    wp_register_script( $this->plugin_name . '-post-accordeon-script', plugin_dir_url( __FILE__ ) . 'js/post-accordeon.js', array( 'jquery' ), $this->version, true );
    
  }

  public function after_setup_theme() {

    //add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
    add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
    
  }

  /**
   * Usage: [wedo_post_slider category_name="news, projects" posts_per_page=10 ]
   */
  public function post_accordeon_shortcode( $atts ) {

    wp_enqueue_style('bootstrap4-style');
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap4-script');

    wp_enqueue_style( $this->plugin_name . '-post-accordeon-style' );
    wp_enqueue_script( $this->plugin_name . '-post-accordeon-script' );

    wp_localize_script( $this->plugin_name . '-post-accordeon-script', $this->plugin_name . '_post_accordeon_obj', array( 'image_path' => plugin_dir_url( __FILE__ ) . 'img/' ) );

    extract( shortcode_atts( array(
      'category_name' => 'news',
      'accordeon_identifier' => 'identifier'
    ), $atts ) );

    $args = array(
      'category_name' => $category_name,
      'order' => 'DESC', 
      'orderby' => 'date'
    );

    $the_query = new WP_Query( $args );

    ob_start();
      include plugin_dir_path( __FILE__ ) . 'partials/post-accordeon.php';
    $output = ob_get_clean();

    wp_reset_query();

    return $output;
  }

}

(function( $ ) {
  'use strict';

  $(function() {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [ "<img src='" + wedo_post_slider_obj.image_path + "/left-arrow.png' />", "<img src='" + wedo_post_slider_obj.image_path + "/right-arrow.png' />"],
      responsive: {
        0:{
          items:1
        }
      }
    });
  });

})( jQuery );

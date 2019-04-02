(function( $ ) {
  'use strict';

  $(function() {
    $('.post-accordeon-trigger').each(function(i) {

      var accordeonIdentifier = $(this).attr('id');

      if ( i == 0 ) {
        $('.' + accordeonIdentifier).addClass('show');
      }

      $(this).click(function () {

        $('.post-accordeon').removeClass('show');
        $('.' + accordeonIdentifier).addClass('show');
        
      });
  
    });
  });

})( jQuery );

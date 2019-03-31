(function( $ ) {
  'use strict';

  $(function() {
    $('.post-accordeon-trigger').each(function(i) {

      var accordeonIdentifier = $(this).attr('id');
      
      // accordeon elements must use .seerri-accordeon class
      $(this).click(function () {
  
        $('.post-accordeon').not('.' + accordeonIdentifier).removeClass('show');
  
        if ( $('.' + accordeonIdentifier).hasClass('show') ) {
          $('.' + accordeonIdentifier).removeClass('show');
        } else {
          $('.' + accordeonIdentifier).addClass('show');
        }
        
        
      });
  
    });
  });

})( jQuery );

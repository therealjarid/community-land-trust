jQuery(document).ready(function($) {
  
  $('.faq_container').click(function() {
 
    if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        

      } else {
        $(this).addClass('open');     
      }

  });
  

});

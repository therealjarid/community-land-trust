jQuery(document).ready(function($) {
  $('.faq_container').toggle(
    function() {
      $('.faq_container').removeClass('open');
      $(this).addClass('open');
    },
    function() {
      $(this).removeClass('open');
    }
  );
});

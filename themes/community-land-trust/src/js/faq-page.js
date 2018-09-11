jQuery(document).ready(function($) {
  $('.faq_container').click(function() {
    $('.faq_container').removeClass('open');
    $(this).toggleClass('open');
  });
});

jQuery(document).ready(function($) {
  $('.content button').on('click', function() {
    $('.content').hide();
    $('.content.expanded').show();
  });
});

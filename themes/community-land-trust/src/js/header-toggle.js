jQuery(document).ready(function($) {
  $('.fas.fa-bars').click(() => {
    $('.site-header').toggleClass('toggle-menu');
    $('.menu-item-has-children').removeClass('toggle-sub-menu');
  });
  $('.menu-item-has-children > a').click(() => {
    $('.menu-item-has-children').toggleClass('toggle-sub-menu');
  });
});

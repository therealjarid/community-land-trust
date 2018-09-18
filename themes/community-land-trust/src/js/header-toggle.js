jQuery(document).ready(function($) {
  $('.nav-icon').click(() => {
    $('.site-header').toggleClass('toggle-menu');
    $('body').toggleClass('noScroll');
    $('.nav-icon').toggleClass('open');
    // if sub menu is open when hamburger menu is closed, this resets
    $('.menu-item-has-children').removeClass('toggle-sub-menu');
  });
  $('.menu-item-has-children > a').click(() => {
    $('.menu-item-has-children').toggleClass('toggle-sub-menu');
  });
});

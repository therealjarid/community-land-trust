jQuery(document).ready(function($) {

  console.log("hello");

  $('.main-carousel').flickity({
    cellAlign: 'left',
    contain: true,
    autoPlay: true
  });

});
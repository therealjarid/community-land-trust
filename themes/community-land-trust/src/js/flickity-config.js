jQuery(document).ready(function($) {
  $('.main-carousel').flickity({
    cellAlign: 'left',
    contain: true,
    wrapAround: true,

 
    arrowShape: { 
    x0: 10,
    x1: 60, y1: 50,
    x2: 60, y2: 50,
    x3: 60
    }
  });
});

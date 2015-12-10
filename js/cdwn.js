$(document).ready(function(){
    $('.scrollspy').scrollSpy();
    $('#fixed').pushpin({ top: $('#fixed').offset().top });
    $('.tooltipped').tooltip({delay: 50});
  });
$('.edica-header .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});

$(function() {
  $('#darkMode').on('click', function(){
    
    $('body').toggleClass('bodyDark');
    
    $('h6, a, h1, i').toggleClass('textDark');

    $('.page-link').toggleClass('textWhite');
  });

  
});
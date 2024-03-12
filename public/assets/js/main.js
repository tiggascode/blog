$('.edica-header .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});

$(function() {
  $('#darkMode').on('click', function(){

    $text = $(this).text();
    if($text == 'Dark')
      $(this).text('Light');
    else 
      $(this).text('Dark');
    
    $('body').toggleClass('bodyDark');
    
    $('h6, a, h1, i').toggleClass('textDark');

    $('.page-link').toggleClass('textWhite');
    if ($("body").hasClass("bodyDark")) {
      localStorage.setItem("theme", "dark");
    }
    else {
      localStorage.setItem("theme", "light");
    }
  });
  
  if (localStorage.getItem("theme") === "dark") {
    if($('#darkMode').text() == 'Dark')
      $('#darkMode').text('Light');
    
    $('body').addClass('bodyDark');
    
    $('h6, a, h1, i').addClass('textDark');

    $('.page-link').addClass('textWhite');
  } else {
    if($('#darkMode').text() == 'Light')
      $('#darkMode').text('Dark');
    
    $('body').removeClass('bodyDark');
    
    $('h6, a, h1, i').removeClass('textDark');

    $('.page-link').removeClass('textWhite');
  }
});
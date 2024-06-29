$(window).on('load', function () {
  $('#loader').fadeIn('slow');
  $('#loader').delay(500).fadeOut('slow');
  $('body').delay(500).css({ 'overflow': 'visible' });
})
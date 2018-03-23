 (function(){
  $('a').each(function() {
    if ($(this).prop('user_home.php') == window.location.href) {
      $(this).addClass('active');
    }
  });
});

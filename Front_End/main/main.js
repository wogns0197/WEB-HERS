$(document).ready( function(){
  var navoffset = $('nav').offset();
  $(window).scroll(function() {
    if($(document).scrollTop() > navoffset.top){
      $('nav').addClass('navfixed');
    }
    else {
      $('nav').removeClass('navfixed');
    }
  });
});

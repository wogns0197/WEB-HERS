$(document).ready( function(){
  $("#home").fadeOut(0);
  $(".mainp1").fadeOut(0);
  $(".mainp2").fadeOut(0);
  $(".buttons").fadeOut(0);
  $(".mainp1").fadeIn(1500);
  setTimeout(function(){
    $(".mainp2").fadeIn(1500);
  },800);
  setTimeout(function(){
    $(".buttons").fadeIn(1500);
  },1600);
  setTimeout(function(){
    $("#home").fadeIn(1500);
  },2400);

  $("#menuicon").click(function () {
    $("#menubar").animate({left: 0}, 300 );
    $("#xicon").animate({left: 0}, 300 );
    $("#menuicon").fadeOut(300);
  });

  $("#xicon").click(function () {
    $("#menubar").animate({left: "-22%"}, 300 );
    $("#xicon").animate({left: "-22%"}, 300 );
    $("#menuicon").fadeIn(300);
  });

});

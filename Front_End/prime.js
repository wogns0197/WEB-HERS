$(document).ready( function(){
  $("#menuicon").click(function () {
    $("#menubar").animate({left: 0}, 300 );
    $("#xicon").animate({left: 0}, 300 );
    $("#menuicon").fadeOut(300);
  });

  $("#xicon").click(function () {
    $("#menubar").animate({left: "-25%"}, 300 );
    $("#xicon").animate({left: "-25%"}, 300 );
    $("#menuicon").fadeIn(300);
  });

});

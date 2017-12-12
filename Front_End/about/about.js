// $(window).scroll(function() {
//   var $el = $('.show-on-scroll');
//
//   if($(this).scrollTop() >= 400) $el.addClass('shown');
//   else $el.removeClass('shown');
// });
 $(document).ready(function() {
   $(".entire").fadeOut(0);
   $(".entire").fadeIn({queue: false, duration: 800});
   $(".entire").animate({ top: "15%" }, 800);
   setTimeout(function(){
      $("#firsttitle").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
      $("#firsttitle+p").delay(500).css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
   },800);
   setTimeout(function(){
      $("#clock").css({visibility:"visible", opacity: 0.0}).animate({rotate: '360deg',opacity: 1.0},1000);
      $("#clock+p").delay(500).css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
   },2000);


 });

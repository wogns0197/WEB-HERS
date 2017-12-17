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
      $("#firsttitle").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},300);
      $("#firsttitle+p").delay(500).css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},300);
   },700);
   setTimeout(function(){
      $("#clock").css({visibility:"visible", opacity: 0.0}).animate({rotate: '360deg',opacity: 1.0},500);
      $("#clock+p").delay(500).css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},300);
      // https://github.com/zachstronaut/jquery-animate-css-rotate-scale rotate animation reference
   },2000);

   $(window).scroll(function(){
     var scrollTop = $(this).scrollTop();

     if(scrollTop > 100){
       $("#first").css({visibility:"visible"});
       $("#first+img").css({visibility:"visible"});
       $("#final").css({visibility:"visible"});
       $(".signimages+p").css({visibility:"visible"});
     }
     if(scrollTop > 250){
       $("#match").css({visibility:"visible"});
       $("#match+p").css({visibility:"visible"});
     }
     if(scrollTop > 350){
       $("#soccer").css({visibility:"visible"});
       $("#soccer+p").css({visibility:"visible"});
       $("#soccer+p+p").css({visibility:"visible"});
     }
     else{
       // $("header").css({visibility:"visible"});
       // $("#menuicon").css({visibility:"visible"});
       // $("#xicon").css({visibility:"visible"});
       // $("#menubar").css({visibility:"visible"});
     }

   });


 });

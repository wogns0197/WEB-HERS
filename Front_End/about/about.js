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
      // https://github.com/zachstronaut/jquery-animate-css-rotate-scale rotate animation reference
   },2000);
   // setTimeout(function(){
   //   $("#first").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
   //   $("#first+img").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},2000);
   //   $("#final").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},3500);
   //   $(".signimages+p").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
   // },3500);

   $(window).scroll(function(){
     var scrollTop = $(this).scrollTop();

     if(scrollTop > 100){
       $("#first").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
       $("#first+img").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},2000);
       $("#final").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},3500);
       $(".signimages+p").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
     }
     if(scrollTop > 250){
       $("#match").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
       // $("#match").css({visibility:"invisible", opacity: 1.0}).animate({opacity: 0.0},500);
       // $("#match").attr("src", "image/match.png");
       // $("#match").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},2000);
       $("#match+p").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
     }
     if(scrollTop > 350){
       $("#soccer").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
       $("#soccer+p").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
       $("#soccer+p+p").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
     }

   });


 });

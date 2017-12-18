$(document).ready(function() {
   $(".entire").fadeOut(0);
   $(".entire").fadeIn({queue: false, duration: 800});
   $(".entire").animate({ top: "15%" }, 800);

   $("#info").click(function() {
     var info = $(".siteinfo").offset().top;
     $("body").animate({"scrollTop": info},500);
     $("header").fadeOut(500);
     $("#clock").animate({rotate: '360deg'},500);
     // https://github.com/zachstronaut/jquery-animate-css-rotate-scale rotate animation reference
   });

   $("#dev").click(function() {
     var dev = $(".developer").offset().top;
     $("body").animate({"scrollTop": dev},500);
     $("header").fadeOut(500);
   });

   $("#ctct").click(function() {
     var ct = $(".contact").offset().top;
     $("body").animate({"scrollTop": ct},500);
     $("header").fadeOut(500);
   });

   $(window).scroll(function(){
     var scrollTop = $(this).scrollTop();

     if(scrollTop ==0){
       $("header").fadeIn(500);
     }

   });

 });

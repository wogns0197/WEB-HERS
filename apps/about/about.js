$(document).ready(function() {
   $("#info").click(function() {
     var info = $(".siteinfo").offset().top;
     $("body").animate({"scrollTop": info},500);
     $("header").fadeOut(500);
   });
   $("#dev").click(function() {
     var dev = $(".developer").offset().top;
     $("body").animate({"scrollTop": dev},500);
     $("header").fadeOut(500);

     setTimeout(function(){
       $(".developer h2").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},400);
       $("#kwon").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},500);
       $("#seo").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},600);
       $("#choi").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},700);
       $("#park").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},800);
     },700);

   });
   $("#ctct").click(function() {
     var ct = $(".contact").offset().top;
     $("body").animate({"scrollTop": ct},500);
     $("header").fadeOut(500);
   });

   $(".entire").fadeOut(0);
   $(".entire").fadeIn({queue: false, duration: 800});
   $(".entire").animate({ top: "15%" }, 800);
   setTimeout(function(){
      $("#firsttitle").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},200);
      $("#firsttitle+p").delay(500).css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},200);
   },700);
   setTimeout(function(){
      $("#clock").css({visibility:"visible", opacity: 0.0}).animate({rotate: '360deg',opacity: 1.0},400);
      $("#clock+p").delay(500).css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},200);
      // https://github.com/zachstronaut/jquery-animate-css-rotate-scale rotate animation reference
   },2000);

   $(window).scroll(function(){
     var scrollTop = $(this).scrollTop();
     var developerdiv = $(".developer").offset().top;

     if(scrollTop ==0){
       $("header").fadeIn(500);
     }
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
     // if(scrollTop > developerdiv-350){
     //   $(".developer h2").css({visibility:"visible"});
     // }
     // if(scrollTop > developerdiv-250){
     //   $("#kwon").css({visibility:"visible"});
     //   $("#seo").css({visibility:"visible"});
     // }
     // if(scrollTop > developerdiv-100){
     //   $("#choi").css({visibility:"visible"});
     //   $("#park").css({visibility:"visible"});
     //}

   });


 });

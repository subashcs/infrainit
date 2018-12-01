
$(document).ready(function(){

  $(window).on('scroll', function () {
      var scrollTop     = $(window).scrollTop(),
          elementOffset = $('#categorized_mat').offset().top,
          distance      = (elementOffset - scrollTop);//distance of top from window top
           windowHeight = $(window).height(),

     delta = Math.abs(elementOffset- (scrollTop + windowHeight));
     del=delta-$("#categorized_mat").height();//distance of bottom from window bottom

   if(distance<-15&&del<20){
     $("#wrap_side_cart").css("position","fixed");

       $("#wrap_side_cart").css("top","0");

         $("#wrap_side_cart").css("right","0");
   }
   else{

       $("#wrap_side_cart").css("position","static");
   }

  });
});

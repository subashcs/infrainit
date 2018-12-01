$(document).ready(function(){

  $('#left_tr').click(function(){
    var a= $(".mySlidesupp").position().left;
    var b= $(".slideshow-container").position().left;
    var c= $(".mySlidesupp").width();
    children=$(".mySlidesupp").toArray();
    var count=children.length;
    c=$(".mySlidesupp").position().left+c*count;
     var d= $(".slideshow-container").offset().left + $(".slideshow-container").outerWidth();

     //insert logic if the right offset reaches the width equals value then stop
     if(c>=d/1.3)
     {
    $('.mySlidesupp').animate({left:"-=10%"},500,'linear',function(){

    });
     }
  });
  $('#right_tr').click(function(){
    var a= $(".mySlidesupp").position().left;
    var b= $(".slideshow-container").position().left;
    var c= $(".mySlidesupp").width();
    children=$(".mySlidesupp").toArray();
    var count=children.length;
    c=$(".mySlidesupp").position().left+c*count;
     var d= $(".slideshow-container").offset().left + $(".slideshow-container").outerWidth();

    if(a<=(d/2))
    {
    $('.mySlidesupp').animate({left:"+=10%"},500,'linear',function(){

    });
  }
  });
});

$(document).ready(function(){

$(".like_house").click(function(){
 var shower=$(this).next();
  var but=$(this).children("#up");
  
  val=$(this).next().next().val();//encrypt the value of house id in php and retrive
  //it on the php action file by decryption
   
var datas="liked_house=" + val;

$.ajax ({
    type:'POST',
    url: '/ibuild/house_architectures/liker.php',
    data: datas,

    success: function (data) {
      if($.isNumeric(data))
         {
          shower.html(data);
        
           if(but.hasClass("fa-thumbs-up")){
             but.addClass('fa-thumbs-o-up').removeClass('fa-thumbs-up');
           }
           else{
             but.addClass('fa-thumbs-up').removeClass('fa-thumbs-o-up');

           }
         }
         else{
           alert(data);
         }
       },
         error: function (php_script_response) {
          alert("failure");
         }
  });
});

$(".dislike_house").click(function(){

var shower=$(this).next();
  var but=$(this).children("#down");
  
  val=$(this).prev().val();//encrypt the value of house id in php and retrive
  //it on the php action file by decryption
  
var datas="disliked_house=" + val;

$.ajax ({
    type:'POST',
    url: '/ibuild/house_architectures/disliker.php',
    data: datas,

    success: function (data) {
       if($.isNumeric(data))
          {
            shower.html(data);
            if(but.hasClass("fa-thumbs-down")){
              but.addClass('fa-thumbs-o-down').removeClass('fa-thumbs-down');
            }
            else{
            but.addClass('fa-thumbs-down').removeClass('fa-thumbs-o-down');

            }
        }
          else{
            alert(data);
            }
           },
         error: function (php_script_response) {
          alert("failure");
         }
  });
});
});

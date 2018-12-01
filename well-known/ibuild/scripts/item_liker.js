$(document).ready(function(){

  $("#like_item_fn").click(function(){
    var a=$("#itstheid").val();

    var l=$("#items_likes_shower");




    var datato="itid="+a;
    liker(datato,l);
  });
  function liker(datato,v){
    $.ajax({
      type:"POST",
      url:"itemlike.php",
      data: datato,
      success: function (data) {
        
        var k=v.html();
         k=parseInt(k);
        if(data=="liked"){
            v.text(k+1);
            $("#thumbs-up").attr("class","fa fa-thumbs-up");
        }
        else if(data=="disliked"){
             v.text(k-1);

             $("#thumbs-up").attr("class","fa fa-thumbs-o-up");
        }
        else{
          alert("data error");
        }

        },
      error: function () {
       alert('Error');
      }
    })
  }
});

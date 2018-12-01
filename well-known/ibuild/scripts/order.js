$(document).ready(function(){
  $(".send_ord").click(function(){
    var ba=$(this).next();
    var a=ba.val();
    var va="o_id="+a;

    $.ajax({
      type: "POST",
      url: "targetaccount/send.php",
      data:va,   //expect html to be returned
      success: function(data){

    if(data=='0'){
      $(this).prop('checked', true);
          ba.next().html("Sent");
      }
      else if(data=='1'){
        $(this).prop('checked' , false);
        ba.next().html("Not sent");
      }
      else{

          alert("there is an error please report to us");
      }
          //alert(response);
      },
      error: function(){
        alert("error");
      }
    })
  });
  $("#pend_order").click(function(){

      var a=$("#o_id_to").val();
      var va="o_id="+a;

      $.ajax({
        type: "POST",
        url: "pendorder.php",
        data:va,   //expect html to be returned
        success: function(data){

          location.reload();
        },
        error: function(){
          alert(" error");
        }
      });
  });

  $("#deny_order").click(function(){
    $("#hold_reason_specifier_deny").show();

      var a=$("#o_id_to").val();

    $("#done_reasoning").click(function(){
          var b=$("#reason_deny").val();
          var va="o_id="+a+"&reason="+b;
    if(b!=' ')
     {
      $.ajax({
        type: "POST",
        url: "deny.php",
        data:va,   //expect html to be returned
        success: function(data){
          location.reload();
        },
        error: function(){
          alert(" error");
        }
      });
    }
  else{
      alert("please provide valid reason");
    }
      });
  });


    $("#deny_order_un").click(function(){

        var a=$("#o_id_to").val();

            var va="o_id="+a;
        $.ajax({
          type: "POST",
          url: "deny.php",
          data:va,   //expect html to be returned
          success: function(data){
            location.reload();
          },
          error: function(){
            alert(" error");
          }
        });
      
    });
  $("#hold_reason_specifier_deny").hide();
});

$(document).ready(function(){
  var ppu;
  $('.order_now_divclass').hide();
  var flag=0;
$('.order_now_but').click(function(){
  //using relative approach to find the clicked divs id
  var b=$(this).prev('input').attr('value');


  var data_string="cartid=" + b ;


  $.ajax({
  type:"POST",
  url:"sendorder.php",
  data: data_string,

        success: function (data) {
           $(".order_now_divclass").show();
            $(".order_now_divclass").html(data);
            $("#size_click").focusout(function(){
              var sc=$(this).val();
              data="size="+sc;
            //send a ajax request to find the corresponding price
            $.ajax({
               type:"post",
               url:"extractprice.php",
               data:data,
              success:function(data){

               $("#amount_c").focusout(function(){
                  var a=$("#amount_c").val();
                  var bp=data;
                  ppu=data;
                  var cp=a*bp;
                  $("#total_price_shower").html(cp);
               });
               },
               error:function(){
                   alert("error");
               }

          });
          });
            $('#supplylocation').hide();
            $("#cancel_button_ontop").click(function(){
              $('.order_now_divclass').hide();
            });
           //
           $("#setcustaddress").click(function(){
             $('#supplylocation').show();
           });
           $("#setcuraddress").click(function(){
             $('#supplylocation').hide();
           });
         //for final orders

          $("#order_final_button").click(function(){

                      var a=$("#amount_c").val();
                      var bp=ppu;
                      var cp=a*bp;

                      var pt=document.forms['order_form']['payment_type'].value;
                      var elem=document.forms['order_form']['sizes'];
                    if($( elem ).length){
                      size=elem.value;
                    }
                    else{
                      size="";
                    }
                    var datas;

                      var gana=$("#gaunagar").val();
                      var oda=$("#oda").val();
                      var street=$('#street').val();
                      var exadd=$("#extraaddr").val();
                      if(gana){
                      datas="size="+size+"&id="+b+"&price="+cp+"&payt="+pt+"&amount_m="+a+"&gana="+gana+"&oda="+oda+"&street="+street+"&exadd="+exadd;
                    }
                    else{
                      datas="size="+size+"&id="+b+"&price="+cp+"&payt="+pt+"&amount_m="+a;
                    }
                        $.ajax({
                             type:"POST",
                             url:"finalorder.php",
                             data: datas,

                                success: function (data) {
                                     alert(data);
                                     $('.order_now_divclass').hide();
                                     location.reload();
                                      },
                                 error: function () {
                                     alert('Error');
                                    }
                              });


                    });

           },
         error: function () {
          alert('Error');
         }
  });//ajax function ends

  });
  $("#received_item_status").focusout(function(){
    var statc=$("#received_item_status").val();
    var oi=$("#id_oforder").val();
    var datato="stat="+statc + "& oid=" + oi;

    $.ajax({
      type:"POST",
      url:"change_ship_status.php",
      data: datato,

             success: function (data) {
              alert(data);

               },
             error: function () {
              alert('Error');
             }
    });
  });

  $("#cross_test i").click(function(){

     var b=$(this).prev('input').attr('value');
     var datato="del="+b;
         $.ajax({
           type:"POST",
           url:"del_cookie.php",
           data: datato,

                  success: function (data) {
                   alert(data);
                   location.reload("/ibuild/cart");

                    },
                  error: function () {
                   alert('Error');
                  }
        });
  });
        $("#reclaim_order").click(function(){

           var b=$('#id_oforder').val();
           var datato="del="+b;
               $.ajax({
                 type:"POST",
                 url:"reclaim.php",
                 data: datato,

                        success: function (data) {
                         alert("hey");
                         location.replace("/ibuild/cart");

                          },
                        error: function () {
                         alert('Error');
                        }
              });


  });


});

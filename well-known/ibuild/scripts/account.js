$(document).ready(function(){

  $("#comp_edit").show();
  $('#edit_info').show();
  $('#edit_info').click(function(){
  $('#edit_info').hide();
  $('#proprieter').html("<input type='text' name='proprieter' placeholder='Enter new name' id='prop_input' required/>");
  $("#citznum").html("<input type='text' name='' placeholder='Enter citizenship no' id='cit_input' required/>");
  $('#done_edit').show();

})//edit clic function ends
$("#done_edit").click(function()
{
  val1=document.getElementById('prop_input').value;
  val2=document.getElementById('cit_input').value;
var data_string="proprieter=" + val1 +"& citznum="+val2;

$.ajax({
  type:"POST",
  url:"targetaccount/send_name_citz.php",
  data: data_string,

         success: function (data) {
            alert('Success');
            location.reload();
           },
         error: function () {
          alert('Error');
         }
  });//ajax function ends

})//done click function ends

 $("#comp_edit").click(function(){
    $("#comp_edit").hide();
    $("#company_name_sup").hide();
    $("#company_des_sup").hide();
    $("#comp_name").show();
    $("#comp_des").show();
    $("#done_namedet_edit").show();
 });

$("#done_namedet_edit").click(function()
{
  val1=document.getElementById('comp_name').value;
  val2=document.getElementById('comp_des').value;
var data_string="comp_name=" + val1 +"& comp_des="+val2;

$.ajax({
  type:"POST",
  url:"targetaccount/send_comp_name_des.php",
  data: data_string,

         success: function (data) {
            alert('Success');
            location.reload();
           },
         error: function () {
          alert('Error');
         }
  });//ajax function ends

})//edit done
//



//for customer js
$("#edit_infos").click (function(){
  $("#website").hide();
  $("#edit_infos").hide();
  $("#website_add").show();
  $("#per_address_show").hide();
  $("#permanent_address").show();
  $("#done_infos").show();
});
  $("#done_infos").click(function()
   {
    val1=document.getElementById('website_add').value;
    val2=document.getElementById('district').value;
    val3=document.getElementById('metropolitan').value;
    val4=document.getElementById('oda').value;
    val5=document.getElementById('street').value;
  var data_string="web=" + val1 +"& district="+val2+" &metropolitan="+val3+"&oda=" + val3+"&oda="+ val4+"&street="+val5;

  $.ajax({
    type:"POST",
    url:"targetaccount/send_costumer_des.php",
    data: data_string,

           success: function (php_script_response) {
              alert(php_script_response);
              location.replace();
             },
           error: function () {
            alert(php_script_response);
           }
    });//ajax function ends

  })//edit done

  $("#edit_image").click(function(){
    $("#edit_image").hide();
    $("#image_file_to").show();
    $("#done").show();
  })

  $("#done").click(function()
  { var user=document.getElementById('secretly_user').value;
    var file_data = $('#image_file_to').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('user',user);

  $.ajax({
     url: 'targetaccount/send_image_des.php', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response);
                    location.reload(); // display response from the PHP script, if any
                },
           error: function () {
            alert('Error');
           }
    })//ajax function ends

  })//edit done
  $("#submitdesc").hide();
  $("#edit_des_cust").click(function(){
    $("#user_view").show();
    $("#clickonedit").hide();
    $("#edit_des_cust").hide();
    $("#submitdesc").show();
  })
  $("#submitdesc").click(function(){
    val1=$('#user_view').val();
    val2=$('#secretly_user').val();

  var datas="user_views=" + val1 +"&user=" + val2;

  $.ajax ({
      type:'POST',
      url: 'targetaccount/send_customer_views.php',
      data: datas,

      success: function (php_script_response) {
              alert(php_script_response);
              location.reload();
             },
           error: function (php_script_response) {
            alert("failure");
           }
    })
  })
  
  //code for architect 
  $("#edit_des_arc").click(function(){
      $("#arc_right_des_shower").hide();
      $("#architect_company").show();
      $("#user_view").show();
      $("#submitarcdesc").show();
      $("#cancelarcdesc").show();
      $("#cancelarcdesc").click(function(){
          $("#arc_right_des_shower").show();
          $("#architect_company").hide();
          $("#user_view").hide();
          $("#submitarcdesc").hide();
          $("#cancelarcdesc").hide();
      })
  $("#submitarcdesc").click(function(){
      val1=$("#architect_company").val();
      val2=$("#user_view").val();
      var  datato="cn="+val1+"&cd="+val2;
      $.ajax({
          type:"post",
          url:"targetaccount/architect_right_add.php",
          data:datato,
          success:function(data){
          
              alert(data);
              location.reload();
          },
          error:function(error){
              alert("Error");
          }
      })
  })
  })
  
});

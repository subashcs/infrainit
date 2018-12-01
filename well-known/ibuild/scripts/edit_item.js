$(document).ready(function() {

  $('#file').change(function() {

          var mat=$("input[name=matid]").val();
          document.getElementById('progress-div').innerHTML="Uploading";
            var file_data = $('#file').prop('files')[0];
            var form_data = new FormData();
            form_data.append('ifile', file_data);
            form_data.append('mat',mat);

          $.ajax({
             url: 'edit_my_mat_image.php', // point to server-side PHP script
                          // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(data){
                          alert(data);  location.reload(); // display response from the PHP script, if any
                        },
                   error: function () {
                    alert('Error');
                   }
   });

});
    // process the form
    $('#done_edit_item').click(function(event) {
      // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        /*var formData = {

            'matid'  : $('input[name=matid]').val(),
            'ext_details'  : $('#ext_details').val(),
            'priceadd'  : $('input[name=priceadd]').val(),
            'cat'    : $('input[name=cat]').val(),
            'avail_amnt'   : $('input[name=avail_amnt]').val(),
            'price[]'  : $("input[name='price[]']").val(),
            'manufacturer' : $('input[name=manufacturer]').val(),
            'reg_id'  : $("input[name='reg_id[]']").val(),
            'supplyreg'  : $("input[name='supplreg[]']").val(),
            'size_id' : $("input[name='size_id[]']").val(),
            'size[]'    : $("input[name='size[]']").val(),
            'addedsr':$('input[name=addedsr]').val(),
            'addedsize':$('input[name=addedsize]').val()
        };*/
        formData=$("#edit_item_form").serialize();
        $("#informer").text("Loading..");
        // process the form
        $.ajax({
            type: "POST", // define the type of HTTP verb we want to use (POST for our form)
            url : "edit_my_mat_det.php ", // the url where we want to POST
            data: formData, // our data object
             // what type of data do we expect back from the server



                 success: function (php_script_response) {

                          alert(php_script_response);
                          location.reload();
                         },
                       error: function () {
                        alert(error);
                       }
        // stop the form from submitting the normal way and refreshing the page
        })
        event.preventDefault();
    });

    //code for delete the material

    $("#show_options").hide();
    $("#delete_material").click(function(){
      var mat= $('input[name=matid]').val();
      var dat="mat="+mat;
      $("#show_options").show();
      $("#yesdel").click(function(){
        $("#show_options").hide();
      $.ajax({
        type:"GET",
        url:"../accounts/targetaccount/delete_from_db.php",
        data:dat,
        success:function(data){
          alert(data);
          if(data=="Successfully Deleted"){
            location.replace("../accounts");
          }
        },
        error:function(){
          alert("Something went wrong");
        }
      });

    });
    $("#nodel").click(function(){
      $("#show_options").hide();

     });
    });

});

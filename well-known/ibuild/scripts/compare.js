$(document).ready(function(){
 $("#re-btn").hide();
$("#choose_p").hide();
   var a="";
   var b="";
   $("#cancel-btn").click(function(){
       $("#product1").show();
      $("#choose_p").hide(); 
        $("#button_choose_p1").show();
         $("#description").show();
         $("#totalresponse").html(" ");
          
            $("#comp-btn").show();
   })
   
   
$("#button_choose_p1").click(function(){
  $("#button_choose_p1").hide();
  $("#choose_p").show();
  $("#cancel-btn").show();
  $("#description").hide();
  

//the following is the code for selection of category and showing the values
  var sc=$("#sel_category").val();
  var va="sc="+sc;
    $.ajax({    //create an ajax request to load_page.php
        type: "POST",
        url: "showselcat.php",

        data:va,   //expect html to be returned
        success: function(data){
        $("#choose_p").html(data);
            //alert(response);
        },
        error: function(){
          alert("error in selection #comp1");
        }

    })

//the following code is the one executed when compare button is clicked

  $('#comp-btn').click(function(){
     var checked = [];
     $("input[name='items[]']:checked").each(function ()
     {
       checked.push(parseInt($(this).val()));
     });

     a=checked[0];
     b=checked[1];
    $("#product1").hide();
    $("#choose_p").hide();
    var va="a="+ a +"&b="+b ;
 $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "displayselcomp.php",
        dataType: "html",
        data:va,   //expect html to be returned
        success: function(response){
            $("#cancel-btn").show();
            $("#comp-btn").hide();
            $("#totalresponse").html(response);
            //alert(response);
        }

    })

  })
})



})

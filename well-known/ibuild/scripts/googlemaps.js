$(document).ready(function(){
  var c;
  var d;
$("#location_adder_wrap").hide();
$("#add_loc").click(function(){
 $("#location_adder_wrap").show();
 $(this).hide();
     $("#add_custom_loc").click(function(){
       var a=$("#lati_add").val();
       var b=$("#longi_add").val();
       var va="lat="+a+"&long="+b;
       $.ajax({    //create an ajax request to load_page.php
              type: "POST",
              url: "targetaccount/add_direct_loc.php",

              data:va,   //expect html to be returned
              success: function(response){

                                     if(response=="success"){
                                     $("#alert_u").html("you are done now");
                                       setTimeout(function(){$("#alert_u").html(" ");}, 6000);
                                   }
                                   else{

                                   $("#alert_u").html("Something went wrong");
                                    setTimeout(function(){  $("#alert_u").html(" ");}, 6000);
                                   }
                                   location.reload();
              },
              error:function(){
                alert("error");
              }

              });
         });
     $("#add_location_directly").click(function(){
       //code copied from google
       if (navigator.geolocation) {
        console.log('Geolocation is supported!');
      }
      else {
        console.log('Geolocation is not supported for this Browser/OS.');
      }
          var startPos;
          var geoSuccess = function(position) {
            var geoOptions = {
              maximumAge: 5 * 60 * 1000,
             timeout: 10 * 1000
           }
          startPos = position;
          //execute ajax after the function knows baglung is in Nepal
            c= startPos.coords.latitude;
            d= startPos.coords.longitude;
            var va="lat="+c+"&long="+d;
            
            $.ajax({    //create an ajax request to load_page.php
                   type: "POST",
                   url: "targetaccount/add_direct_loc.php",

                   data:va,   //expect html to be returned
                   success: function(response){

                     if(response=="success"){
                     $("#alert_u").html("you are done now");
                       setTimeout(function(){$("#alert_u").html(" ");}, 6000);
                   }
                   else{

                   $("#alert_u").html("Something went wrong");
                    setTimeout(function(){  $("#alert_u").html(" ");}, 6000);
                   }
                   location.reload();
                   },
                   error:function(){
                     alert("error");
                   }

                   });

          };
          var geoError = function(error) {
            console.log('Error occurred. Error code: ' + error.code);
            // error.code can be:
            //   0: unknown error
            //   1: permission denied
            //   2: position unavailable (error response from location provider)
            //   3: timed out
          };
          navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
       //done

     });
});

});

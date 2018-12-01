    $(document).ready(function () {
        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.

           $.ajax({
             type:"post",
             url:"/ibuild/blocks/main/countnotices.php",
         success:function(data){


      $('#noti_Counter')
            .css({ opacity: 0 })
            .text(data)              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
            .css({ top: '-10px' })
            .animate({ top: '-2px', opacity: 1 }, 500);
          },

          error:function(){

          }
        });
        $('#noti_Button').click(function () {

          var xmlhttp = new XMLHttpRequest();

           document.getElementById("notices").innerHTML = "";
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                if(this.responseText){

                  erows = JSON.parse(this.responseText);


                  for(var i=0; i< erows.length;i++){
                   var a= document.createElement("a");
                   a.setAttribute("href",erows[i]['dest_url']);
                   a.setAttribute("id","a_notice");
                   a.setAttribute("target","_blank");
                   a.innerHTML=erows[i]['topic'];

                    document.getElementById("notices").appendChild(a);
                  }
                }
                  else{

                    var a= document.createElement("a");
                    a.setAttribute("href","/ibuild/blocks/login.php");
                    a.setAttribute("id","a_notice");
                    a.setAttribute("target","_blank");
                    a.innerHTML="Welcome to our site Get started by logging in!";
                    document.getElementById("notices").appendChild(a);


                  }
              }
          };
          xmlhttp.open("GET", "/ibuild/blocks/main/fetch_notices.php", true);
          xmlhttp.send();

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#noti_Button').css('background-color', '#fafafa');
                }
                else $('#noti_Button').css('background-color', '#FFF');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
            });

            $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER. TODO add new count of unread notifications after user reads them

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                $('#noti_Button').css('background-color', '#fafafa');
            }
        });

    //    $('#notifications').click(function () {
      //      return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
        //});
    });

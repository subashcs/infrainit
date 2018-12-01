//email validation
$(document).ready(function()
{


  //similarly fetching data from database to check if email
   //exists already
  $('#log_box1 #email').focusout(function(){

                $('#email').filter(function(){
                   var emil=$('#email').val();
              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //similarly fetching data from database to check if email
         //exists already

            if( !emailReg.test( emil)||emil=='' ) {
                $('#label1').text('Please enter valid email');
                $("#log_box1 #continue").prop("type", "button");

                }
                else {

                $('#label1').text('Thank you for your valid email');
                $("#log_box1 #continue").prop("type", "submit");

                   }

                });
            });
            $('#email2').focusout(function(){



                          $('#email2').filter(function(){
                             var emil=$('#email2').val();
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;


                      if( !emailReg.test(emil)||emil=='') {
                          $('#label3').text('Please enter valid email');
                          $("#log_box3 #continue").prop("type", "button");
                          }
                          else {
                          $('#label3').text('Thank you for your valid email');
                          $("#log_box3 #continue").prop("type", "submit");

                        }
                        });
                      });
                      $('#email').focusout(function(){
                        var str=document.getElementById('email').value;
                        if (str.length == 0) {
                              document.getElementById("email_status").innerHTML = "";
                              return ;
                          } else {
                              var xmlhttp = new XMLHttpRequest();
                              xmlhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                      document.getElementById("email_status").innerHTML = this.responseText;
                                  }
                              };
                              xmlhttp.open("GET", "login/checkemail.php?q=" + str, true);
                              xmlhttp.send();
                          }
                      });
                      $('#email2').focusout(function(){
                        var str=document.getElementById('email2').value;
                        if (str.length == 0) {
                              document.getElementById("email_stat").innerHTML = "";
                              return ;
                          } else {
                              var xmlhttp = new XMLHttpRequest();
                              xmlhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                      document.getElementById("email_stat").innerHTML = this.responseText;
                                  }
                              };
                              xmlhttp.open("GET", "login/checkemail.php?q=" + str, true);
                              xmlhttp.send();
                          }
                      });
                  
          });

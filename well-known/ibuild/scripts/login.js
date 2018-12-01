$(document).ready(function()
{
    $("#esewa_name").hide();
    
    
  var firstbox=document.getElementById("log_box1");
  var thirdbox=document.getElementById("log_box3");
  var ersign=document.getElementById('errsign');
  var log=document.getElementById('login_button');
  var sig=document.getElementById('signup_button');
  log.style.color="#2c3e50";
  log.style.background="#fff";
   thirdbox.style.display="none";
   $('#login_button').click(function(){
    thirdbox.style.display="none";
    firstbox.style.display="block";
     log.style.color="#2c3e50";
     log.style.background="#fff";
     sig.style.color="#fff";
     sig.style.background="#2c3e50";

   })
   $('#signup_button').click(function()
 {
   thirdbox.style.display="block";
   firstbox.style.display="none";
   sig.style.color="#2c3e50";
   sig.style.background="#fff";
   log.style.color="#fff";
   log.style.background="#2c3e50";


 });
 if(ersign.textContent)
 {
   sig.click();
 }

              //the following code is to prevent form submit on enter key press
  $(document).keydown(function(event){
         if(event.keyCode == 13) {
               event.preventDefault();
                   return false;
             }
               });

               var akl=document.forms['signupf']['pan_no'];
               var b=document.forms["signupf"]["company_name"];
               var c=document.forms["signupf"]["description"];
               var d=document.forms['signupf']['cdate'];
               var e=document.forms['signupf']['udate'];
               var f=document.getElementById('estd');
               var g=document.getElementById('dob');
                     b.style.display="none";
                     c.style.display="none";
                     d.style.display="none";
                     f.style.display="none";
                     akl.style.display="none";


      //what to show in signup form
     $('#user_type').mouseout(function(){
       var a=document.forms["signupf"]["user_type"].value;
       var b=document.forms["signupf"]["company_name"];
       var c=document.forms["signupf"]["description"];
       var akl=document.forms['signupf']['pan_no'];
       if(a=='customer')
       {
        b.style.display="none";
        c.style.display="none";
        d.style.display="none";
        e.style.display="inline-block";
        g.style.display="inline-block";
        f.style.display="none";
        akl.style.display="none";
       }
       else if(a=='supplier'){
          b.style.display="inline-block";
          c.style.display="inline-block";
          d.style.display="inline-block";
          e.style.display="none";
          g.style.display="none";
          f.style.display="inline-block";
          akl.style.display="inline-block";
       }
       else{
           
        b.style.display="inline-block";
        c.style.display="inline-block";
        d.style.display="none";
        e.style.display="inline-block";
        g.style.display="inline-block";
        f.style.display="none";
        akl.style.display="none";
           
       }
     });


       w=document.getElementById('esewa');

        

      $('#esewa').click(function(){
           if(w.checked){
             $("#esewa_name").show();
             $("#esewa_name").attr('required',' ');
      
         }
         else{
            $("#esewa_name").removeAttr('required');
           $("#esewa_name").hide();    
         }
       })


  });

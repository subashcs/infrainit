<div id="footer">
  <ul id="share_site">
    <li id="image_view"><img src="/ibuild/images/footer-share-site.png" class="foot-img"></li>
    <li id="facebook" onclick="gotofacebook()">facebook</li>
    <li id="twitter" onclick="gototwitter()">twitter</li>
    <li id="google">google+</li>
    <li id="whatsapp">Whats app</li>
    <script type="text/javascript">
    function gotofacebook(){

    }
    function gototwitter(){

    }
    </script>
   </ul>
  <ul id="major_elements_wrap_foot">
    <li id="company">
      <h3>Company</h3>
       <a href="/ibuild/about_us.php">About us</a><br/>
       <a>blog</a><br/>
       <a href="http://www.subashcs.com.np">About the Developer</a><br/>
       <a href="/ibuild/contact.php">Contact us</a><br/>
       <a>Organization</a><br/>
       <a href="/ibuild/blocks/measurments.php" target=new>Measurement Standards</a>

    </li>
       <li id="company">
      <h3>Useful Sites</h3>
       <a>Blank2</a><br/>
       <a>Blank2</a><br/>
      

    </li>
    <li id="products" style="margin-left:5%;">
      <h3>Products</h3>
      <a href="/ibuild/blocks/showmat.php?cat=bricks">Bricks</a><br/>
      <a href="/ibuild/blocks/showmat.php?cat=blocks">Blocks</a><br/>
      <a href="/ibuild/blocks/showmat.php?cat=rods">Rods</a><br/>
      <a href="/ibuild/blocks/showmat.php?cat=cement">Cement</b><br/>
      <a href="/ibuild/blocks/showmat.php?cat=sand">Sand</a><br/>
      <a href="/ibuild/blocks/showmat.php?cat=gravel">Gravel</a><br/>
    </li>
    <li id="wwf" style="margin-left:-1%;">
     <ul id="wrap_rem"style="margin-left:-9%;">
      <li id="support">
        <h3>Support</h3>
        <a>Help Center</a><br/>
        <a>Report Spam/abuse</a><br/>
      </li>
      <li id=" message">
        <h3> Message</h3>
        <a>Messenger</a><br/>
        <a>Whats app</a><br/>
      </li>
      <li id="follow us">
        <h3>Follow</h3>
        <b>facebook</b><br/>
        <b>twitter</b><br/>
      </li>

      <li id="subscribe_to_newsletter">
        <span style="font-weight:bold;text-align:left;font-size:100%;margin-top:5%;display:block;"><i class="fa fa-envelope"> </i> Subscribe to notifications</span>
         Get notifications about new products and Offers
      <form id="newsletter" action="">
          <br/>
          <input type="email" placeholder="Type your email" name="email" id="subscribed_email">
          <button type="button" id="subscribe_button" onclick="subscriber()">Subscribe</button>
          <p id="response_subscribed" style="color:maroon;font-size:80%;text-align:left;"></p>
   <!--javascript for above-->
          <script type="text/javascript">


          function subscriber(){

             var val=document.getElementById('subscribed_email').value;
             var form_data="emaildata="+ val;
            $('#subscribed_email').filter(function(){
                   var emil=$('#subscribed_email').val();
                  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
               //similarly fetching data from database to check if email
              //exists already

             if( !emailReg.test( emil)||emil=='' ) {
                  $('#response_subscribed').text('Please enter valid email!');

              }
           else{
             $.ajax({
                    type: "POST",
                    url: '/ibuild/blocks/footer/footeractions/addsubscriber.php', // point to server-side PHP script
                         dataType: 'text',  // what to expect back from the PHP script, if anything
                         data: form_data,

                         success: function(data){
                             alert(data);
                            // display response from the PHP script, if any
                        },
                    error: function () {
                     alert('Error');
                    }
             });
           }
         });
       }
          </script>
      </form>

      </li>
     </ul>
   </li >
 </ul>
 <ul id="bottom">
   <li style="margin-right:5%;font-weight:bold;">Copyright &copy <?php echo date("Y");?> Infrainit. All Rights Reserved</li>
   <li id="co_last"><a href="/ibuild/blocks/main/privacy_policy.htm" target=new><h4>Privacy<br/>
       Policy</h4></a>
   </li>
   <li id="co_last"><a href="/ibuild/blocks/main/refund_policy.html" target=new><h4>Refund<br/> Policy</h4></a></li>
   <li><b>Payment
      methods:</b>
   </li><!--
   <li> <img src="/ibuild/images/Paypal.png" alt="Paypal" width="98px"></li>-->
   <li><img src="/ibuild/images/esewa.png" akt="esewa" width="90px"></li>
   <li><img src="/ibuild/images/cashondelivery.png" akt="esewa" width="95px"></li>
   
 </ul>

</div>

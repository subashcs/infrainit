<?php
require '../system/init.php';

?>
<!Doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Compare products</title>
  <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css"; rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
   <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
  <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="../scripts/compare.js" type="text/javascript"></script>
  <script src="../scripts/notify.js" type="text/javascript"></script>
</head>
  <body id="compare_body">

       <?php include $_SERVER['DOCUMENT_ROOT'].'/ibuild/blocks/header/header.php'; ?>

    <div id="wrap_compare">
        
      <form id="choose category">
       <!-- use ajax here to send the user choose category data to the variable
       on this page $var-->
      <b style="color:indigo;font-size:110%;"> Choose Category:</b>
       <select name="category" id="sel_category">
        <option value="bricks">Bricks</option>
        <option value="rods">Rods</option>
        <option value="cement">Cement</option>
        <option value="gravel">Gravel</option>
        <option value="sand">Sand</option>
        <option value="blocks">Blocks</option>
        <option value="others">Others</option>

       </select>
     </form>
    <div id='products'>
      <button name="compare" id="re-btn">Return</button>
      <table id='description'>
         <tr>
           <td id='product1'>
               <button name='button_choose_p1' id='button_choose_p1'><i class='fa fa-plus-circle' aria-hidden='true'> </i></button>
          </td>


          </tr>



            </table>
            <br/>
            <div id="totalresponse">


            </div>

            <!--this is to choose the item -->
            <div id="choose_p">
            </div>
            <br/>
            <button name="compare" id="comp-btn">compare</button>
            
            <button name="cancel" id="cancel-btn">Back</button>
    </div>
  </div>
    <div id="footer">
      <ul id="share_site">
        <li id="image_view"><img src="../images/footer-share-site.png" class="foot-img"></li>
        <li id="facebook">facebook</li>
        <li id="twitter">twitter</li>
        <li id="google">google+</li>
        <li id="whatsapp">Whats app</li>
       </ul>
      <ul id="major_elements_wrap_foot">
        <li id="company">
          <h3>Company</h3>
           <a>About us</a><br/>
           <a>blog</a><br/>
           <a>Contact us</a><br/>
           <a>Team</a>

        </li>
        <li id="products" style="margin-left:5%;">
          <h3>Products</h3>
          <a href="#">Bricks</a><br/>
          <a href="#">Blocks</a><br/>
          <a href="#">Rods</a><br/>
          <a href="#">Plywood</a><br/>
          <a href="#">Cement</b><br/>
          <a href="#">Sand</a><br/>
          <a href="#">pebbles</a><br/>
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
            <span style="font-weight:bold;text-align:left;font-size:110%;margin-top:5%;display:block;"><i class="fa fa-envelope"> </i> Subscribe to notifications</span>
             Get notifications about new products and Offers
          <form id="newsletter" action="newsletter.php">
              <br/>
              <input type="email" placeholder="Type your email" name="email">
              <input type="submit" class="subscribe" name="subscribe" value="Subscribe">
            </form>
          </li>
         </ul>
       </li >
     </ul>
     <ul id="bottom">
       <li style="margin-right:5%;font-weight:bold;">Copyright &copy 2017 i-build .All Rights Reserved</li>
       <li id="co_last"><a href="#"><h3>Privacy<br/>
           Policy</h3></a>
       </li>
       <li id="co_last"><a href="#"><h3>Refund<br/> Policy</h3></a></li>
       <li><b>Payment
          methods:</b>
       </li>
       <li> <img src="../images/visa.png" alt="visa" width="70px"></li>
       <li><img src="../images/esewa.jpg" akt="esewa" width="90px"></li>
     </ul>

    </div>

  </body>
</html>

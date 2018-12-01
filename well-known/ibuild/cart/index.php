

  <?php
if(count($_COOKIE) > 0&&!empty($_COOKIE['infracookie'])&&$_COOKIE['infracookie']!=" ") {

      $data =$_COOKIE['infracookie'];
      $data=explode(',',$data);
      }

?>
<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">

<head>
  <title>
    Cart
  </title>
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />

  <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css"; rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script  src="../scripts/cartorder.js" ></script>
  <script src="../scripts/notify.js" type="text/javascript"></script>
</head>
<body id="cart_body">
  <?php
  require '../blocks/header/header.php';

  require "../system/init.php";
  
   
  ?>
  <!--header finishes-->

  <h2 id="topics_cart">Not Yet Ordered</h2>

 <div id="mycartdiv">
  
      
      <?php
    if(isset($data)){
      
    for($i=0;$i<count($data);$i++){
        $iid=$data[$i];  

     $cartq=mysqli_query($db,"SELECT * FROM items AS p  INNER JOIN usersi AS u ON p.user_id=u.u_id WHERE p.id='$iid';");
     //selection of all

  while($items=mysqli_fetch_array($cartq))
  {

     ?>

  <table id="a_cart_item">
      <tr>
      <td colspan="5" id="first_row">

        <button id="cross_test"><input type='hidden'  value="<?php echo $data[$i];?>" >
          <i class="fa fa-close"></i></button></td></tr>
       <tr>
        <td rowspan="6">
         <?php
          $user_idfetched=$items['user_id'];
          $findsupp=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user_idfetched'");
          while($findsupparr=mysqli_fetch_assoc($findsupp))
          {
           $supplier=$findsupparr['email'];
           $img="../users/suppliers/".$supplier."/materials/".$items['material_name']."/images/".$items['f_image'];
          }
       ?>
     <img src="<?php echo $img;?>" alt="image"  height="139px" style="margin-bottom:-1%;">
       </td>


     </tr>

     <tr>
       <td>
         Name:<?php echo $items['material_name'];
         ?>
       </td>
     </tr>

       <tr>
        <td>
         Likes:<?php echo $items['likes'];?>
       </td>
      </tr>

       <tr>
        <td>

               <?php
                $mat_id=$iid;
                $sizes=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$mat_id'");
                while($sizearr=mysqli_fetch_assoc($sizes))
               {
                 echo " Per Unit Rs:".$sizearr['price_per_unit'];
                 if(!empty($sizearr['size'])){
               echo " for size ".$sizearr['size']."<br/> ";
                    }

                    }
                 ?>
        </td>
      </tr>

       <tr>
       <td>
         Manufacturer:<?php echo $items['manufacturer'];?>
       </td>
     </tr>

     <tr>
     <td>
       Available:<?php echo $items['available_amnt'];

        ?>
            </td>
    </tr>
    <tr>

    <td class="horizontal_button"  colspan="2">
      <input type='hidden' id="cartidpriv" value="<?php echo $data[$i];?>" >
        <?php
        
  //security mechanism starts
  $bool_log=0;
    
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
    //Security mechanism ends
        if(isset($_SESSION['u_id'])&&$bool_log==1){
        ?>
      <button type="button" class="order_now_but"> Order Now! </button></td>
    <?php }
     else{
       echo "<b>Please Login to Order now!</b>";
     }
     ?>
   </tr>
  </table>


<?php

    }

   }
  }
     else{
     echo"  No items in Cart! ";
     }
 ?>

</div>



<div id="order_now_div" class="order_now_divclass">


</div>

<div id="my_pending_items">
  <h3 id="topics_pending_cart" style="margin:-1% -1% 1% -1%;" data-toggle='tooltip' title='items you have ordered'>Ordered items</h3>
  <?php
  
  
  if(isset($_SESSION['u_id'])&&$bool_log==1)
  {
    $cid=$user;
  $order=mysqli_query($db,"SELECT * FROM orders_to_supp   AS p INNER JOIN items AS i ON p.material_id=i.id  WHERE p.request_maker_id='$cid'
  ORDER BY material_name;");//selection of all

  while($orders=mysqli_fetch_array($order))
  {
   ?>
   <div id="an_order_wrap">
   <table id="a_cart_item">
             <tr>
                 <td style="background:transparent;"><?php
             if($orders['denied']==1)
              {
                echo "<strong style='background:black;color:white;'>Denied</strong>";
              } ?></td>

             </tr>
        <tr>
         <td rowspan="6">
           <?php
            $user_idfetched=$orders['user_id'];
            $findsupp=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user_idfetched'");
            while($findsupparr=mysqli_fetch_assoc($findsupp))
            {
             $supplier=$findsupparr['email'];
             $img="../users/suppliers/".$supplier."/materials/".$orders['material_name']."/images/".$orders['f_image'];
            }
           ?>
       <img src="<?php echo $img;?>" alt="image"  >
         </td>
       </tr>

       <tr>
         <td>
           Name:<?php echo $orders['material_name'];
           ?>
         </td>
         <td id="contact_my_order_maker">Contact</td>
       </tr>

         <tr>
          <td>
           Likes:<?php echo $orders['likes'];?>
         </td>
         <td id="messager"><img src="../images/icons/fb-mes.png" width="34px"></img></td>
        </tr>


         <tr>
          <td>
           Price : Rs <?php echo $orders['total_price'];?>
          </td>
          <td><a href="<?php
              $phone=mysqli_query($db,"SELECT * FROM usersi WHERE email='$supplier'");
               while($numbers=mysqli_fetch_assoc($phone)){
                 $no=$numbers['phone'];
               }
           echo "tel:".$no;?> "><i class="fa fa-phone" style="font-size:40px;color:green"></i></a></td>

        </tr>

         <tr>
         <td>
           Shipment status:<?php if($orders['sent_status']==0)
           {
             echo "Not Sent";
           }
           else {
             echo "Sent"; }
           ?>
         </td>
       </tr>

       <tr>
       <td>
         Received Status:
         <select name="received_item_status" id="received_item_status">
          <option value="1" <?php if($orders['received_status']!=0) echo "selected";?> >Received</option>
          <option value="0"  <?php if($orders['received_status']==0) echo "selected";?>>Not Received</option>

        </select>
        <input type="hidden" id="id_oforder" value="<?php echo $orders['order_id'];?>"/>
      </td>
      </tr>

      <?php if($orders['sent_status']==0)
      {
        ?>
      <tr>
      <td id="reclaim_order" class="horizontal_button" colspan="2">
       reclaim order !
         </td>

      </tr>
    <?php }?>


  </table>
</div>
  <?php
     }
     if(mysqli_num_rows($order)==0){
       echo "<strong>No orders in the list</strong>";
     }
   }
   else{
     echo " <strong> Not available offline </strong>";
   }
  ?>
  <!--to show items already deleted but ordered first-->
  <h3 id="topics_pending_cart" style="margin:1% -1% 1% -1%;" data-toggle='tooltip' title='orders whose items deleted by suppliers'>Expired Orders</h3>
   
  <?php
  if(isset($_SESSION['u_id'])&&$bool_log==1)
  {
    $cid=$user;
  $order=mysqli_query($db,"SELECT * FROM orders_to_supp   AS p INNER JOIN items AS i ON p.material_id=i.id  WHERE p.request_maker_id='$cid' AND i.deleted='1'
  ORDER BY material_name;");//selection of all

  while($orders=mysqli_fetch_array($order))
  {
   ?>
   <div id="an_order_wrap">
   <table id="a_cart_item">
             <tr>
                 <td style="background:transparent;"><?php
             if($orders['denied']==1)
              {
                echo "<strong style='background:black;color:white;'>Denied</strong>";
              } ?></td>

             </tr>
        <tr>
         <td rowspan="6">
           <?php
            $user_idfetched=$orders['user_id'];
            $findsupp=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user_idfetched'");
            while($findsupparr=mysqli_fetch_assoc($findsupp))
            {
             $supplier=$findsupparr['email'];
             $img="../users/suppliers/".$supplier."/materials/".$orders['material_name']."/images/".$orders['f_image'];
            }
           ?>
       <img src="<?php echo $img;?>" alt="image"  >
         </td>
       </tr>

       <tr>
         <td>
           Name:<?php echo $orders['material_name'];
           ?>
         </td>
         <td id="contact_my_order_maker">Contact</td>
       </tr>

         <tr>
          <td>
           Likes:<?php echo $orders['likes'];?>
         </td>
         <td id="messager"><img src="../images/icons/fb-mes.png" width="34px"></img></td>
        </tr>


         <tr>
          <td>
           Price : Rs <?php echo $orders['total_price'];?>
          </td>
          <td><a href="<?php
              $phone=mysqli_query($db,"SELECT * FROM usersi WHERE email='$supplier'");
               while($numbers=mysqli_fetch_assoc($phone)){
                 $no=$numbers['phone'];
               }
           echo "tel:".$no;?> "><i class="fa fa-phone" style="font-size:40px;color:green"></i></a></td>

        </tr>

         <tr>
         <td>
           Shipment status:<?php if($orders['sent_status']==0)
           {
             echo "Not Sent";
           }
           else {
             echo "Sent"; }
           ?>
         </td>
       </tr>

       <tr>
       <td>
         Received Status:
         <?php
          if($orders['received_status']==0)
          { echo "Received"; 
          }
         else
         {
           echo"Not Received";
         }
           ?>

        </td>
      </tr>

      <?php if($orders['sent_status']==0)
      {
        ?>
      <tr>
      <td id="reclaim_order" class="horizontal_button" colspan="2">
       reclaim order !
         </td>

      </tr>
    <?php }?>


  </table>
</div>
  <?php
     }

     if(mysqli_num_rows($order)==0){
       echo "<strong>No orders in the list</strong><br/>";
     }
   }
   else{
     echo "<strong>Not available offline</strong>";
   }
  //end of shower
  ?>

</div>
<!--footer-->

 <?php include '../blocks/footer/footer.php';?>
</body>
</html>

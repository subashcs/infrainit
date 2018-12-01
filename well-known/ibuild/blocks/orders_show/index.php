<!Doctype html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="See order details for suppliers">
  <title>Order</title>
    <link rel="shortcut icon" type="image/png" href="http://www.infrainit.com/ibuild/images/logo.png" />
  <link href="../../css/font-awesome-4.7.0/css/font-awesome.min.css"; rel="stylesheet">
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="../../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="../../scripts/notify.js"></script>
  <script src="../../scripts/order.js"></script>

</head>
<body>
    
      <?php include "../header/header.php";?>
<h2 style="text-align:center;">Orders Details</h2>
<?php
$mat_id=$_GET['mat_id'];
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
 $uid=$user;
$findorders=mysqli_query($db,"SELECT * FROM orders_to_supp AS o INNER JOIN items AS i ON o.material_id=i.id  WHERE o.material_id='$mat_id' AND i.user_id='$uid'");
if(mysqli_num_rows($findorders)>0)
{
        while($ordersall=mysqli_fetch_assoc($findorders)){
          $o_id=$ordersall['order_id'];
          ?>
          <dl id="a_single_order">
            <input type="hidden" id="o_id_to" value="<?php echo $o_id;?>"/>
            <dt style="background-color:white;padding:1%;font-size:110%;"><?php $c_id=$ordersall['request_maker_id'];
                 $findcus=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$c_id'");
                 while ($customers=mysqli_fetch_assoc($findcus)) {
                   # code...
                   echo "<h4>".$customers['name']." ordered ";
                   $supplyaddropt=" ".$customers['district']." ".$customers['metropolitan']."-".$customers['oda']." ".$customers['street'];
                 }
                 echo $ordersall['order_amount']." units ";
                 $i_id=$ordersall['material_id'];
                 $finditem=mysqli_query($db,"SELECT category FROM items WHERE id='$c_id'");
                 while ($item=mysqli_fetch_assoc($finditem)) {
                   # code...
                   echo $item['category'];
                 }

                 $size=$ordersall['size'];
                 if(!empty($size))
                 {
                  echo " of size ".$size."</h4>";
                 }

                ?>
                 <sub style="text-decoration:italicsed;display:inline-block;"><?php echo $ordersall['date'];?></sub>

            </dt>
              <dd id="supply_location_show">Supply Location: <?php
              $locate=mysqli_query($db,"SELECT * FROM order_location WHERE order_id='$o_id'");
              if(mysqli_num_rows($locate)>0){
              while($rowsloca=mysqli_fetch_assoc($locate)){


                echo $rowsloca['gaunnagar'];
              }
            }
            else{
                    echo $supplyaddropt;

            }
              ?></dd>
              <dd>Payment Method: <?php if($ordersall['payment_method']=='cashondel'){
                echo "Cash On Delivery";
              };?></dd>
               <dd>
                          click the button to call order request maker <a href="<?php
                            $id=$ordersall['request_maker_id'];
                      $phone=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$id'");
                       while($numbers=mysqli_fetch_assoc($phone)){
                         $no=$numbers['phone'];
                       }
                   echo "tel:".$no;?> "><i class="fa fa-phone" style="font-size:40px;color:green"></i></a>
               </dd>
              <dd>Initial Payment Offered: <?php echo $ordersall['initial_paym_offered'];?></dd>
              <dd>Sent Status: <?php  if($ordersall['sent_status']==0){
                echo "Not Sent";
              }
              else{
                echo "Sent";
              }
              ;?></dd>
              <dd>Received Status:<?php if($ordersall['received_status']==0){
                echo "Not received by customer";
              }
              else{
                echo "Received by customer.Thanks for the service!";
              }?></dd>
              <dd>Total Amount: Rs <?php echo $ordersall['total_price'];?></dd>
              <dd>Receive Payment Now(for online payment only)<i> currently not available</i></dd>
              <dd>
              <?php
              if($ordersall['denied']==0){
                ?>
              <input type="checkbox" name="deny" id="deny_order">Deny
              <div id="hold_reason_specifier_deny">
              <textarea cols="35" rows='10' name="reason_deny" id="reason_deny"> </textarea>
               <button id="done_reasoning">Done</button>
              </div>
              <?php
                 }
              else{
                ?>
                <input type="checkbox" name="deny" id="deny_order_un" checked>Undo Deny
                <?php
              }?>
              </dd>
              <!--insert ajax for this-->
              <dd>
              <?php
              if($ordersall['queued']==0)
                {
                  ?>
                <button name="pend_order" id="pend_order"> <span id="info_text">Add to Queue</span></button>
              <?php
              }
              else {
                ?>
                <button name="pend_order" id="pend_order" checked> <span id="info_text">Added to Queue </span></button><i>click to unqueue</i>
                <?php
              }?>
            </dd>
          </dl>

        <?php
        }
}
else {
 echo"<h4>No new orders</h4>";
}
}
else{
  die("Unauthorized access!!!");

}
?>

      <?php require "../footer/footer.php";?>
</body>
</html>

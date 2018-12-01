<h3>Orders Details </h3>
<?php
 include $_SERVER['DOCUMENT_ROOT'].'/ibuild/system/init.php';
$o_id=$_GET['order_id'];
$findorders=mysqli_query($db,"SELECT * FROM orders_to_supp WHERE order_id='$o_id'");
if(mysqli_num_rows($findorders)>0)
{
        while($ordersall=mysqli_fetch_assoc($findorders)){
          ?>
          <dl>
            <dt style="background-color:white;padding:1%;"><?php $c_id=$ordersall['request_maker_id'];
                 $findcus=mysqli_query($db,"SELECT name FROM usersi WHERE u_id='$c_id'");
                 while ($customers=mysqli_fetch_assoc($findcus)) {
                   # code...
                   echo "<h4>".$customers['name']." ordered ";
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
              <dd>location</dd>
              <dd>payment method</dd>
              <dd>Initial Payment Offered</dd>
              <dd>sent status</dd>
              <dd>received status</dd>
              <dd>Receive payment Now(for online payment only)</dd>
              
              <dd><input type="checkbox" name="deny" id="deny_order"/>deny</dd><!--insert ajax for this-->
              <dd><input type="checkbox" name="pending" id="pend_order"/>add to pending</dd>
          </dl>
        <?php
        }
}
else {
 echo"<h4>No new orders</h4>";
}
?>

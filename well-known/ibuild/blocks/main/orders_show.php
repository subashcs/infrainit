<?php
$findorders=mysqli_query($db,"SELECT * FROM orders_to_supp WHERE supplier_id='$user'");
if(mysqli_num_rows($findorders)>0)
{
        ?>

        <table style="width:100%;">
        <?php
        $n=1;
        while($ordersall=mysqli_fetch_assoc($findorders)){
          ?>
          <tr>
            <td><?php echo $n.". "; $n++;?> </td>
            <td style="background-color:white;padding:1%;"><?php $c_id=$ordersall['request_maker_id'];
                 $findcus=mysqli_query($db,"SELECT name FROM usersi WHERE u_id='$c_id'");
                 while ($customers=mysqli_fetch_assoc($findcus)) {
                   # code...
                   echo $customers['name']." ordered ";
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
                  echo " of size "."$size";
                 }

                ?>
            </td>
            <td>
               <?php $sdurl="orders_show_page.php?order_id=".$ordersall['order_id'];?>
              <a href='<?php echo $sdurl;?>'>show details</a></td>
              <td><input type="checkbox" name="deny" id="deny_order"/>deny</td><!--incsert ajax for this-->
              <td><input type="checkbox" name="pending" id="pend_order"/>add to pending</td>
            <td style="text-decoration:italicsed;"><sub><?php echo $ordersall['date'];?></sub></td>
          </tr>
        <?php
        }
         ?>

        </table>
        <?php
}
else {
 echo"<h4>No new orders</h4>";
}
?>

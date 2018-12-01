<?php
$findorders=mysqli_query($db,"SELECT * FROM orders_to_supp AS o INNER JOIN items as i ON o.material_id=i.id  WHERE i.user_id='$user'");
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
                 $cusurl="/ibuild/blocks/accounts/?u_id=".$c_id;
                 while ($customers=mysqli_fetch_assoc($findcus)) {
                   # code...
                   ?>
                   <a href="<?php echo $cusurl;?>"><?php echo $customers['name'];?></a>
                 <?php
                     
                 }
                 echo " ordered ".$ordersall['order_amount']." units ";
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
               <?php $sdurl="../orders_show/?mat_id=".$ordersall['material_id'];?>
              <a href='<?php echo $sdurl;?>' style="padding:1%;margin:1%;"> show details</a></td>
              <td id="se_send">

                <?php

                if($ordersall['sent_status']==0){
                ?>
                  <input type="checkbox" name="send" class="send_ord" id="<?php echo 'send_order'.$o_id;?>"/>
                  <input type="hidden" id="o_id_to" value="<?php echo $ordersall['order_id'];?>"/>
                  <span id="fi_send">Not sent</span>
                  <i>click to change</i>
                </td><!--incsert ajax for this-->
              <?php
            }
            else{
              ?>
              <?php $o_id=$ordersall['order_id'];?>
              <input type="checkbox" name="send" class="send_ord" id="<?php echo 'send_order'.$o_id;?>" checked/>
              <input type="hidden" id="o_id_to" value="<?php echo $ordersall['order_id'];?>"/>
              <span id="fi_send">Sent</span>
              <i>click to change</i></td>

              <?php
            }?>
          </td>
          <td>
            <?php
            if($ordersall['received_status']!=0){ ?>
              <span id="is_rec_order">Received</span>
            <?php }
            else{ ?>
              <span id="is_rec_order">Not Received</span>
            <?php } ?> </td>
            <td style="text-decoration:italicsed;"><sub><?php echo $ordersall['date'];?></sub></td>

          </tr>
        <?php
        }
         ?>

        </table>
    <br/>

        <?php
}
else {
 echo"<h4>No new orders</h4>";
}
?>

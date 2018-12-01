<?php
include '../system/init.php';
$sizid=$_POST['size'];
$prices=mysqli_query($db,"SELECT * FROM items_sizes WHERE size_id='$sizid'");
while($pricesrow=mysqli_fetch_assoc($prices)){
  $foundprice=$pricesrow['price_per_unit'];
}
echo $foundprice;
 ?>

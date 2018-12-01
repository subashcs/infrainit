<?php
include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
$view=$_POST['user_views'];
$user=$_POST['user'];


$send=mysqli_query($db, "UPDATE `customers` SET `user_views`='$view' WHERE `u_id`='$user'");
if($send)
{
  echo "success";
}
else {
  echo "failure server";
}
 ?>

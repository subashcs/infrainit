<?php
require("../../system/init.php");
session_start();
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
    
if($bool_log==1&&isset($_SESSION['u_id'])){
  $oid=mysqli_real_escape_string($db,$_POST['o_id']);
  $checkq=mysqli_query($db,"SELECT * FROM `orders_to_supp` WHERE order_id='$oid' AND queued=1");
  if($checkq){
  if(mysqli_num_rows($checkq)>0){
  $query=mysqli_query($db,"UPDATE `orders_to_supp` SET `queued`=0 WHERE `order_id` ='$oid'");
  if($query){
    echo "1";
  }
  else{
    echo "error";
  }
  }
  else{

    $query=mysqli_query($db,"UPDATE `orders_to_supp` SET `queued`=1 WHERE `order_id`='$oid'");
    if($query){echo "0";}
  }
}
else{
  die("query error");
}
}
else{
  die("Unauthorized Access");
}
mysqli_close($db);
 ?>

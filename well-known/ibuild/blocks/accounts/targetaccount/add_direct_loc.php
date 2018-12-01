<?php
require("../../../system/init.php");
session_start();
//security mechanism
$bool_log=0;
    
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
    //security
if(isset($_SESSION['u_id'])&&bool_log==1){
    
  $u_id=$user;
  $lat=mysqli_escape_string($db,$_POST['lat']);
  $long=mysqli_escape_string($db,$_POST['long']);

$query=mysqli_query($db,"UPDATE `suppliers` SET `latitude`='$lat',`longitude`='$long' WHERE `u_id`='$u_id'");
if($query){
  echo"success";
}
else{
  echo("query error");
}
}
else{
  echo ('error');
}
?>

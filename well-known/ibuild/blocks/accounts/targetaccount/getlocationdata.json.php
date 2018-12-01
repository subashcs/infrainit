<?php
require("../../../system/init.php");
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
if($bool_log==1||isset($_POST['val'])){
  if(isset($_SESSION['u_id'])){
  $u_id=$user;
  }
  if(isset($_POST['val'])&&$_POST['val']!=""){
      $u_id=$_POST['val'];
  }
$query=mysqli_query($db,"SELECT  `latitude`,`longitude` FROM `suppliers` WHERE `u_id`='$u_id'");

if(!$query){
  echo"query error";
}
else{
      if(mysqli_num_rows($query)>0){
        while($rows=mysqli_fetch_assoc($query))
          {
          $res[]=$rows;
          }
      }
      else{
        $res[]="";
      }
}
$ressed=json_encode($res);
echo $ressed;
}
else{
  echo 'error';
}
?>

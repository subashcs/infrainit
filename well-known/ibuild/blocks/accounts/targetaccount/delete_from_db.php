<?php
include "../../../system/init.php";

if(!empty($_GET['mat'])){
  $mat=mysqli_real_escape_string($db,$_GET['mat']);

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
      if(isset($_SESSION['u_id']) &&$bool_log==1)
      {
      $cus=$user;
      }
      else{
        die("Unauthorized Access!");
      }
  $err="";
$insert=mysqli_query($db,"UPDATE `items` SET `deleted`=1 WHERE `id`='$mat' AND `user_id`='$cus'");
  if($insert){
         echo ("successful!!");
     }
  else{
            die("Transfer Error!");
        }

}
else{
  echo"mat_id not specified";
}
?>

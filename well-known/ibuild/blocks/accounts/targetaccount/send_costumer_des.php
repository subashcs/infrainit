<?php

include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
$web=mysqli_real_escape_string($db,$_POST['web']);
$district=$_POST['district'];
$metro=$_POST['metropolitan'];
$oda=$_POST['oda'];
$street=$_POST['street'];
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
$query=mysqli_query($db,"UPDATE usersi SET website='$web' , district='$district' , metropolitan='$metro',oda='$oda' ,street='$street' WHERE u_id='$user'");
 if($query)
 {
echo "success";
 }
 else{
   echo"failure server";
 }
 ?>

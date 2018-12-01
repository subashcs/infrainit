<?php
session_start();
if(isset($_SESSION['u_id'])&&isset($_POST['submit'])){
  require "../../system/init.php";
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
  if($bool_log==1)
  {$uid=$user;}
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $p1=mysqli_real_escape_string($db,$_POST['password1']);
  $p2=mysqli_real_escape_string($db,$_POST['password2']);

  if($p1==$p2){
    $pass=md5($p1);
    $checkexist=mysqli_query($db,"SELECT * FROM usersi WHERE email='$email' AND u_id='$uid'");
    if(mysqli_num_rows($checkexist)>0){
      $update=mysqli_query($db,"UPDATE usersi SET password='$pass' WHERE email='$email' ");
      if(!$update){
        $res="Could not change. Query error!!";
      }

    }
    else{
      $res="Seems like this is not your email!!";

    }
  }
  else{
    $res="Passwords and Retyped password do not match!";
  }

}
else{
  $res="<strong>Email</strong> dont match. Unauthorized access";
}
if($update){
  $res="Successfully changed!! Try logging in";
  include "../main/logout.php";
  $url="../login.php?err=".$res;
  header("location: $url");
}
else{



$url='index.php?res='.$res;
header("location: $url");
 }
 ?>

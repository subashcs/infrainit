<?php
include '../../system/init.php';


if (!isset($_POST['email']) || !isset($_POST['password'])) {
die("Username or Password is Empty");
//exit();
 }
 else{
   $user=mysqli_real_escape_string($db,$_POST['email']);
   $pass=mysqli_real_escape_string($db,$_POST['password']);
   $pass=md5($pass);
   $sql="SELECT u_id FROM usersi WHERE email='$user' AND password='$pass'";
   $checkemail=mysqli_query($db, $sql);
   $checktemail=mysqli_query($db,"SELECT id FROM  temp_usersi WHERE email='$user' AND password='$pass'");

   $a=mysqli_num_rows($checkemail);
   $b=mysqli_num_rows($checktemail);
  if($a>0)
  {
     while($id=mysqli_fetch_assoc($checkemail))
     {
       $user=$id['u_id'];
     }
     $date=date('m/d/Y h:i:s a', time());
  
      $rand=$date.$user."0";
      $rand=md5($rand); 
     $insert=mysqli_query($db,"INSERT INTO infra_login (u_id,rand) VALUES ('$user','$rand')");
     
    if($insert){
    session_start();
    $_SESSION['u_id']=$rand;
     
   header("location:../accounts");
     }
     else{
         die("Fatal Error!!");
     }
  }

  else if($b>0)
    { $url='reconfirm.html';
      //go to reconfirm page
      header("location: $url");
    }
    else if($a>0 && $b>0){
      $error="there seems to be Unauthorized login attempts from this email!.Sorry we cant proceed";
      $url='../login.php?err='.$error;
        header("location: $url");
    }
  else {
     $error="Incorrect username or password combination";
     $url='../login.php?err='.$error;
       header("location: $url");
    return false;
  }


}

?>

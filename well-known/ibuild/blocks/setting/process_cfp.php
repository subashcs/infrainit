
<?php
include '../../system/init.php';
 if(isset($_POST['recover'])){
   $code=mysqli_real_escape_string($db,$_POST['code']);
   $email=mysqli_real_escape_string($db,$_POST['email']);
   $pass=mysqli_real_escape_string($db,$_POST['newpass']);
   $repass=mysqli_real_escape_string($db,$_POST['renewpass']);

   if($pass==$repass){
     $pass=md5($pass);
     $checkexist=mysqli_query($db,"SELECT * FROM recover_pass WHERE recover_code='$code' AND email='$email'");
     if(mysqli_num_rows($checkexist)>0){
        $update=mysqli_query($db,"UPDATE usersi SET password='$pass' WHERE email='$email' ");
        if($update){
          $delete=mysqli_query($db,"DELETE FROM recover_pass WHERE recover_code='$code'");
          if($delete)
          {
            $response="Successfully changed password!! Try logging in with new password";
            $url='../login.php?err='.$response;
            header("location: $url");
          }
          else{
            echo "<b>query deletion error</b>";
          }
        }
        else{
          echo "<b>update query error</b>";
        }
     }
     else{
       echo"<h4>Seems unusual !! this url is not valid or activation already done.</h4>";
     }
   }
   else{
     echo"<h3>Password and retyped password do not match</h3>";
   }

 }
 else{
   die("<h3>Error unauthorized access!!!</h3>");
 }
?>

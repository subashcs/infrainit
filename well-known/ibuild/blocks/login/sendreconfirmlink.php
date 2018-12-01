<?php
require '../../system/init.php';
$email=mysqli_real_escape_string($db,$_GET['remail']);

$concodenew=$email.date('mY');
$confirm_code=md5($concodenew);

$updatecode=mysqli_query($db,"UPDATE temp_usersi SET confirm_code='$confirm_code' WHERE email='$email'");

include 'mailer.php';
if($mail){
  echo "<br/>confirmation sent!<br/>";
     echo"<a href='../login.php'>Go back</a>";
}
else{
  echo" confirmation unsuccessfull! please try again.<br/>  ";
  echo"<a href='../reconfirm.php'>Go back</a>";

}
mysqli_close($db);
 ?>

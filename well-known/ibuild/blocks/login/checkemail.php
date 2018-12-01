<?php
include '../../system/init.php';
if(isset($_GET['q']))
{
 $emailId=$_GET['q'];

 $checkdata=" SELECT name FROM usersi WHERE email='$emailId' ";

 $query=mysqli_query($db,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "Email Already Exist";
 }
 else
 {
  echo "This email does not Exists";
 }
 exit();
}
 ?>

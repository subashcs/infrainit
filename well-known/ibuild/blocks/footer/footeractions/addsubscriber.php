
<?php
 include '../../../system/init.php';

 $email=$_POST['emaildata'];

$checkexistance=mysqli_query($db," SELECT * FROM usersi WHERE email='$email' AND subscribed='1'");
$checkexistance1=mysqli_query($db," SELECT * FROM subscribers WHERE email='$email'");
if(mysqli_num_rows($checkexistance)>0||mysqli_num_rows($checkexistance1)>0)
{
  die("You are already subscribed!");
}
 //Insert query
 $searchuser=mysqli_query($db,"SELECT 'email' FROM usersi WHERE email='$email'");
 if(mysqli_num_rows($searchuser)>0){
   $query=mysqli_query($db,"UPDATE 'usersi' SET subscribed='1' WHERE email='$email'");
   if($query)
   {
     echo"Success!You have subscribed now.";

   }
   else{
     echo "failure 001 retry!";
   }

 }
 else{
 $query = mysqli_query($db,"INSERT INTO `subscribers` VALUES (NULL,'$email')");
 if($query)
 {
   echo"Success!You have subscribed now.";

 }
 else{
   echo "failure 010 retry!";
 }
 }


 mysqli_close($db); // Connection Closed
 ?>

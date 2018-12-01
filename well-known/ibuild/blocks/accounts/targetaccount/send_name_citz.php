<?php
include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
session_start();
$name=$_POST['proprieter'];
$citz=$_POST['citznum'];


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

//Insert query
$query = mysqli_query($db," UPDATE `usersi` SET `name`='$name',`citizenship_no`='$citz' WHERE u_id='$user'");
echo "success";
mysqli_close($db); // Connection Closed
?>

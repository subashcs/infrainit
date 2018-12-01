<?php
include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
session_start();
$name=$_POST['comp_name'];
$cdes=$_POST['comp_des'];

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
 if($bool_log==0){
     echo"Not Logged In";
 }   
else{
//Insert query
$query = mysqli_query($db," UPDATE `suppliers` SET `company_name`='$name',`company_des`='$cdes' WHERE u_id='$user'");
if($query){
echo "success";
}
else{
  echo"failure retry";
}
     
 }
mysqli_close($db); // Connection Closed
?>

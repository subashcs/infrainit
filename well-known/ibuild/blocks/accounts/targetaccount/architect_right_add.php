<?php 
require "../../../system/init.php";
 session_start();
    $bool_log=0;
    
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
 if(isset($_SESSION['u_id'])&& $bool_log==1)
    {
        

$cn=mysqli_real_escape_string($db,$_POST['cn']);
$cd=mysqli_real_escape_string($db,$_POST['cd']);
$update=mysqli_query($db,"UPDATE architects SET company_name='$cn',company_des='$cd' WHERE u_id='$user'");

if($update){
    echo "success";
    
}
else{
    echo "failure";
}
}
else{
    echo "Unauthorized Access";
}
?>
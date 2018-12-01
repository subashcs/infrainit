<?php
require "../system/init.php";
$data=mysqli_real_escape_string($db,$_POST['ques']);
$id=mysqli_real_escape_string($db,$_POST['ques_id']);
 //security mechanism starts
  $bool_log=0;
    session_start();
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
    //Security mechanism ends
    if(isset($_SESSION['u_id'])&&$bool_log==1){
$update=mysqli_query($db," UPDATE queries SET question='$data' WHERE que_id='$id'");
if($update){

  echo"successful";
}
else{
    echo "unsuccessful";
  }
    }
    else{
        echo "unsuccessful";
    }

mysqli_close($db);
 ?>

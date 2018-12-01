<?php
include '../../system/init.php';
session_start();

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
if(isset($_SESSION['u_id'])&&$bool_log==1){


$query=mysqli_query($db,"SELECT * FROM `notices` LEFT OUTER JOIN `noticeuser`  ON notices.n_id=noticeuser.n_id WHERE `for_all`=1 OR `target_user`='$user' ORDER BY `date` DESC");
if($query){
 $updseen=mysqli_query($db,"UPDATE `noticeuser` SET `seen`=1 WHERE `target_user`='$user'");

 while($rows=mysqli_fetch_assoc($query))
 {
   $row[]=$rows;
 }
 $erows=json_encode($row);
 echo $erows;
}
else{
  die("found an error");
}
}


 mysqli_close($db);
 ?>

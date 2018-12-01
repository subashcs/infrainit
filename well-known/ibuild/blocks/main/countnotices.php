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
if(isset($_SESSION['u_id'])&&$bool_log==1)
{

$query=mysqli_query($db,"SELECT * FROM notices LEFT OUTER JOIN noticeuser  ON notices.n_id=noticeuser.n_id WHERE for_all=1 OR target_user='$user' AND seen=0");
  $i=0;
 while($rows=mysqli_fetch_assoc($query))
 {
  $i++;
 }
 echo $i;

}
else{
  echo "New";
}
 ?>

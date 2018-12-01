<?php
include "../../system/init.php";
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
  $curuser=$user;
  $iid=mysqli_real_escape_string($db,$_POST['itid']);
  $query=mysqli_query($db,"SELECT * FROM items_like WHERE item_id='$iid' AND liker='$curuser'");
  if(mysqli_num_rows($query)>0){
    $disquery=mysqli_query($db,"DELETE FROM items_like WHERE item_id='$iid' AND liker='$curuser'");
   if($disquery){
     $decquery=mysqli_query($db,"UPDATE items SET likes=likes-1 WHERE id='$iid'");
     echo "disliked";
   }
   else{
     echo 'query error';
   }
  }
  else{
   $likequery=mysqli_query($db,"INSERT INTO items_like VALUES('','$iid','$curuser')");
  if($likequery){
    $incquery=mysqli_query($db,"UPDATE items SET likes=likes+1 WHERE id='$iid'");
        echo "liked";
  }
  else{
    echo "wtf";
  }
}
}
else{
  die("unauthorized access");
} ?>

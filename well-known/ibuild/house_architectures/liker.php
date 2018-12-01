<?php
 include '../system/init.php';
 session_start();
 $err="";
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
  $house=mysqli_real_escape_string($db,$_POST['liked_house']);
  $checkexistence=mysqli_query($db,"SELECT * FROM house_arc_likes WHERE house_id='$house' AND user_id='$user' AND liked='1'");
    if(mysqli_num_rows($checkexistence)>0){

       $query=mysqli_query($db,"DELETE FROM `house_arc_likes` WHERE house_id='$house' AND user_id='$user' AND liked='1' ");//undo like
       if($query){
           $decquery=mysqli_query($db,"UPDATE `house_arc` SET `likes`=`likes`-1 WHERE house_id='$house'");
       }
     }
   else{
         $checkexistenceofdislike=mysqli_query($db,"SELECT * FROM house_arc_likes WHERE house_id='$house' AND user_id='$user' AND liked='0'");
           if(!mysqli_num_rows($checkexistenceofdislike)){
             $query=mysqli_query($db,"INSERT INTO house_arc_likes (house_id,user_id,liked)VALUES('$house','$user','1') ");
             if($query){
                 $incquery=mysqli_query($db,"UPDATE `house_arc` SET `likes`=`likes`+1 WHERE house_id='$house'");
             }
           }
           else{
             $err="cannot like and dislike at the same time. 143 error";
           }
      }
          $sendnum=mysqli_query($db,"SELECT likes FROM house_arc WHERE house_id='$house'");
          while($likes=mysqli_fetch_assoc($sendnum)){

            if(empty($err)){
                echo $likes['likes'];
                
            }
          }
      echo $err;
   }

else{
   die("error!please login!");
 }
 ?>

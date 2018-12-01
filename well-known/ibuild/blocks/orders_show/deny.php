<?php
require("../../system/init.php");
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
  $oid=mysqli_real_escape_string($db,$_POST['o_id']);
  $reason=mysqli_real_escape_string($db,$_POST['reason']);
  $checkq=mysqli_query($db,"SELECT * FROM `orders_to_supp` WHERE order_id='$oid' AND denied=1");
  if($checkq){
   if(mysqli_num_rows($checkq)>0){
    $query=mysqli_query($db,"UPDATE `orders_to_supp` SET `denied`=0 WHERE `order_id` ='$oid'");
   if($query){
     $delreason=mysqli_query($db,"DELETE FROM deny_reasons WHERE order_id='$oid'");
   if($delreason){
     echo "1";}
     else{
       echo "error deletion";
     }
   }
  else{
    echo "error";
  }
  }
  else{

    $query=mysqli_query($db,"UPDATE `orders_to_supp` SET `denied`=1 WHERE `order_id`='$oid'");
    if($query){
      $delreason=mysqli_query($db,"INSERT INTO deny_reasons VALUES('$oid','$reason')");
    if($delreason){
      /*send notice to order maker
        $topic="Your order has been denied";
        $dest_url="/ibuild/cart/;
        $n_idfetcher=mysqli_query($db,"SELECT max(n_id) from notices WHERE 1");
        $fetchedid=mysqli_fetch_assoc($n_idfetcher))
          $the_n_id=$fetchedid[0]+1;

        $sendnotice=mysqli_query($db,"INSERT INTO notices(n_id,topic,dest_url) VALUES('$the_n_id','$topics','$dest_url')");

          $fetchu_id=msqli_query($db,"SELECT * FROM orders_to_supp WHERE order_id='$oid'");
          while($fetchedu=mysqli_fetch_assoc($fetchu_id)){
            $fu_id=$fetchedu['request_maker_id'];
          }

          $sendquestionernotice=mysqli_query($db,"INSERT INTO noticeuser(n_id,target_user) VALUES ('$the_n_id','$fu_id')");
          //send notice to answerer
          $topic="You have denied an order!";
          $dest_url="ibuild/blocks/orders_show?";

          $asendnotice=mysqli_query($db,"INSERT INTO notices(n_id,topic,dest_url) VALUES('$the_n_id','$topics','$dest_url')");
          if($asendnotice){
          $sendusertarget=mysqli_query($db,"INSERT INTO noticeuser(n_id,target_user) VALUES ('$the_n_id','$user')");
        }
          */

      echo "0";
     }
      else{
        echo "error deletion";
      }

    }
  }
}
else{
  die("query error");
}
}
else{
  die("Unauthorized Access");
}
mysqli_close($db);
 ?>

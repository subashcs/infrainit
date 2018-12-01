<?php

require "../system/init.php";
$size=mysqli_real_escape_string($db,$_POST['size']);
$id=$_POST['id'];
$total_price=$_POST['price'];
$pay=$_POST['payt'];
$amount=$_POST['amount_m'];
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
$req_mkr=$user;

if(!empty($id)&&!empty($total_price)&&!empty($amount)&&$bool_log==1)
{
$query=mysqli_query($db,"INSERT INTO orders_to_supp (request_maker_id,material_id,order_amount,size,payment_method,total_price)
 values('$req_mkr','$id','$amount','$size','$pay','$total_price')");
if($query){
  if(!empty($_POST['gana'])){
    $gana=$_POST['gana'];
    $oda=$_POST['oda'];
    $street=$_POST['street'];
    $exadd=$_POST['exadd'];
    $selordid=mysqli_query($db,"SELECT *FROM orders_to_supp WHERE request_maker_id='$req_mkr' AND material_id='$id'");
    while($rowsord=mysqli_fetch_assoc($selordid)){
      $ordid=$rowsord['order_id'];

    }
    $supplocationadd=mysqli_query($db,"INSERT INTO order_location VALUES('$ordid','$gana','$street','$oda','$exadd')");
   if($supplocationadd){

     echo "Your order has been placed with new supply location! ";
   }

   else{
     $delprev=mysqli_query($db,"DELETE FROM `orders_to_supp` WHERE order_id='$ordid'");
     echo"something went terrible";    }
  }
  else{
  echo "Your order has been placed!";
  }
}
else{
  echo "sorry query error encountered!please try again";
}
}
else{
  echo"All fields are required!";
}
 ?>

<div id="orders_wrap">
<?php
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
    
    //Security mechanism ends

include '../../system/init.php';
$ord_query=mysqli_query($db,"SELECT * FROM orders_to_supp WHERE supplier_id='$user'");
while($orders=mysqli_fetch_assoc($ord_query)){
      ?>
      <div id="a_single_order">

      </div>
      <?php
    }
    }
 ?>
</div>

<?php
require '../system/init.php';
$stat=mysqli_real_escape_string($db,$_POST['stat']);
$o_id=mysqli_real_escape_string($db,$_POST['oid']);
function changeshipstatus($check,$db,$o_id) {
           $query=mysqli_query($db,"UPDATE `orders_to_supp` SET `received_status`='$check' WHERE `order_id`='$o_id'");
           if($query){
             return 1;
            }
          else
             {return 0;}

        }
    if(changeshipstatus($stat,$db,$o_id)){
          echo "Status Changed to ";
          if ($stat==1){
            echo "Received";
          }
          else{
            echo"Not Received";
          }
        }
  else{
          echo "Status Could not be changed query error!";
        }

 ?>

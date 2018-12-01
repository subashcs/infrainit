<?php
require "../../system/init.php";
$garden=mysqli_real_escape_string($db,$_POST['upd']);
$house=mysqli_real_escape_string($db,$_POST['house']);
$update=mysqli_query($db,"UPDATE house_arc SET garden='$garden' WHERE house_id='$house'");
if($update){
    echo "Updated";
}
else{
    echo "failure";
}
?>
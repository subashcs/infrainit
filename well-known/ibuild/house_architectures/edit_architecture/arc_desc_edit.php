<?php
require "../../system/init.php";
$desc=mysqli_real_escape_string($db,$_POST['upd']);
$house=mysqli_real_escape_string($db,$_POST['house']);
$update=mysqli_query($db,"UPDATE house_arc SET description='$desc' WHERE house_id='$house'");
if($update){
    echo "Updated";
}
else{
    echo "failure";
}
?>
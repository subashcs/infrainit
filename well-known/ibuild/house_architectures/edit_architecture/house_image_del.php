<?php
require "../../system/init.php";
$file=$_POST['file'];
$image_id=$_POST['image_id'];
if($file)
{
    $target="../../images/houses/".$file;
    $delete=mysqli_query($db,"DELETE FROM house_images WHERE image_id='$image_id'");
    if($delete){
        if(unlink($target)){
            
            echo "success";
        }
        else{
            echo "Incomplete deletion!!please report";
        }
        
    }
    else{
        echo "query error!!";
    }
}
?>
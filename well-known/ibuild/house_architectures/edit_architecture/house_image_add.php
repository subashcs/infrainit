<?php
if($_FILES['file']['size']>0){
    require "../../system/init.php";
    $house=mysqli_real_escape_string($db,$_POST['house']);
    
    $target_dir = "../../images/houses/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $filename=basename($_FILES['file']['name']);
        
        // echo $house.$filename; //just to check error
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo " File already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            echo "your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } 
        else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                
                $insert=mysqli_query($db,"INSERT INTO `house_images` (`house_id`,`image`)VALUES('$house','$filename')");
                if($insert){
                echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                }
                else{
                    if(unlink($target_file)){
                        echo "Query Error";
                    }
                    else{
                    echo "Query error!!changes revert unsuccessful";
                    }
                }
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
  
}
else{
    echo "failure";
}
?>
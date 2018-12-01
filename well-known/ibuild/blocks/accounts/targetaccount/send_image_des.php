<?php

include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
$user=$_POST['user'];


$errfile=" ";
$uploadOk=1;
if ( 0 < $_FILES['file']['error'] ) {
       $errfile.= 'Error: ' . $_FILES['file']['error'] . '<br>';
       $uploadOk=0;
   }
     $for_path=mysqli_query($db,"SELECT * FROM usersi WHERE u_id ='$user'");
   while ($e=mysqli_fetch_array($for_path))
    {
      $directory="../../../users/".$e['role']."/".$e['email']."/profile_images/".$_FILES['file']['name'];

   $imageFileType = pathinfo($directory,PATHINFO_EXTENSION);
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
       $errfile.= " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
   }
   if($uploadOk!=0) {
      move_uploaded_file($_FILES['file']['tmp_name'], $directory );
        $image=$_FILES['file']['name'];
       $send_img=mysqli_query($db,"UPDATE usersi SET image='$image' WHERE u_id='$user'");


   }
 }
 ?>

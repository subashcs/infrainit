<?php
require '../system/init.php';

 if(isset($_POST['add']) && $_POST['question']!="Add queries?")
 {
 $que=mysqli_real_escape_string($db,$_POST['question']);
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
 

  $errfile=" ";
  if(!empty($_FILES['afile']['name'])&&$bool_log==1)
  {
  $uploadOk=1;
  if ( 0 < $_FILES['afile']['error'] ) {
         $errfile.= 'Error: ' . $_FILES['afile']['error'] . '<br>';
         $uploadOk=0;
     }
        $directory="../images/questionanswer/".$_FILES['afile']['name'];

     $imageFileType = pathinfo($directory,PATHINFO_EXTENSION);
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         $errfile.= " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
     if($uploadOk!=0) {
         //upload the files
         if(move_uploaded_file($_FILES['afile']['tmp_name'], $directory ))
        {
          $image=$_FILES['afile']['name'];

         $sendquery= mysqli_query($db,"INSERT INTO `queries` (`u_id`,`question`,`file`) VALUES('$user','$que','$image')");
        }
        //if could not upload do the following
        else{
            $errfile.="file upload error.May be a large file uploaded";
        }
     }

   }
    else{
          $sendquery=mysqli_query($db,"INSERT INTO `queries` (`u_id`,`question`) VALUES('$user','$que')");
      }

  }


 else{
   $errfile="no input";

 }
 $url="index.php?err=".$errfile;
header('location:'.$url);
 ?>

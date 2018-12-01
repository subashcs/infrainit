<?php
 if(isset($_POST['submit'])){
     include '../../system/init.php';
     $fname=mysqli_real_escape_string($db,$_POST['fname']);
     $lname=mysqli_real_escape_string($db,$_POST['lname']);
     $email=mysqli_real_escape_string($db,$_POST['email']);
     $subject=mysqli_real_escape_string($db,$_POST['subject']);
 
     $find=mysqli_query($db,"SELECT * FROM inquiries WHERE email='$emai' AND subject='$subject'");
     if(mysqli_num_rows($find)>0){
         $error="Already Inserted!!";
     }
     else{
         
     $query=mysqli_query($db,"INSERT INTO inquiries (email,fname,lname,subject)VALUES('$email','$fname','$lname','$subject')");
         if($query){
             $succ="Successfully added !! Thank you for your support.";
         }
         else{
             $error="Some error incounterd!!";
         }
     }
 }
 else{
    $error="Unauthorized Access";
 }
 if(!isset($error)&&isset($succ)){
    $url='location:../../contact.php?succ='.$succ;
     header($url);
 }
 else{
     $url='location:../../contact.php?err='.$error;
     header($url);
 }
?>
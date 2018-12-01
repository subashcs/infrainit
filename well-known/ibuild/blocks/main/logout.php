<?php
require "../../system/init.php";
session_start();
//security mechanism starts
  
    
    //Security mechanism ends
if (!isset($_SESSION["u_id"])) {
    header("location: /ibuild/blocks/login.php");
    exit;
  }

else {
   // Delete the session vars by clearing the $_SESSION array
   //security mechanism starts
 
       
    $rand=$_SESSION['u_id'];
     $delete=mysqli_query($db,"DELETE FROM infra_login WHERE rand='$rand'");
     
   
    //Security mechanism ends
    if($delete){
   $_SESSION = array();
    
    unset($_SESSION['u_id']);
    
    // Destroy the session
    session_destroy();
    }
 }
    
header('location:/ibuild');
 ?>

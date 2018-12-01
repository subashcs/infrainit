<?php
require '../../system/init.php';
$email=mysqli_escape_string($db,$_POST['email']);

$checkemail=mysqli_query($db,"SELECT * FROM usersi WHERE email='$email'");
$checkrepass=mysqli_query($db,"SELECT * FROM recover_pass WHERE email='$email'");
  if(mysqli_num_rows($checkemail)>0){
    if(mysqli_num_rows($checkrepass)>0){


        $res="Recovery mail sent already!if you haven't got please report to us!";
    }
    else{
      $code="12".$email.date('Ym');
      $recovery_code=md5($code);
      $insertcode=mysqli_query($db,"INSERT INTO recover_pass (recover_code,email) VALUES('$recovery_code','$email')");
      if($insertcode){

        $to = $email;
        $subject = "Recover Password for Infrainit";
        $url="https://www.infrainit.com/ibuild/blocks/setting/recover_pass.php?recover_code=".$recovery_code;
        $message = "
        <html>
        <head>
        <style>
        a{
          
          padding:10px;
         
          margin:10px;
          font-size:110%;
          box-sizing:border-box;
        }
        </style>
        <title>Recover password for Infrainit</title>
        </head>
        <body>
        <p>Please to recover your account password. click on the button below!</p>
        <a href=".$url.">Click here!</a>
        </body>
        </html>
        ";


        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <info@infrainit.com>' . "\r\n";
        $headers .= 'Cc: infrainit.com' . "\r\n";

        $mail=mail($to,$subject,$message,$headers);
        if($mail){

        $res="Success!check your email to change password";
        }

      }
      else{
        $res="insertion error!";
      }
    }
  }
  else{
    $res="Email does not exist";

  }
  $url="forgotpass.php?res=$res";
  header('location:'.$url);
  mysqli_close($db);
 ?>

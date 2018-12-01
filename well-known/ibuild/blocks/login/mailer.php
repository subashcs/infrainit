<?php
$to = $email;
//$to="subashsapkota59@gmail.com";
//$confirm_code=12312312312313;
$subject = "Email confirmation for Infrainit";
$url="http://www.infrainit.com/ibuild/blocks/login/confirmation.php?confirm_code=".$confirm_code;
$message = "
<html>
<head>
<style>
a{
  background-color:black;
  padding:10px;
  font-size:19px;
  color:#fff;
}
</style>
<title>Email Confirm for Infrainit</title>
</head>
<body>
<p>Welcome to Infrainit.<br/>Please confirm your account by clicking on the button below!</p>
<a href=".$url.">Click here!</a>
</body>
</html>
";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@infrainit.com' . "\r\n";
$headers .= 'Cc: info@infrainit.com' . "\r\n";

$mail=mail($to,$subject,$message,$headers);
if($mail){
  $error.="done";
}
else{
  $error.= "none";
}
?>

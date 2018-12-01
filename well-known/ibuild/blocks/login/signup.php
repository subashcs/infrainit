<?php
include '../../system/init.php';

$error="";
if(isset($_POST['submit']))
{
$user_type=mysqli_real_escape_string($db,$_POST['user_type']);
$firstname=mysqli_escape_string($db,$_POST['firstname']);
$lastname=mysqli_escape_string($db,$_POST['lastname']);
$udate=mysqli_escape_string($db,$_POST['udate']);
$estd=mysqli_escape_string($db,$_POST['cdate']);
$email=mysqli_escape_string($db,$_POST['email']);
$pass=mysqli_escape_string($db,$_POST['password']);
$panno=mysqli_real_escape_string($db,$_POST['pan_no']);
$company=mysqli_real_escape_string($db,$_POST['company_name']);
$confpass=mysqli_escape_string($db,$_POST['confpass']);
$description=mysqli_real_escape_string($db,$_POST['description']);
$district=mysqli_real_escape_string($db,$_POST['district']);
$metro=mysqli_real_escape_string($db,$_POST['metropolitan']);
$oda=mysqli_real_escape_string($db,$_POST['oda']);
$street=mysqli_real_escape_string($db,$_POST['street']);

$phone=mysqli_real_escape_string($db,$_POST['phoneshow']);
//code for recaptcha

$SITEKEY = '6LcgGjgUAAAAAOYLkqF6BKQQt1NQuIShMhsPUdN9';
$SECRET = '6LcgGjgUAAAAADKypkcz0zKDCy8wnxzYiyGuwlAV';



if($_SERVER["REQUEST_METHOD"] === "POST")
{


    $recaptcha_secret = $SECRET;
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
    $response = json_decode($response, true);


    if($response["success"] === true){
        $success=1;
    }else{
        $error="ReCAPTCHA failure";
    }


}

//code end
// may be used in future$visacard=mysqli_real_escape_string($db,$_POST['cardnum']);
//$cardcode=mysqli_real_escape_string($db,$_POST['cardcode']);
$esewa=mysqli_real_escape_string($db,$_POST['e_sewa']);
$agree=mysqli_real_escape_string($db,$_POST['agree']);
$name=$firstname." ".$lastname;

if($pass!=$confpass)
{
  $error="password and confirm password do not match";
  $url='../login.php?errs='.$error.'&RECAPTCHAERRORS='.$RECAPTCHAERRORS;
    header("location: $url");
}

if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $error = "Only letters and white space allowed";
  $url='../login.php?errs='.$error;
    header("location: $url");
}
if(empty($name)||empty($email)||empty($pass)||empty($confpass||empty($payment)))
{
  $error="Some fields are empty";
  $url='../login.php?errs='.$error;
    header("location: $url");
}
//generate confirm code
$key = $name . $email . date('mY');
$confirm_code= md5($key);
//generated

$pass=md5($pass);//protect password
$signupcheck=mysqli_query($db,"SELECT id FROM temp_usersi WHERE email='$email'");
$checkno=mysqli_num_rows($signupcheck);

    $signupquery=0; //setting variable to false

    if($checkno==0&&empty($error))
    {
         if($user_type=='supplier'){

        $sql = "INSERT INTO `temp_usersi`(`name`, `email`,`phone`,`category`,`pan_no`,`district`,`metropolitan`,`oda`,`street`,`estd`, `password`, `esewa`, `company_name`, `company_des`,`confirm_code`)
         VALUES ('$name','$email','$phone','$user_type','$panno','$district','$metro','$oda','$street','$estd','$pass','$esewa','$company','$description','$confirm_code')";
        $signupquery=mysqli_query($db,$sql);

      }
      else if($user_type=='customer'){
        $sql = "INSERT INTO `temp_usersi`(`name`, `email`,`phone`,`category`, `DOB`,`district`,`metropolitan`,`oda`,`street`, `password`, `esewa`, `confirm_code`)
         VALUES ('$name','$email','$phone','$user_type','$udate','$district','$metro','$oda','$street','$pass','$esewa','$confirm_code')";
        $signupquery=mysqli_query($db,$sql);
      }
      else{
            //for architects
               $sql = "INSERT INTO `temp_usersi`(`name`, `email`,`phone`,`category`, `DOB`,`district`,`metropolitan`,`oda`,`street`, `password`, `esewa`,`company_name`, `company_des`, `confirm_code`)
         VALUES ('$name','$email','$phone','$user_type','$udate','$district','$metro','$oda','$street','$pass','$esewa','$company','$description','$confirm_code')";
        $signupquery=mysqli_query($db,$sql);
      
      }
    }
    else{
      $error="Some fields inappropriate or email already exist. Try again!";
      $url='../login.php?errs='.$error;
        header("location: $url");

    }
    //insertion of payment details done along with above 11/8/2017


     if($signupquery)
      {
         include 'mailer.php';
        //send confirmation mail
        if($mail)
        {

           header('location:show_confirm_info.html');

        }
        else{
          $delins=mysqli_query($db,"DELETE FROM temp_usersi WHERE email='$email'");
          $error="confirmation mail could not be sent sign up again after some time";
          $url='../login.php?errs='.$error;
            header("location: $url");
        }

    }
  else  {
      $delins=mysqli_query($db,"DELETE FROM temp_usersi WHERE email='$email'");
      $error="Query error some fields are filled inappropriate!";
      $url='../login.php?errs='.$error;
        header("location: $url");
      }

}

echo $error. "<a href='../login.php'>click here to go back</a>";
mysqli_close($db);

 ?>

<?php


include '../../system/init.php';
$error="";
if(isset($_GET['confirm_code']))
{
$con=mysqli_escape_string($db,$_GET['confirm_code']);//this will be get from email we sent

$confirmation=mysqli_query($db,"SELECT * FROM temp_usersi WHERE confirm_code='$con'");
//this will also check if confirm code is correct
while($rows=mysqli_fetch_array($confirmation))
{   $user_id=$rows['id'];
    $name=$rows['name'];
    $email=$rows['email'];
    $DOB=$rows['DOB'];
    $district=$rows['district'];
    $metro=$rows['metropolitan'];
    $oda=$rows['oda'];
    $street=$rows['street'];
    $panno=$rows['pan_no'];
    $password=$rows['password'];
    $cardnum=$rows['cardnum'];
    $phone=$rows['phone'];
    $user_type=$rows['category'];
    $cardcode=$rows['cardcode'];
    $esewa=$rows['esewa'];
    $company_name=$rows['company_name'];
    $company_des=$rows['company_des'];
//select options deleted
}
//allocate data for transferring
if(mysqli_num_rows($confirmation)>0){

      if($user_type=='customer')//to check if user is customer
      {
            $useris="customers";

            $transferuser=mysqli_query($db,"INSERT INTO usersi (name,email,password,DOB,role,cardnum,cardcode,esewa,district,metropolitan,oda,street) VALUES('$name','$email','$password','$DOB','customers','$cardnum','$cardcode','$esewa','$district','$metro','$oda','$street')");
            $finduid=mysqli_query($db,"SELECT u_id FROM usersi WHERE email='$email'");
         while ($uids=mysqli_fetch_assoc($finduid)){
             $useridis=$uids['u_id'];
           }  
           $intocustomers=mysqli_query($db,"INSERT INTO customers(u_id) VALUES('$useridis')");
           if(!$intocustomers)
          {
           $error.="error in query changes were revert try again";
          }

       }


      else if($user_type=='supplier') {
            $useris="suppliers";
            //if user is supplier
            $transferuser=mysqli_query($db,"INSERT INTO usersi (name,email,password,DOB,role,cardnum,cardcode,esewa,district,metropolitan,oda,street) VALUES('$name','$email','$password','$DOB','suppliers','$cardnum','$cardcode','$esewa','$district','$metro','$oda','$street')");
              //here also deleted
               $finduid=mysqli_query($db,"SELECT u_id FROM usersi WHERE email='$email'");
            while ($uids=mysqli_fetch_assoc($finduid)){
                $useridis=$uids['u_id'];
              }
              $intosuppliers=mysqli_query($db,"INSERT INTO suppliers(u_id,pan_no,company_name,company_des) VALUES('$useridis','$panno','$company_name','$company_des')");
              if(!$intosuppliers)
             {
              $error.="error in query changes were revert try again";
             }
           }
           else{
            $useris="architects";   
              $transferuser=mysqli_query($db,"INSERT INTO usersi (name,email,password,DOB,role,cardnum,cardcode,esewa,district,metropolitan,oda,street) VALUES('$name','$email','$password','$DOB','$useris','$cardnum','$cardcode','$esewa','$district','$metro','$oda','$street')");
            $finduid=mysqli_query($db,"SELECT u_id FROM usersi WHERE email='$email'");
         while ($uids=mysqli_fetch_assoc($finduid)){
             $useridis=$uids['u_id'];
           }  
           $intoarchitects=mysqli_query($db,"INSERT INTO architects(u_id,company_name,company_des) VALUES('$useridis','$company_name','$company_des')");
           if(!$intoarchitects)
          {
           $error.="error in query changes were revert try again";
          }
         }

          if($transferuser){
             if(!empty($phone))
             {
               $sendphone=mysqli_query($db,"INSERT INTO phone (email,phone) VALUES('$email','$phone')");
               if(!$sendphone){
                 $error.="phone number could not be transferred. it seems invalid!";
               }
             }
             $path1="../../users/".$useris;
             $firstest=1;
             if(!is_dir($path1)){
               $firstest=mkdir($path1,0777,true);
               }
            if($firstest)
            {
              $path2=$path1."/".$email;

              $secondtest=mkdir($path2,0777,true);
                if($secondtest)
                {
                $path3=$path2."/profile_images";
                 $complete=mkdir($path3,0777,true);
               }
             }
             else{
               $error.="error creating files";
             }


              if($useris="suppliers")
             {
             $path4=$path2."/materials";
              $complete=mkdir($path4,0777,true);
              }


                    function send_email($info){

                        //format each email
                        $body = format_email($info,'html');
                        $body_plain_txt = format_email($info,'txt');

                        //setup the mailer
                        $transport = Swift_MailTransport::newInstance();
                        $mailer = Swift_Mailer::newInstance($transport);
                        $message = Swift_Message::newInstance();
                        $message ->setSubject('Welcome to Site Name');
                        $message ->setFrom(array('subashsapkota59@gmail.com' => 'Site Name'));
                        $message ->setTo(array($info['email'] => $info['username']));

                        $message ->setBody($body_plain_txt);
                        $message ->addPart($body, 'text/html');

                        $result = $mailer->send($message);

                        return $result;

                    }


        }

      else{
                $error.="<h2>data transfer error</h2>";
              }
     if(!empty($error)){
       //revert all changes
       if(delete_directory($path1))
       {
       $delquery=mysqli_query($db,"DELETE FROM `usersi` WHERE `email`='$email'");
       }
       else{
         $error.="directories could not be deleted";
       }
     }
     else{
       $commitquery=mysqli_query($db,"UPDATE `usersi` SET `committed` = '1' WHERE `email` = '$email'");
        if($commitquery){
          $delquery=mysqli_query($db,"DELETE  FROM temp_usersi WHERE email='$email'");
          $url="../login.php?err=Confirmation successful! you can now login manually! Thank you";
          
            header('location:'. $url);
        }
        else{
          $error.=" could not be committed.!";
          $delquery=mysqli_query($db,"DELETE FROM usersi WHERE email='$email'");
        }
     }
}
else{

  $error.= "Unauthorized Access !!!! Invalid url confirmation unsuccessful or already confirmed try logging once<br/>";
}

}
else{
  $error.="Unauthorized Access 1 !!!! Invalid url confirmation unsuccessful or already confirmed try logging once";

}
if($error){
  echo $error;
 }

 function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
	 if (!$dir_handle)
	      return false;
	 while($file = readdir($dir_handle)) {
	       if ($file != "." && $file != "..") {
	            if (!is_dir($dirname."/".$file))
	                 unlink($dirname."/".$file);
	            else
	                 delete_directory($dirname.'/'.$file);
	       }
	 }
	 closedir($dir_handle);
	 rmdir($dirname);
	 return true;
}

 
    $url='../reconfirm.php';
    echo $error;
    
    echo"<br/><a href='../login.php'>Click here to Login</a>";
    echo"<br/><a href='".$url."'>Click here to reconfirm</a>";
      
 mysqli_close($db);
 //i think we need to add one status bit in the database for security purposes so  that partial changes can be taken invalid
//send confirmation code to user account
//confirm user details provide confiramation link with email

 ?>

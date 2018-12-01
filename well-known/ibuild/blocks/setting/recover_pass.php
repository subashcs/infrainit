
<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <head>

   <link href="../../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../../css/styles.css">
 <script src="../../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="../../scripts/notify.js" type="text/javascript"></script>
   <style>
   body{
      color:green;
    text-align: center;
   }
   </style>

  <title>Infrainit Recover password</title>
</head>
<body>
  <?php
include "../header/header.php";
 if(isset($_GET['recover_code'])){
  require '../../system/init.php';
   $code=mysqli_real_escape_string($db,$_GET['recover_code']);
   $checkexist=mysqli_query($db,"SELECT * FROM recover_pass WHERE recover_code='$code'");
   if(mysqli_num_rows($checkexist)>0){
      ?>
      <form method="POST" id="recover_pass_form" action="process_cfp.php">
        <h2>Account Recovery</h2>
        <input type="hidden" name="code" value="<?php echo $code;?>" />
        <label>Email:</label>
        <input type="email" name="email" placeholder="Type yours email" required/><br/>
        <label>New Password:</label>
        <input type="password" name="newpass" placeholder="Type new password" required> </br>
        <p id="pass_check_response"></p>
        <label>Retype New Password:</label>
        <input type="password" name="renewpass" placeholder="Retype new password" required></br>
        <input type="submit" name="recover" id="confirm_recovery" value="Confirm Change"/>
      </form>

   <?php
    }
   else{
     die("<b>Unauthorized Access!!! ERROR</b>");
   }
 }
 include "../footer/footer.php";
mysqli_close($db);
 ?>
</body>
</html>
 ?>

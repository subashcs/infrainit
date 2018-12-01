<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="../../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../../css/styles.css">
   <script src="../../scripts/notify.js" type="text/javascript"></script>
   <script src="../../scripts/changepassword.js" type="text/javascript"></script>

  <title>i-build settings</title>
  <style>
    body{
      font-size: 15px;
    }
  </style>
</head>
<body style="font-size:15px;">
   <?php include '../header/header.php'; ?>
         <?php //security mechanism starts
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
    if($bool_log==1&&isset($_SESSION['u_id'])){
           ?>
               <div class="container">
               <div class="row">
               <div class="col-sm-12">
               <h1 style="color:black;font-weight:bolder;">Change Password</h1>
               </div>
               </div>
               <div class="row">
               <div class="col-sm-6 col-sm-offset-3">

                   <?php if(isset($_GET['res'])){
                     ?>
                     <div class="alert alert-warning">
                     <?php
                     echo $_GET['res'];
                     ?></div>
                  <?php }
                   ?>

             <form method="post" id="passwordForm" action="changepassword.php">

               <input type="email" class="input-lg form-control" name="email" id="email" placeholder="Your Email" autocomplete="off" required>

                <p id="email_response"></p>
                  <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off" required>
                       <div class="row">
                       <div class="col-sm-6">
                       <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                       <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                       </div>
                       <div class="col-sm-6">
                       <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                       <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                       </div>
                       </div>
                       <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required>
                       <div class="row">
                       <div class="col-sm-12">
                       <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                       </div>
                       </div>
                   <input type="submit" name="submit" id="submit_change" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password" required>
                 </form>
               </div><!--/col-sm-6-->
               </div><!--/row-->
               </div>

   <?php }
   include '../footer/footer.php';?>

</body>
</html>

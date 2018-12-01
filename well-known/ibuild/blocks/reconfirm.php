
<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 <head>

   <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../css/styles.css">
 <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="scripts/notify.js" type="text/javascript"></script>
   <style>
   body{
     text-align: center;
     padding-top:12%;
     background: #eef;

   }
   h2{
     color:black;
   }
   </style>

  <title>Infrainit |Reconfirm Email</title>
 </head>
  <body>
    <form id="reconfirm" action="login/sendreconfirmlink.php" method="get">
    <img src="../images/logo.png"/ alt="Infrainit" id="logo"> <h2>Reconfirm your email</h2>
     <input type="email" name="remail" placeholder="Type your email..."/>
      </br/>
     <label>An email with a confirmation link will be sent to your email.After confirmation you can login manually.</label>
      <br/>
      <p id="show_error"></p>
     <input type="submit" value="Confirm" name="confirm"/>
    </form>
  </body>
</html>

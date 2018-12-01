<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Infrainit,Account,user,company profile, user profile">

<head>

  <link rel="stylesheet" href="../../css/styles.css">
 <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
  <link href="../../css/font-awesome-4.7.0/css/font-awesome.min.css"; rel="stylesheet">
  <script src="../../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  
  <script src="../../scripts/liker.js" type="text/javascript"></script>
  <script src="../../scripts/googlemaps.js" type="text/javascript"></script>
  <script src="../../scripts/account.js"></script>
  <script src="../../scripts/navigation_supp.js"></script>
  <script src="../../scripts/notify.js"></script>
  <script src="../../scripts/order.js"></script>

<?php 
    require "../../system/init.php";
    session_start();
    $user='any';
    $bool_log=0;
    
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
    if(isset($_SESSION['u_id'])&& $bool_log==1||isset($_GET['u_id'])){
    //check if current profile opening is to see others or is ones profile    
    
         if($bool_log==1)
        {
            
        $cu=$user;
        
            
        }
        
        if(isset($_GET['u_id'])){
                 
        include "../main/encryptor.php";
        $u_id=my_decrypt($_GET['u_id'],$key);
     
        $cu=$u_id;
            }
        
    }    
    else{
        header('Location:login.php');
    }
        
    
   
    $showuser=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$cu'");
    while($showus=mysqli_fetch_assoc($showuser)){
        $name=$showus['name'];
    }
    
    ?>

 <title><?php echo $name ;?></title>
  
     <script type="text/javascript">

    function allowDrop(ev) {
      ev.preventDefault();
    }

    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }

   function drop(ev, el) {
     ev.preventDefault();
     var data = ev.dataTransfer.getData("text");
     el.appendChild(document.getElementById(data));
     var id=document.getElementById(data).getElementsByClassName('ide_p_id');
     var idcurrent=id[id.length-1].innerHTML;


     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
     // Typical action to be performed when the document is ready:

       alert(xhttp.responseText);
       location.reload();

        }
      };
        xhttp.open('GET', 'targetaccount/delete_from_db.php?mat='+idcurrent, true);
        xhttp.send();

        //end function
      }

  </script>

  <style>
     #map {
      height: 300px;
      width:100%;
     }
  </style>

</head>

<body id="accounts_body">
      
<?php include $_SERVER['DOCUMENT_ROOT'].'/ibuild/blocks/header/header.php'; 
 
    $query=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$cu'");

     ?>

    <center>
      <input type="hidden" id="secretly_user" value="<?php echo $user;?>"/>

    <?php

  if(!isset($u_id)||$cu==$user){

    while($rows=mysqli_fetch_assoc($query))
    {

    if($rows['role']=="customers")
      {
       $who=0;
      include 'for_customer.php';
      }
      elseif($rows['role']=="suppliers")
      {
        $who=1;
        include 'for_supplier.php';
       }

       else if($rows['role']=="architects")
         {
             $who=2;
             include 'for_architect.php';
         }
         else{
           echo"please try logging again or report to us . error code log101";
         }
     }

      }
    else{
        $chooserquery=mysqli_query($db,"SELECT * FROM usersi AS u  WHERE u_id='$cu'");
        while($rowscheck=mysqli_fetch_assoc($chooserquery))
        {
          
      if($rowscheck['role']=="customers")
        {
         $who=0;
        include 'targetaccount/customer.php';
        }
        elseif($rowscheck['role']=="suppliers")
        {
          $who=1;
          include 'targetaccount/supplier.php';
         }
         else if($rowscheck['role']=="architects")
         {
             $who=2;
             include 'targetaccount/architect.php';
         }
         else
           {
             echo"please try logging again or report to us . error code log102";
           }
        }
     }
     ?>

</center>
<?php include '../footer/footer.php';?>
</body>
</html>
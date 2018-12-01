<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Rods Cements Bricks Blocks Cement and other buy now">
 <head>
   <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="http://www.infrainit.com/ibuild/images/logo.png" />
   <link rel="stylesheet" href="../css/styles.css">
   <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="../scripts/cartdisplay.js" type="text/javascript" > </script>
   <script src="../scripts/notify.js" type="text/javascript" > </script>

  <title>Infrainit|<?php echo $_GET['cat'];?></title>
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
     document.getElementById('show_info_cart_text').style.display="";
     var id=document.getElementById(data).getElementsByClassName('ide_p_id');
     var idcurrent=id[id.length-1].innerHTML;
     var loc="cart/add_to_cart.php?mat="+idcurrent;
     location.replace(loc);

        //end function
      }

  </script>
 </head>
  <body>
      
   <?php include 'header/header.php'; ?>
   <center>
     <?php
     include '../system/init.php';
     if(isset($_GET['cat'])){
         $cat=mysqli_real_escape_string($db,$_GET['cat']);
       ?>

    <div id="categorized_mat">
<?php
      $query=mysqli_query($db,"SELECT * FROM items WHERE category='$cat' AND deleted='0'");
?>
       <h2>
        <?php if($cat=="bricks"){
          echo "Bricks";
          }
          else if($cat=="blocks"){
            echo"Blocks";
          }

          else if($cat=="rods"){
            echo"Rods";
          }

          else if($cat=="gravel"){
            echo"Gravel";
          }

          else if($cat=="cement"){
            echo"Cement";
          }

          else if($cat=="sand"){
            echo"Sand";
          }
          else if($cat=="others"){
            echo"Others";
          }
          else{
            die("invalid data!!");
          }
        ?>
       </h2>
       <?php

       if(mysqli_num_rows($query)==0)
       {
         echo "<center>No product under category OR product has been deleted</center>";
       }
        while($products=mysqli_fetch_assoc($query))
       {
           ?>
           <div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
             <p class="ide_p_id" style="display:none"><?php echo $products['id'];?></p>
             <span style="display:block;font-weight:bold;">
             <span class="count" style="float:left;" ><?php echo $products['sales'];?> <i> sales</i></span>

               <span class="count" style="float:right;"><?php echo $products['likes'];?> <i> likes</i></span>
             </span>    <?php
                     $productid=$products['id'];
                      $user_idfetched=$products['user_id'];
                      $findfile=mysqli_query($db,"SELECT email FROM usersi WHERE u_id='$user_idfetched'");
                     $findsupp=mysqli_query($db,"SELECT * FROM suppliers WHERE u_id='$user_idfetched'");
                      while($findsupparr=mysqli_fetch_assoc($findsupp))
                      {
                        $supplier=$findsupparr['company_name'];

                      }
                      while($findfilearr=mysqli_fetch_assoc($findfile))
                      {
                        $email=$findfilearr['email'];
                      }
                  $directory="/ibuild/users/suppliers/";
                  $directory.=$email;
                  $directory.="/materials/".$products['material_name']."/images/".$products['f_image'];

                  if(!empty($directory))
                  {
                ?>
                 <img src="<?php echo $directory;?>" class="mat_img">
                 <?php
               }
                 else {
                   echo"<p>sorry no image in directory </p>";
                 }
                  ?>


             <table>
             <tr>
               <td class="indicator"> <?php  echo $products['material_name'];?>

               </td>
             </tr>
             <tr>
               <td class="indicator"><?php  echo $products['available_amnt'];?>

               <i> available</i>  </td>
             </tr>
             <tr>
               <td class="indicator"><span class="price">
                 <?php
                   $matid=$products['id'];
                   $sizpris=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$matid'");
                   if(mysqli_num_rows($sizpris)==0){
                     echo"Not specified!";
                   }
                    while($sizprices=mysqli_fetch_assoc($sizpris))
                      {
                        echo " Per Unit Rs:".$sizprices['price_per_unit'];
                        if(!empty($sizprices['size'])){
                      echo " for size ".$sizprices['size'].", ";
                           }
                   }?></span>
               </td>         
              </tr>
             <tr>
               <td class="indicator"> Supply Regions <br/>
                 <span class="price">
             <?php
               $matid=$products['id'];
               $sups=mysqli_query($db,"SELECT * FROM supply_regions WHERE material_id='$matid'");
               if(mysqli_num_rows($sups)==0){
                 echo"Not specified!";
               }
                while($suppls=mysqli_fetch_assoc($sups))
                {
                  echo $suppls['supply_region'].", ";
               }?>
             </span>
             </td>
             </tr>
             <tr id="detail">
               <td colspan="3">
                 <a href="<?php echo "/ibuild/blocks/mat_details/?mat=".$matid;?>">Details
                 </a>
               </td>

             </tr>

           </table>
         </div>
               <?php


                }
                 ?>

 </div>
      <?php }
      else{
        echo" <b>Invalid url data seems inaccurate!!</b>";
      }
      ?>
 </center>

 <?php include 'rightbar/addtocartdirect.php';?>
   <?php include "footer/footer.php";?>

  </body>
</html>

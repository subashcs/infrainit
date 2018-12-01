<!Doctype HTML>
<?php
if(isset($_GET['mat']))
{
$mat_id=$_GET['mat'];
 }
 else {
   die('undesired url');
 }?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <head>
   <link href="../../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
   <script src="../../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="../../scripts/edit_item.js" type="text/javascript"></script>
   <script src="../../scripts/item_liker.js" type="text/javascript"></script>
   <script src="../../scripts/notify.js" type="text/javascript"></script>


  <title>material details </title>


 </head>
  <body style="text-align:center;">
   <?php include '../header/header.php'; ?>


    <?php

      if(isset($_SESSION['u_id'])){
      $currcus=$_SESSION['u_id'];
      $currcus_query=mysqli_query($db,"SELECT `u_id` FROM infra_login WHERE `rand`='$currcus'");
      while($currcus_now=mysqli_fetch_assoc($currcus_query))
      {
          $currcus=$currcus_now['u_id'];
      }
    }
      else{
        $currcus=NULL;
      }
     $checksupplier=mysqli_query($db,"SELECT * FROM items WHERE id='$mat_id' AND user_id='$currcus' AND deleted='0'");

       if(mysqli_num_rows($checksupplier)&&isset($_SESSION['u_id'])>0)
      {
        $editquery=mysqli_query($db,"SELECT * FROM items WHERE id='$mat_id' AND deleted='0'");

        while($edititem=mysqli_fetch_assoc($editquery))
      {

        ?>
        <div id="show_options">
         <p>Are you sure you want to delete this material</p>

         <button name="nodel" id="nodel">NO</button>
         <button name="yesdel" id="yesdel">YES</button>

        </div>
         <h2><?php echo $edititem['material_name']; ?></h2>
          
        <table id="edit_the_material">

            <tr style="text-align:center;">
                
             <td id="image" colspan="3">
           <?php
               $selsup=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user'");
                while($email=mysqli_fetch_array($selsup))
                {
                $emailf=$email['email'];}
                $src="/ibuild/users/suppliers/".$emailf."/materials/".$edititem['material_name']."/images/".$edititem['f_image']; ?>
             <img src="<?php echo $src;?>" alt="image">
             <br/>
              <input type="file" name="file" id="file"  >
               <div id="progress-div"></div>
           </div>
           <!--//delete button is here-->
           </td>
           </tr>
           <tr style="text-align:right;">
               
           <td colspan="3">
          <button type="button" name="delete" id="delete_material">Delete item</button>

          </td>

          </tr>

         <form method="post" id="edit_item_form"  name="editmat" enctype="multipart/form-data">

              <input type="hidden" name="matid"  value="<?php echo $mat_id;?>">
          
          <tr id="category">
            <td> Category </td>
            <td><?php echo $edititem['category']; ?></td>
          </tr>
          <tr id="Available Amount">
            <td>Available Amount</td>
            <td> <input name="avail_amnt" type="text" value="<?php echo $edititem['available_amnt']; ?>" > </td>

          </tr>

          <tr id="manufacturer">
            <td> Manufacturer </td>
            <td>
              <input name="manufacturer" type="text" value="<?php echo $edititem['manufacturer']; ?>" >
            </td>
          </tr>
          <tr id="supply_regions">
            <td>Supply Regions</td>
            <td>
            <?php $findsupplreg=mysqli_query($db,"SELECT * FROM supply_regions WHERE material_id='$mat_id'");

            while($supplyreg=mysqli_fetch_assoc($findsupplreg)){ ?>

                 <input type="hidden" name="reg_id[]" value="<?php echo $supplyreg['reg_id'];?>" />
               <input type="text" name="supplreg[]" value="<?php echo $supplyreg['supply_region'];?>"/>

          <?php }?>

           <input type="text" name="addedsr" placeholder="add new supply region" />
             </td>
          </tr>
         <tr id="material_sizes">
           <td>Sizes</td>
           <td>
            <?php $findsizes=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$mat_id'");
            while($sizes=mysqli_fetch_assoc($findsizes)){ ?>

              <input type="hidden" name="size_id[]" value="<?php echo $sizes['size_id'];?>" >
            <b>Rs</b> <input type="text" class="price" name="price[]" value="<?php echo $sizes['price_per_unit'];?>"> for size
            <input type="text" class="size" name="size[]" value="<?php echo $sizes['size'];?>" ><br/>
          <?php }?>
           <b>Rs</b> <input type="text" name="priceadd" placeholder="New price"> for size
           <input type="text" name="addedsize" placeholder="add new size" >
         </td>
          </tr>
          <tr>
            <td>Enter extra details</td>
            <td>
              <textarea name="ext_details" id="ext_details" cols="25" rows="5"><?php
                if(empty($edititem['ext_details'])){
                  echo"Add material details";
                } else{
                  echo $edititem['ext_details'];
                }?>
              </textarea>
            </td>
          </tr>
           <tr>
             <td colspan='3'>
               <button type="button" name="submit" id="done_edit_item">Submit</button>
             </td>
           </tr>
            <tr>
              <td>
              <span id="informer"></span>
            </td>
            </tr>
         </form>
          </table>
      <?php
             }

         }
   else
      {
      ?>
    <table id="show_a_material">
     <?php $sqlquery=mysqli_query($db,"SELECT * FROM items WHERE id='$mat_id' AND deleted='0'");
      if(mysqli_num_rows($sqlquery)==0)
      {
        die("item does not exist");
      }

     while($products=mysqli_fetch_assoc($sqlquery))
     {
       ?>
       <input type="hidden" value="<?php echo $products['id'];?>" id="itstheid">
       <h2><?php echo $products['material_name'];?></h2>
       <tr>
            <td  colspan="1" style="font-family:cursive;font-size:70%;text-align:center;text-decoration-style:italics;">
          Date: <?php echo $products['date'];?>
         </td>
       </tr>
          <tr >
            <td colspan="2" style="text-align:left">
              <i class="fa fa-money"></i><span class="count"> <?php echo $products['sales'];?> </span> <i>Sales</i>
            </td>
            <td colspan="1" style="text-align:right;">
              <button name="like_item_fn" id="like_item_fn">

                <?php
          if(isset($_SESSION['u_id'])){
          $query=mysqli_query($db,"SELECT * FROM items_like WHERE item_id='$mat_id' AND liker='$user'");
        if(mysqli_num_rows($query)>0){
          ?>
           <i class="fa fa-thumbs-up" id="thumbs-up"> </i>
           <?php
         }
         else{
           ?>
           <i class="fa fa-thumbs-o-up" id="thumbs-up"> </i>
           <?php
         }
       } ?>
         </button> <span id="items_likes_shower"> <?php echo $products['likes'];?> </span> <i>likes</i> </td>
           
            </tr>

            <tr class="image_show" >
              <td  colspan="3" rowspan="1">
              <?php
              $productid=$mat_id;
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
                 $directory="../../users/suppliers/";
                 $directory.=$email;
                 $directory.="/materials/".$products['material_name']."/images/".$products['f_image'];

                 if(!empty($directory))
                 {
               ?>
                <img src="<?php echo $directory;?>" class="mat_img" alt="<?php echo $products['material_name'];?>">
                <?php
              }
                else {
                  echo"<p>sorry no image in directory </p>";
                }
                 ?>
               </td>
            </tr>

            <!--responsive-->

      
            <!--/*responsive image show*/-->

       <tr class="cat_show" >
         <td colspan="3" style="color:blue;">
          Supplier:

           <?php //use if not empty function
            echo $supplier;?>
         </td>
         
       </tr> 
       <tr class="cat_show">
          <td colspan='2'>
            Category:
          <?php echo $products['category'];?>

          </td>
            
            <td colspan="1" rowspan="4"  style="text-align:center;">

              <button id="add_to_cart_but" onclick="tonewpage()" style="min-width:60px;min-height:100px;font-size:14px;">Add to Cart</button>
              <script type="text/javascript">
              var a="<?php echo $mat_id;?>";

              function tonewpage()
              {

             window.location.href = "../../cart/add_to_cart.php?mat="+a ;

              }
              </script>
            </td>

        </tr>
        <tr class="cat_show">
          <td colspan="2">
            Available Amount:
            <?php echo $products['available_amnt'];?>
          </td>
        </tr>
        <tr class="cat_show">
          <td colspan="2">
            Supply Region:
            <?php $findsupplyregion=mysqli_query($db,"SELECT * FROM supply_regions WHERE material_id='$mat_id'");
            if(mysqli_num_rows($findsupplyregion)>0)
            {
            while($supplyregion=mysqli_fetch_assoc($findsupplyregion)){

                  echo $supplyregion['supply_region'].", ";
                }
              }
                else{
                  echo "No supply regions specified!";
                }

              ?>
          </td>
        </tr>
        <tr class="cat_show">
          <td colspan="2">
            Manufacturer:
            <?php echo $products['manufacturer'];?>
          </td>
        </tr>

        <tr>
     <td  colspan="2" style=" font-size:110%;color:maroon;">


     <?php

      $sizes=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$mat_id'");
      while($sizearr=mysqli_fetch_assoc($sizes))
     {
       echo " Per Unit Rs. ".$sizearr['price_per_unit'];
       if(!empty($sizearr['size'])){
     echo " for size ".$sizearr['size']."<br/> ";
          }

          }
       ?>

   </td>
   </tr>
        <tr>

               <td colspan='3';style="font-size:20px;">
                 <?php echo $products['ext_details'];?>

               </td>
             </tr>
        <tr class="cat_show">
        </tr>



       <?php
     }?>
   </table>


 <?php } include '../footer/footer.php';?>
 </body>
</html>

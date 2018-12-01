
<div id="for_supplier">

  <div id="profile-image-wrap-supp">
    <?php
    

      $path="../../users/".$rowscheck['role']."/".$rowscheck['email']."/profile_images/".$rowscheck['image'];

     ?>

    <img src="<?php echo $path;?>" alt="User">

    <!--add likes shower-->
    <br/>
     <span id="supplier-name"> <?php
           $fetchsupplierdet=mysqli_query($db,"SELECT * FROM suppliers WHERE u_id=$u_id");
           while($suppdet=mysqli_fetch_assoc($fetchsupplierdet))
           {
             ?>
                        <h3 style='text-align:left;' id="company_name_sup"><?php echo $suppdet['company_name'];?></h3>
                        <h4 id="company_des_sup"><?php echo $suppdet['company_des'];?></h4>
                         <br/>
          <?php }
     //done?></span>
  </div>
  <div id="details-wrap-supplier" style="float:none;width:100%;">
    <table>
      <th style="text-align:left;"> Intro </th>

    <tr>
      <td id="proprieter"><b>Proprieter: </b> <?php echo $rowscheck['name'];?></td>
    </tr>
    <tr>
      <td id="citznum">
        <b>Citizenship Number:</b> <?php echo $rowscheck['citizenship_no'];?>
      </td>
      </tr>
      <tr>
        <td style="text-align:center;">

        </td>
      </tr>
      <tr>


      </table>

      <?php include '../maps/suppliermap.php';?>

    </div>
    
      <div style="display:block;clear:both;">
        <h4 >Materials</h4>

        <div>
          <?php
          $query1=mysqli_query($db,"SELECT * FROM items WHERE user_id=$u_id");
            if(mysqli_num_rows($query1)==0)
            {
              echo "<center>No products Available</center>";
            }
             while($products=mysqli_fetch_assoc($query1))
            {

                ?>
                 <div class="a_single_item"  style="max-width:200px;">
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
                 <img src="<?php echo $directory;?>" class="mat_img" >
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

//add your material recycle bin
                  ?>
       </div>

      </div>


</div>

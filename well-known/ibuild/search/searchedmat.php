<?php
$query=mysqli_query($db,"SELECT * FROM items WHERE category='bricks'AND deleted=0 AND material_name LIKE '%{$search_word}%' ");
$query1=mysqli_query($db,"SELECT * FROM items WHERE category='rods' AND deleted=0 AND material_name LIKE '%{$search_word}%' ");
$query2=mysqli_query($db,"SELECT * FROM items WHERE category='cement' AND deleted=0 AND material_name LIKE '%{$search_word}%' ");
$query3=mysqli_query($db,"SELECT * FROM items WHERE category='sand' AND deleted=0 AND material_name LIKE '%{$search_word}%'");
$query4=mysqli_query($db,"SELECT * FROM items WHERE category='pebbles' AND deleted=0 AND material_name LIKE '%{$search_word}%'");
$query5=mysqli_query($db,"SELECT * FROM items WHERE category='blocks' AND deleted=0 AND material_name LIKE '%{$search_word}%'");
$query6=mysqli_query($db,"SELECT * FROM items WHERE category='others' AND deleted=0 AND material_name LIKE '%{$search_word}%'");

?>
<center>
 <div id="categorized_mat">

    <h2>Bricks</h2>
    <?php

    if(mysqli_num_rows($query)==0)
    {
      echo "<center>No product under category</center>";
    }
     while($products=mysqli_fetch_assoc($query))
    {
        ?>   <div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
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
               <td class="indicator"><span class="price"> Rs:
             <?php  echo $products['price_per_unit'];?></span>
               Per Unit</td>
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


<!--for rods-->

     <h2>Rods</h2>
     <?php

     if(mysqli_num_rows($query1)==0)
     {
       echo "<center>No product under category</center>";
     }
      while($products=mysqli_fetch_assoc($query1))
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
             <td class="indicator"><span class="price"> Rs:
           <?php  echo $products['price_per_unit'];?></span>
             Per Unit</td>
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
       </div>             <?php


              }


               ?>


  <!-- code for cement-->

      <h2>Cement</h2>
      <?php
      if(mysqli_num_rows($query2)==0)
      {
        echo "<center>No product under category</center>";
      }
       while($products=mysqli_fetch_assoc($query2))
      {
        ?>   <div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
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
               <td class="indicator"><span class="price"> Rs:
             <?php  echo $products['price_per_unit'];?></span>
               Per Unit</td>
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


<!-- for sand-->
       <h2>Sand</h2>
       <?php

       if(mysqli_num_rows($query3)==0)
       {
         echo "<center>No product under category</center>";
       }
        while($products=mysqli_fetch_assoc($query3))
       {
         ?>   <div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
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
                <td class="indicator"><span class="price"> Rs:
              <?php  echo $products['price_per_unit'];?></span>
                Per Unit</td>
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
          </div><?php

                }

                 ?>


    <!-- for plywood-->
        <h2>Pebbles</h2>
        <?php

        if(mysqli_num_rows($query4)==0)
        {
          echo "<center>No product under category</center>";
        }
         while($products=mysqli_fetch_assoc($query4))
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
              <td class="indicator"><span class="price"> Rs:
            <?php  echo $products['price_per_unit'];?></span>
              Per Unit</td>
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
        </div>      <?php
                 }
                  ?>


     <!--for blocks-->
         <h2>Blocks</h2>
         <?php

         if(mysqli_num_rows($query5)==0)
         {
           echo "<center>No product under category</center>";
         }
          while($products=mysqli_fetch_assoc($query5))
         {
           ?>   <div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
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
                  <td class="indicator"><span class="price"> Rs:
                <?php  echo $products['price_per_unit'];?></span>
                  Per Unit</td>
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
            </div>   <?php
                  }
                   ?>
            <!--for others-->
               <h2>Others</h2>
         <?php

         if(mysqli_num_rows($query6)==0)
         {
           echo "<center>No product under category</center>";
         }
          while($products=mysqli_fetch_assoc($query6))
         {
           ?>   <div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
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
                  <td class="indicator"><span class="price"> Rs:
                <?php  echo $products['price_per_unit'];?></span>
                  Per Unit</td>
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
            </div>   <?php
                  }
                   ?>
      </div>
    </center>

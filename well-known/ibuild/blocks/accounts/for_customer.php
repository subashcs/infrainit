
 <div id="for_customer">
   <div id="wrapper_customer">
     <div id="profile-image-wrap">


     <div id="details_wrap_left" class="width-manager">
       <button name="edit" id="edit_infos"><i class="fa fa-pencil"></i></button>
       <li>
         <b>Email: </b><span id="email"><?php echo $rows['email'];?><span>
         </li>


         <li id="website"> <a href="<?php echo $rows['website'];?>" >visit website</a>
         </li>
         <input type="text" id="website_add" placeholder="Add your website/blog full address" value="<?php echo $rows['website'];?>" required/>
         <h4>Address</h4>
          <li>
          <?php
          if(!empty($rows['district']))
         {
           ?>
           <?php echo $rows['district']." ".$rows['metropolitan']."-".$rows['oda'].$rows['street'];?>
       <?php
      }
      else {

        ?><span id="per_address_show"> Add Your Permanent Address </span>
      <?php
           }
              ?>
            </li>
            <form method="get" name="permanent_address" id="permanent_address">
               <input type="text" name="district" placeholder="District" value="<?php echo $rows['district'];?>" id="district" required>
               <input type="text" name="metropolitan" placeholder="gaaupalika/nagarpalika" value="<?php echo $rows['metropolitan'];?>" id="metropolitan" required>
               <input type="number" name="oda" placeholder="ward number" value="<?php echo $rows['oda'];?>" id="oda" required>
               <input type="text" name="street" placeholder="street/village" value="<?php echo $rows['street'];?>"id="street" required >
               <br/>
               <input type="submit" name="submit" id="done_infos"/><!--button to click when all done-->
             </form>
         </div>
     <div id="image-profile-cust" >

       <?php

         $path="../../users/".$rows['role']."/".$rows['email']."/profile_images/".$rows['image'];

        ?>
        <button type="button" id="edit_image">Edit image</button>
          <input type="file" name="file" id="image_file_to"/>
          <img src="<?php echo $path;?>" alt="User" width="250px" id="user_image" style="z-index:0;">
        <button type="button" id="done">done</button><!--//profile adder-->
         <div id="name-wrap" class="width-manager">
         <?php echo $rows['name'];?>
       </div>
    </div>
           <div id="details_wrap_right" class="width-manager">
             <?php
              $queryfetchcust= mysqli_query($db , "SELECT * FROM customers WHERE u_id=$user");
              while($onlycust=mysqli_fetch_array($queryfetchcust))
              {
              echo "<b style='color:maroon;'>Total items purchased: ".$onlycust['total_bought']."</b>";?>
                  <dl>
                    <dt>


                     <h3>  Personal View  <button id="edit_des_cust" style="float:right;">    <i class="fa fa-pencil"></i></button></h3>
                    </dt>
                    <dd>
                      <?php
                      if(empty($onlycust['user_views']))   {
                        ?>
                      <li id="clickonedit">Click on edit button to add your views about infrastructures</li>
                    <?php }
                        else{
                      ?>
                            <li><?php echo $onlycust['user_views'];?></li>
                       <?php }?>
                    </dd>
                  </dl>
               <?php
            }
                 ?>

         <textarea id="user_view" name="description" required>add your views about the designs of infrastructures you like</textarea>
         <br/>
         <button type="button" name="submitdes" id="submitdesc">submit</button>

           </div>
     </div>


 </div>

<?php include "myquestionans.php"?>

</div>

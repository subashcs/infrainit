  
 <div id="for_customer">
   <div id="wrapper_customer">
     <div id="profile-image-wrap">


     <div id="details_wrap_left" class="width-manager">

       <li>
         <b>Email: </b><span id="email"><?php echo $rowscheck['email'];?><span>
         </li>


         <li id="website"> <a href="<?php echo $rowscheck['website'];?>" >visit website</a>
         </li>
         <h4>Address</h4>
          <li>
          <?php
          
          
          if(!empty($rowscheck['district']))
         {
           ?>
           <?php echo $rowscheck['district']." ".$rowscheck['metropolitan']."-".$rowscheck['oda'].$rowscheck['street'];?>
       <?php
      }
      else {

        ?><span id="per_address_show"> Add Your Permanent Address </span>
      <?php
           }
              ?>
            </li>

         </div>
     <div id="image-profile-cust" >

       <?php

         $path="../../users/".$rowscheck['role']."/".$rowscheck['email']."/profile_images/".$rowscheck['image'];

        ?>
          <img src="<?php echo $path;?>" alt="User" width="280px" id="user_image" style="z-index:0;">
        <!--//profile adder-->
         <div id="name-wrap" class="width-manager">
         <?php echo $rowscheck['name'];?>
       </div>
    </div>
           <div id="details_wrap_right" class="width-manager">
              <?php
              $queryfetchcust= mysqli_query($db , "SELECT * FROM architects WHERE u_id=$cu");
              
              while($onlycust=mysqli_fetch_array($queryfetchcust))
              {
                  ?>
                    
                        
                  <dl id="arc_right_des_shower">
                      
                    <dt>
                        <h3><?php echo $onlycust['company_name'];?></h3>
                     
                    </dt>
                    <dd>
                      <?php
                      if(empty($onlycust['company_des']))   {
                        ?>
                      <li id="clickonedit">No views/description added yet!!</li>
                    <?php }
                        else{
                      ?>
                            <li ><?php echo $onlycust['company_des'];?></li>
                            
                            
                       <?php }?>
                    </dd>
                  </dl>
               <?php
            }
          ?>

           </div>
     </div>


 </div>
 <h2>Uploaded Architectures</h2>
 <div id="show_the_arcs">
     <?php 
     
     
$query=mysqli_query($db,"SELECT * FROM house_arc WHERE provider='$cu'");
   
     while($houses=mysqli_fetch_assoc($query))
{
    $ourhouse=$houses['house_id'];
    $urltoarc="/ibuild/house_architectures/a_architecture?house=".$ourhouse;
?>
 <table id="a_single_house">
     
 <tr><td colspan='3' style="background:transparent"><a href="<?php echo $urltoarc; ?>" class="before_a_house"><i class="fa fa-info" ></i></a>
   </td></tr>
   <tr>

     <td colspan='2' style="font-family:times;background-color:#fff;font-size:120%;font-weight:bold;">
      <?php echo $houses['name'];?>
     </td>
     <td style="background-color:#fff;">
       <?php
       if(isset($_SESSION['u_id'])){
       $checklike=mysqli_query($db,"SELECT * FROM house_arc_likes WHERE house_id='$ourhouse' AND user_id='$user' AND liked=1");
       
       $checkdislike=mysqli_query($db,"SELECT * FROM house_arc_likes WHERE house_id='$ourhouse' AND user_id='$user' AND liked=0");
       
        if(mysqli_num_rows($checklike)>0){?>
          <button name="like" class="like_house" style="background-color:white;border:none;color:blue;"><i class="fa fa-thumbs-up" id="up" style="font-size:18px;color:maroon;"></i></button>
        <?php
            }
          else{
            ?>
       <button name="like" class="like_house" style="background-color:white;border:none;color:blue;"><i class="fa fa-thumbs-o-up" id="up" style="font-size:18px;color:maroon;"></i></button>
         <?php
          }
        }
         else{
           echo "<b>likes</b>";
         }
         ?>

      <span class="likes_shower"> <?php echo $houses['likes'];?></span>
       <input  type="hidden" class="open_house_id" value="<?php echo $houses['house_id'];?>" />
          <?php
          if(isset($_SESSION['u_id'])){


        if(mysqli_num_rows($checkdislike)>0){
         ?>
         <button name="dislike" class="dislike_house" style="background-color:white;border:none;color:blue;"><i class="fa fa-thumbs-down" id="down" style="font-size:18px;color:maroon;"></i></button>

        <?php }
        else{?>
     <button name="dislike" class="dislike_house" style="background-color:white;border:none;color:blue;"><i class="fa fa-thumbs-o-down" id="down" style="font-size:18px;color:maroon;"></i></button>
        <?php
      }


            }

            else{
              echo "<b>dislikes</b>";
            }
       ?>
       <span class="dislikes_shower"> <?php echo $houses['dislikes'];?></span>

     </td>
   </tr>
   <tr>
     <td colspan="3" >
         <?php $houseimage=mysqli_query($db,"SELECT * FROM house_images WHERE house_id='$ourhouse'");
           
           while($images=mysqli_fetch_assoc($houseimage)){
               $image=$images['image'];
               break;
           }
           if(mysqli_num_rows($houseimage)>0){
          $pathtoimage="/ibuild/images/houses/".$image;
        ?>
       <img src="<?php echo $pathtoimage;?>" alt="image error" style="width:100%;">
       <?php
           }
           else{
            ?>
            <img src="../images/houses/No_Image_Available.jpg" alt="No image" style="width:100%;">
            <?php   
           }
           ?>
     </td>

   </tr>

   <tr>
     <td>
       bedrooms:<br/>
       <?php echo $houses['bedrooms'];?>
     </td>
       <td>
         Floors:<br/>
         <?php echo $houses['floors'];?>
       </td>
       <td>
           Living rooms:<br/>
           <?php echo $houses['livingrooms'];?>
       </td>
    </tr>
    <tr>
       <td>
           Estimated Budget:<br/>
          <span style="color:maroon;font-weight:bold;"> <?php echo "Rs.".$houses['estim_budget'];?></span>
       </td>
       <td>
           Garagebays:<br/>
           <?php echo $houses['garagebays'];?>
       </td>
       <td>
           Dimensions(in m):<br/>
           <?php echo $houses['length']."m *".$houses['bredth']."m";?>
       </td>
    </tr>

 </table>

<?php
 }

 ?>
 </div>
 <h2>Queries</h2>
  
   <div id="my_question_ans">
          <?php $fetchquestions=mysqli_query($db,"SELECT * FROM queries WHERE u_id=$cu");
              if(mysqli_num_rows($fetchquestions) > 0)
              {
                 while($quesfetcher=mysqli_fetch_assoc($fetchquestions))
               {
                 $curques=$quesfetcher['que_id'];
                  $cururl="../../consult/a_single_question?q_id=$curques";
                  $fetchedq=$quesfetcher['question'];
                  $quesfinal=substr($fetchedq,0,80);
                  if(strlen($fetchedq)>80){
                  $quesfinal.="....";
                    }
                 ?>
                 <a href="<?php echo $cururl;?>" style="color:blue;padding:1%;"><?php echo $quesfinal?></a>
                 <br/><br/>
                 <?php
               }
              }

        else {
                 echo "<h4>No queries added yet </h4>";
              }
               ?>
   </div>
</div>

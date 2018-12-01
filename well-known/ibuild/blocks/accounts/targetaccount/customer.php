  
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
          <img src="<?php echo $path;?>" alt="User" width="250px" id="user_image" style="z-index:0;">
        <!--//profile adder-->
         <div id="name-wrap" class="width-manager">
         <?php echo $rowscheck['name'];?>
       </div>
    </div>
           <div id="details_wrap_right" class="width-manager">
             <?php
              $u_id=$rowscheck['u_id'];
              $queryfetchcust= mysqli_query($db , "SELECT * FROM customers WHERE u_id=$u_id");
              while($onlycust=mysqli_fetch_array($queryfetchcust))
              {
              echo "<b style='color:maroon;'>Total items purchased: ".$onlycust['total_bought']."</b>";?>
                  <dl>
                    <dt>


                     <h3>  Personal View</h3>
                    </dt>
                    <dd>
                      <?php
                      if(empty($onlycust['user_views']))   {?>
                        <li><?php echo "No views yet";?></li>
                        <?php
                      }

                      else{
                               ?>
                            <li><?php echo $onlycust['user_views'];?></li>
                       <?php }?>
                    </dd>
                  </dl>
               <?php
            }
                 ?>

           </div>
     </div>


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

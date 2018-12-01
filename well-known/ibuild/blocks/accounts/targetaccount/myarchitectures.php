<div id="show_architectures">
<h3 style="clear:both;margin:1% 0%;background-color:transparent;">Uploaded Architectures</h3>
<?php
$query=mysqli_query($db,"SELECT * FROM house_arc WHERE provider='$user'");
if(mysqli_num_rows($query)==0){
    echo "<strong>No houses added yet add one</strong>";
}
while($houses=mysqli_fetch_assoc($query))
{
    $ourhouse=$houses['house_id'];
    $urltoarc="/ibuild/house_architectures/edit_architecture?house=".$ourhouse;
?>
 <table id="a_single_house" style="width:230px">
     
 <tr><td colspan='3' style="background:transparent"><a href="<?php echo $urltoarc; ?>" class="before_a_house"><i class="fa fa-pencil-square-o" ></i></a>
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
         ?>
       <img src="<?php echo '../../images/houses/'.$image;?>" alt="image error">
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
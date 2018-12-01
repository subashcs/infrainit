
<!------ comment goes here---------->
  <?php 
  include "../../system/init.php";
      $house=$_GET['house'];
			      $query=mysqli_query($db,"SELECT * FROM house_arc WHERE house_id=$house");
			      while($rows=mysqli_fetch_assoc($query)){
			       //ert   
			       $name=$rows['name'];
			       $arc=$rows['architecture'];
			       $likes=$rows['likes'];
			       $dislikes=$rows['dislikes'];
			       $budget=$rows['estim_budget'];
			       $image=$rows['image'];
			       $desc=$rows['description'];
			       $length=$rows['length'];
			       $bredth=$rows['bredth'];
			       
			       $dimen=$length."m *". $bredth. "m";
			       $area=$length * $bredth;
			       $phone=$rows['phone'];
			       $bedrooms=$rows['bedrooms'];
			       $beds=$rows['beds'];
			       $bathrooms=$rows['bathrooms'];
			       $livrooms=$rows['livingrooms'];
			       $floors=$rows['floors'];
			       $garden=$rows['garden'];
			       $garage=$rows['garagebays'];
			       $bedrooms_desc=$rows['bedrooms_desc'];
			       $livingrooms_desc=$rows['livingrooms_desc'];
			       $washrooms_desc=$rows['washrooms_desc'];
			       $garage_desc=$rows['garage_desc'];
			          
			      }
			      
			      ?>
<!DOCTYPE html>
<html lang="en">
    
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
      
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
    <link href="../../css/styles.css" rel="stylesheet" id="custom-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="../../scripts/liker.js" type="text/javascript"></script>
  <script src="../../scripts/notify.js" type="text/javascript"></script>
    <title><?php echo $name;?></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  </head>

  <body style="font-size:130%;">
      <?php 
       include '../../blocks/header/header.php';
   
      ?>
	<div class="container">
	    
		<div class="card">
			<div class="container-fliud">
			  <?php
			      if(mysqli_num_rows($query)>0){
			          
			      
			     ?>
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						 <?php $houseimage=mysqli_query($db,"SELECT * FROM house_images WHERE house_id='$house'");
						    
						    $i=1;
						   while($feimgs=mysqli_fetch_array($houseimage)){
						     
						    $image=$feimgs['image'];    
			                $path="https://www.infrainit.com/ibuild/images/houses/".$image;
			                
			                
			                if($i==1){
			                    ?>
			                    <div class="tab-pane active" id="<?php echo 'pic-'.$i;?>"><img src="<?php echo $path;?>" /></div>
						  
						  <?php      
			                }
			                else{
			                 ?>
						  <div class="tab-pane" id="<?php echo 'pic-'.$i;?>"><img src="<?php echo $path;?>" /></div>
						  
						  <?php   
			                }
			                
						   $i++; //increment i
						   }
						  
						  if(mysqli_num_rows($houseimage)==0){
						      ?>
						     <i>No image to show.Something went wrong</i>
						 
						 <?php /*<div class="tab-pane" id="pic-5"><img src="<?php echo $path;?>" /></div>*/
						  }
						  ?>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <?php 
						   $i=1;
						   $houseimagetab=mysqli_query($db,"SELECT * FROM house_images WHERE house_id='$house'");
						  while($feimgs=mysqli_fetch_array($houseimagetab)){
						     
						    $image=$feimgs['image'];    
			                $path="https://www.infrainit.com/ibuild/images/houses/".$image;
			                
    			              if($i==1){
    			                ?>
    			                
    						  <li class="active"><a data-target="<?php echo '#pic-'.$i;?>" data-toggle="tab"><img src="<?php echo $path;?>" /></a></li>
    						  
    						  
    						  <?php
    			               }
    			               else{
                    			    ?>
    						  <li><a data-target="<?php echo '#pic-'.$i;?>" data-toggle="tab"><img src="<?php echo $path;?>" /></a></li>               
    			               <?php
    			                   
    			               }
						   $i++; 
						   
						   }
						   ?>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $name;?></h3>
						<div class="rating">
							<div class="stars">
                             <?php
                       if(isset($_SESSION['u_id'])){
                           $ourhouse=$house;
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
                
                      <span class="likes_shower"> <?php echo $likes;?></span>
                       <input  type="hidden" class="open_house_id" value="<?php echo $house;?>" />
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
                       <span class="dislikes_shower"> <?php echo $dislikes;?></span>


							</div>
						</div>
						<p class="product-description"><?php echo $desc; ?></p>
						<h4 class="price">Estimated Implementation budget: <span>Rs. <?php echo $budget;?></span></h4>
						<!-- class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p-->
						<h5 class="sizes">Area Covered (l*b):
							<span class="size" data-toggle="tooltip" title="dimensions"><?php echo $dimen;?></span>
							
							<span class="size" data-toggle="tooltip" title="Total Area in meter square"><?php echo $area." sq. m";?></span>
						</h5>
						<h5 class="colors">Architecture concept:
						
							<span class="green" data-toggle="tooltip" title="based on this architecture"><?php echo $arc;?></span>
						</h5>
						<div class="action">
							<h5 class="colors" >Contact</h5>
							<a class="cont btn btn-default" href="tel:<?php echo $phone;?>"><span class="fa fa-phone"></span></a>
							
							<button class="cont btn btn-default" type="button"><span class="fa fa-envelope"></span></button>
						</div>
					</div>
				</div>
				<div class="wrapper row">
				    
					<div class=" container">
					    <h5 class="colors">Specifications</h5>
					       <div class="col-md-6">     
                                    			<h5 class="colors">Living Rooms:</h5>
						
							<span class="normal simple"><?php echo $livrooms;?></span>
						
                                <h5 class="colors">Bed Rooms:</h5>
						
							<span class="normal simple"><?php echo $bedrooms;?></span>
							<h5 class="colors">Bed Rooms Description:</h5>
						
							<span class="normal simple"><?php echo $bedrooms_desc;?></span>

							<h5 class="colors">Garage Bays:</h5>
							<span class="normal simple"><?php echo $garage;?></span>
							
							<h5 class="colors">Garage Desc:</h5>
							<span class="normal simple"><?php echo $garage_desc;?></span>
						   </div>
						    <div class="col-md-6">
						        
							<h5 class="colors">Garden :</h5>
						
							<span class="normal simple"><?php echo $garden;?></span>
							<h5 class="colors">Floors:</h5>
						
							<span class="normal simple"><?php echo $floors;?></span>
							<h5 class="colors">Living Rooms Description:</h5>
						
							<span class="normal simple"><?php echo $livingrooms_desc;?></span>
							
							<h5 class="colors">Wash Rooms/Toilet/Bathrooms:</h5>
						
							<span class="normal simple"><?php echo $bathrooms;?></span>
							
							<h5 class="colors">Washrooms Desc:</h5>
						
							<span class="normal simple"><?php echo $washrooms_desc;?></span>
							</div>
						
                     </div>
                
				</div>
				     <?php
			      }
                     ?>
			</div>
		</div>
	</div>
	
      <?php 
       include '../../blocks/footer/footer.php';
      ?>
  </body>
</html>

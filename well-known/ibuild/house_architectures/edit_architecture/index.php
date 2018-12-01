<!Doctype HTML>

<?php
session_start();
//security mechanism starts
  $bool_log=0;
    include '../../system/init.php';
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
    //Security mechanism ends
    
  
?>
<html>
    
        
    <head>
        
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
                
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                
                <link rel="stylesheet" type="text/css" href="../../css/styles.css">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">   
            
            <script src="../../scripts/notify.js"></script>
            <script src="../../scripts/edit_arc.js"></script>

 <title>Edit Architecture</title>
 <style>
         html{
             font-size:13px;
         }
         
        a:hover{
            text-decoration:none;
        }
        #img_del_button{
            position:absolute;
            top:2%;
            right:0%;
        }
        .my_images_in_edit{
            display:inline-block;
            margin:1%;
        }
        .hold_image{
            text-align:center;
            position:relative;
            max-width:400px;
            
            
        }   
        #progress-wrp {
          border: 1px solid #0099CC;
          padding: 1px;
          position: relative;
          height: 30px;
          border-radius: 3px;
          margin: 10px;
          text-align: left;
          background: #fff;
          box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
        }
        
        #progress-wrp .progress-bar {
          height: 100%;
          border-radius: 3px;
          background-color: #f39ac7;
          width: 0;
          box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
        }
        
        #progress-wrp .status {
          top: 3px;
          left: 50%;
          position: absolute;
          display: inline-block;
          color: #000000;
        }
    </style>
</head>
<body>
    <?php include "../../blocks/header/header.php";
    
    if(isset($_GET['err'])){
        ?>
        <div class=" wrapper alert alert-warning"><?php echo $_GET['err'];?></div> 
    <?
        
    }
    if(isset($_GET['succ'])){
        ?>
        <div class=" wrapper alert alert-info"><?php echo $_GET['succ'];?></div> 
    <?
        
    }
    
    ?>
    
    
<form class="form-horizontal" action="process_new_arc.php" method="post" enctype="multipart/form-data" style="padding:1%;">
   <?php  
if(isset($_SESSION['u_id'])&&$bool_log==1 && isset($_GET['house'])){
          
  $house=mysqli_real_escape_string($db,$_GET['house']);
   
  $viewarc= mysqli_query($db,"SELECT * FROM house_arc WHERE house_id='$house'");
  
  while($hof=mysqli_fetch_assoc($viewarc)){
       
   

?>
<fieldset>

<!-- Form Name -->
<input type="hidden" value="<?php echo $house;?>" id="hidhouse" name="hidhouse"/>
<legend>Edit House Architecture</legend>
 <?php $imageque=mysqli_query($db,"SELECT * FROM house_images WHERE house_id='$house'");
  while($images=mysqli_fetch_assoc($imageque)){
      $idimg=$images['image_id'];
      $image=$images['image'];
      $path="/ibuild/images/houses/".$image;
  
?>
 
 <!-- File Button --> 
<div class="my_images_in_edit">
   
   <div  class="hold_image">
       <img src="<?php echo $path;?>" class="center img-responsive" alt="image could not be displayed">
   
   <div style="margin:1%">
       <button  type="button" id="img_del_button" for="image" onclick="delfunction('<?php echo $idimg;?>','<?php echo $image;?>')" data-toggle="tooltip" title="click to delete the image">
      Delete Image</button>
  
  </div>
    </div>
</div>
 <?php
  }
?>

<!--add new file-->
<div class="form-group">
  <label class="col-md-4 control-label" for="floors">Add new image</label>  
  <div class="col-md-4">
  <input id="added_image" name="added_image" class="input-file " type="file" required>
    <div id="progress-wrp">
    <div class="progress-bar"></div>
    <div class="status">0%</div>
</div>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="arc_name">Architecture Name</label>  
  <div class="col-md-4">
  <input id="arc_name" name="arc_name" value="<?php echo $hof['name'];?>" data-toggle="tooltip" title="modify text and click outside to change" class="form-control input-md" required="" type="text" required>
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category">CATEGORY</label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control" required>
        <option value="Nepali Traditional House">Nepali Traditional House</option>
        <option value="Log Home">Log Home</option>
        
        <option value="Cape Cod">Cape Cod</option>
        
        <option value="Art Deco">Art Deco</option>
        
        <option value="Crafts Man">Craftsman</option>
        
        <option value="Log Home">Log Home</option>
        
        <option value="Traditional Newari">Traditional Newari</option>
        
        <option value="Contemporary">Contemporary</option>
        
        <option value="Colonial">Colonial</option>
        
        <option value="Mid-Century Modern">Mid-Century Modern</option>
        
        <option value="French Provincial">French Provincial</option>
        
        <option value="Greek Revival">Greek Revival</option>
        
        <option value="Italinate">Italinate</option>
        
        <option value="Mediterranean">Mediterranean</option>
        
        <option value="Neoclassical">Neoclassical</option>
        
        <option value="Town House">Town House</option>
        
        <option value="Cottage">Cottage</option>
        
        <option value="Farmhouse">Farmhouse</option>
        
        <option value="Others">Others</option>
        
        
        <option value="Modern Concrete Building">Modern Concrete Building</option>
    </select>
  </div>
</div>
<!-- Number input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="floors">No of Floors</label>  
  <div class="col-md-4">
  <input id="floors" name="floors" placeholder="Enter no of floors" value="<?php echo $hof['floors'];?>" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bedrooms">No of Bedrooms</label>  
  <div class="col-md-4">
  <input id="bedrooms" name="bedrooms" placeholder="Bedrooms" value="<?php echo $hof['bedrooms'];?>" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bed_room_desc">Bed Rooms Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="bed_room_desc" name="bed_room_desc" required><?php echo $hof['bedrooms_desc'];?></textarea>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="livrooms">No of Living rooms</label>  
  <div class="col-md-4">
  <input id="livrooms" name="livrooms" placeholder="No of Living rooms available" value="<?php echo $hof['livingrooms'];?>"class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="living_room_desc">Living rooms Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="living_room_desc" name="living_room_desc" required> <?php echo $hof['livingrooms_desc'];?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="washrooms">No of Washrooms/Toilets</label>  
  <div class="col-md-4">
  <input id="washrooms" name="washrooms" placeholder="Input number of washrooms" value="<?php echo $hof['bathrooms'];?>" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Wash desc input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="wash_desc">Washroom Description</label>
  <div class="col-md-4">
     <textarea class="form-control" id="wash_desc" name="wash_desc"><?php echo $hof['washrooms_desc'];?></textarea>
  </div>
    
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="arc_description">Architecture Description (overall)</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="arc_description" name="arc_description"><?php echo $hof['description'];?></textarea>
  </div>
</div>

<!-- Number input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="garagebays">No of Garages</label>  
  <div class="col-md-4">
  <input id="garagebays" name="garagebays" placeholder="No of garagebays" value="<?php echo $hof['garagebays'];?>" class="form-control input-md" required="" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="garage_desc">Garage Description</label>
  <div class="col-md-4">
                        
    <textarea class="form-control" id="garage_desc" name="garage_desc"><?php echo $hof['garage_desc'];?></textarea>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="garden">Garden </label>  
  <div class="col-md-4">                    
    <textarea class="form-control" id="garden" name="garden"><?php echo $hof['garden'];?></textarea>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone/Mobile Number:</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" placeholder="Enter contact number with country code" value="<?php echo $hof['phone'];?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="budget">Estimated budget</label>  
  <div class="col-md-4">
  <input id="budget" name="budget" value="<?php echo $hof['estim_budget'];?>" placeholder="Input Estimated Budget (RS.)" class="form-control input-md" required="" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="length">Length (in M)</label>  
  <div class="col-md-4">
  <input id="length" name="length" placeholder="Enter the area length" value="<?php echo $hof['length'];?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bredth">Bredth (in M)</label>  
  <div class="col-md-4">
  <input id="bredth" name="bredth" placeholder="Enter the area bredth" value="<?php echo $hof['bredth'];?>" class="form-control input-md" required="" type="text">
</div>
</div>

</fieldset>

<?php 
   }
   }
   else{
       echo "<h3>Unauthorized Access !!!</h3>";
   }

?>
</form>

    <?php include "../../blocks/footer/footer.php";

    mysqli_close($db);?>
     
  <script>
      function delfunction(imageid,image){
            dat="image_id="+imageid+"&file="+image;
            
            this.innerHTML="Deleting wait";
         
          $.ajax({
                  url:"house_image_del.php",
                  type:"post",
                  data:dat,
                  
                  success:function(data){
                      alert(data);
                      location.reload();
                  },
                  error: function(data){
                      alert(error);
                  }
          });
      };
      
  </script>   
</body>
</html>
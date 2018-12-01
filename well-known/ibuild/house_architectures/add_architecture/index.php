<!Doctype HTML>
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
<!------ Include the above in your HEAD tag ---------->
 <title>Add architecture</title>
 <style>
         html{
             font-size:13px;
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
<fieldset>

<!-- Form Name -->
<legend>Add a New House Architecture</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="arc_name">Architecture Name</label>  
  <div class="col-md-4">
  <input id="arc_name" name="arc_name" placeholder="Architecture Name" class="form-control input-md" required="" type="text" required>
    
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
  <input id="floors" name="floors" placeholder="Enter no of floors" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bedrooms">No of Bedrooms</label>  
  <div class="col-md-4">
  <input id="bedrooms" name="bedrooms" placeholder="Bedrooms" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bed_room_desc">Bed Rooms Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="bed_room_desc" name="bed_room_desc" required></textarea>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="livrooms">No of Living rooms</label>  
  <div class="col-md-4">
  <input id="livrooms" name="livrooms" placeholder="No of Living rooms available" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="living_room_desc">Living rooms Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="living_room_desc" name="living_room_desc" required></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="washrooms">No of Washrooms/Toilets</label>  
  <div class="col-md-4">
  <input id="washrooms" name="washrooms" placeholder="Input number of washrooms" class="form-control input-md" required="" type="number" required>
    
  </div>
</div>

<!-- Wash desc input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="wash_desc">Washroom Description</label>
  <div class="col-md-4">
     <textarea class="form-control" id="wash_desc" name="wash_desc"></textarea>
  </div>
    
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="arc_description">Architecture Description (overall)</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="arc_description" name="arc_description"></textarea>
  </div>
</div>

<!-- Number input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="garagebays">No of Garages</label>  
  <div class="col-md-4">
  <input id="garagebays" name="garagebays" placeholder="No of garagebays" class="form-control input-md" required="" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="garage_desc">Garage Description</label>
  <div class="col-md-4">
                        
    <textarea class="form-control" id="garage_desc" name="garage_desc"></textarea>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="garden">Garden </label>  
  <div class="col-md-4">                    
    <textarea class="form-control" id="garden" name="garden"></textarea>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone/Mobile Number:</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" placeholder="Enter contact number with country code" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="budget">Estimated budget</label>  
  <div class="col-md-4">
  <input id="budget" name="budget" placeholder="Input Estimated Budget (RS.)" class="form-control input-md" required="" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="length">Length (in M)</label>  
  <div class="col-md-4">
  <input id="length" name="length" placeholder="Enter the area length" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bredth">Bredth (in M)</label>  
  <div class="col-md-4">
  <input id="bredth" name="bredth" placeholder="Enter the area bredth" class="form-control input-md" required="" type="text">
</div>
</div>
 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="main_image"  data-toggle="tooltip" title="Include 1 image to be displayed most often">Main Image</label>
  <div class="col-md-4">
    <input id="main_image" name="images[]" class="input-file" type="file" required>
  </div>
</div>
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="auxillary_images"  data-toggle="tooltip" title="Can include multiple images up to 5">Auxillary Image</label>
  <div class="col-md-4">
    <input id="auxillary_images" name="images[]" class="input-file" type="file"  required>
  </div>
</div>
<!--file button-->
<div class="form-group">
  <label class="col-md-4 control-label" for="auxillary_images"  data-toggle="tooltip" title="Can include multiple images up to 5">Auxillary Image</label>
  <div class="col-md-4">
    <input id="auxillary_images" name="images[]" class="input-file" type="file">
  </div>
</div>

<!--file button-->
<div class="form-group">
  <label class="col-md-4 control-label" for="auxillary_images"  data-toggle="tooltip" title="Can include multiple images up to 5">Auxillary Image</label>
  <div class="col-md-4">
    <input id="auxillary_images" name="images[]" class="input-file" type="file" >
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
      <label class="col-md-4"></label>
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit Architecture</button>
  </div>
  </div>

</fieldset>
</form>

    <?php include "../../blocks/footer/footer.php";?>
</body>
</html>
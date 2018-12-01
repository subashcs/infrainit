<?php
include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
$mat_name=mysqli_real_escape_string($db,$_POST['mat_name']);
$category=$_POST['category'];
$amount=$_POST['available_amount'];
$unit=$_POST['selectunit'];
$sizes=$_POST['select_sizes'];
$amount.=" ".$unit;
$prices=$_POST['price'];

if(empty($_POST['districts'])){
  $errf="Enter districts  details!";
    $url="../?errf= ".$errf;
  header("location: $url ");

    }
    
    
    
    if(empty($_POST['ext_details'])){
  $errf="Enter material details!";
    $url="../?errf= ".$errf;
  header("location: $url ");
}


$districts=$_POST['districts'];
$manufacturer=$_POST['manufacturer'];
$ext_details=mysqli_real_escape_string($db,$_POST['ext_details']);
$f_image=$_FILES['file']['name'];


session_start();

  //security mechanism starts
  $bool_log=0;
    
    if(isset($_SESSION['u_id'])){
       
    $rand=$_SESSION['u_id'];
     $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
     while($logs=mysqli_fetch_assoc($findlog)){
         $user=$logs['u_id'];
         $bool_log=1;
         
     }
    }
    //Security mechanism ends added 4/27/2018

$for_path=mysqli_query($db,"SELECT email FROM usersi WHERE u_id='$user'");
while ($e=mysqli_fetch_array($for_path))
 {
  $email=$e['email'];
}
$target_dir = "../../../users/suppliers/".$email."/materials/";
if(!file_exists($target_dir))
{
  mkdir($target_dir,0777,TRUE);
}
$target_dir.="/".$mat_name."/";
if(!file_exists($target_dir))
{
  mkdir($target_dir,0777,TRUE);
}
$target_dir.="images/";
if(!file_exists($target_dir))
{
  mkdir($target_dir,0777,TRUE);
}

$errf=" ";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check == false) {

        $errf.= " File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $errf.= " Sorry, file already exists.Try with different name";
    $uploadOk = 0;
   }
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    $errf.= " Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errf.= " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errf.= " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $errf.=" The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                        
                $date=date("Y/m/d");
                $send_data=mysqli_query($db,"INSERT INTO `items`(`material_name`, `category`, `available_amnt`, `user_id`, `ext_details`, `f_image`, `date`,`manufacturer`)VALUES ('$mat_name','$category','$amount','$user','$ext_details','$f_image','$date','$manufacturer')");
                
                if($send_data)
                {
                  $sel_id=mysqli_query($db,"SELECT id FROM items where ext_details='$ext_details' AND manufacturer='$manufacturer'");
                  while($mat=mysqli_fetch_assoc($sel_id))
                  {
                    $matid=$mat['id'];
                  }
                  $i=0;
                  while(!empty($districts[$i]))
                  {
                    $dist=$districts[$i];
                  $send_supply_reg=mysqli_query($db,"INSERT INTO supply_regions (material_id,supply_region) VALUES ('$matid','$dist')");
                   $i++;
                 }
                 $i=0;
                 while(!empty($sizes[$i])||!empty($prices[$i]))
                 {
                   $price=$prices[$i];
                  $size=$sizes[$i];
                  $send_item_size=mysqli_query($db,"INSERT INTO items_sizes (material_id,size,price_per_unit) VALUES ('$matid','$size','$price')");
                  $i++;
                 }
                if($send_supply_reg)
                {
                    $errf.=" Successful item upload.";
                  $url="../?errf= ".$errf;
                header("location: $url ");
                }
                }
                else{
                  $errmsg.= "err:404239";
                  $url="../?errf=".$errmsg;
                  header("location: $url ");
                
                }
    }
    else {
        $errf.=" Sorry, there was an error uploading your file.";
    }


  }
  $url="../?errf=".$errf;
header("location: $url ");



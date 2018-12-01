<?php
require '../../system/init.php';
if(isset($_POST['singlebutton'])){
    $arcname=mysqli_real_escape_string($db,$_POST['arc_name']);
    $category=mysqli_real_escape_string($db,$_POST['category']);
    $bedrooms=mysqli_real_escape_string($db,$_POST['bedrooms']);
    $bedroomdesc=mysqli_real_escape_string($db,$_POST['bed_room_desc']);
    $livrooms=mysqli_real_escape_string($db,$_POST['livrooms']);
    $livroomdesc=mysqli_real_escape_string($db,$_POST['living_room_desc']);
    $washrooms=mysqli_real_escape_string($db,$_POST['washrooms']);
    $washroomdesc=mysqli_real_escape_string($db,$_POST['wash_desc']);
    $arcdesc=mysqli_real_escape_string($db,$_POST['arc_description']);
    $garagebays=mysqli_real_escape_string($db,$_POST['garagebays']);
    $garagedesc=mysqli_real_escape_string($db,$_POST['garage_desc']);
    $gardendesc=mysqli_real_escape_string($db,$_POST['garden']);
    $phone=mysqli_real_escape_string($db,$_POST['phone']);
    $budget=mysqli_real_escape_string($db,$_POST['budget']);
    $length=mysqli_real_escape_string($db,$_POST['length']);
    $bredth=mysqli_real_escape_string($db,$_POST['bredth']);
    $floors=mysqli_real_escape_string($db,$_POST['floors']);
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
    //Security mechanism ends
    if(isset($_SESSION['u_id'])&&$bool_log==1){
    $provider=$user;
    }
    else{
        $provider=1;
        //die("Unauthorized Access");
    }
    
    $inhou=insert_house($db,$arcname,$category,$provider,$phone,$arcdesc,$bedrooms,$washrooms,$livrooms,$bedroomdesc,$livroomdesc,$washroomdesc,$floors,$gardendesc,$garagebays,$garagedesc,$budget,$length,$bredth);
    
    if($inhou){
        
        $findid=mysqli_query($db,"SELECT * FROM house_arc WHERE name='$arcname' AND provider='$provider' AND description='$arcdesc'");
         while($rows=mysqli_fetch_array($findid)){
             $id=$rows['house_id'];
         
         }
         if($findid){
             
               $a=$id;
              if ($_FILES['images']) {
                  
              
                $file_ary = reArrayFiles($_FILES['images']);
                foreach ($file_ary as $file) {
                   // print 'File Name: ' . $file['name'];
                    //print 'File Type: ' . $file['type'];
                    //print 'File Size: ' . $file['size'];
                if($file['size']>0){
                    
                        
                $target_dir = "../../images/houses/";
                $err="";
                $succ="";
                $fileupload=$file['name'];
                $target_file = $target_dir . basename($file["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                
                    $check = getimagesize($file["tmp_name"]);
                    if($check !== false) {
                        $succ.="File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        $err= "File is not an image.";
                        $uploadOk = 0;
                    }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    $err.= "file already exists,try with different name";
                    $uploadOk = 0;
                }
                // Check file size
                if ($file["size"] > 500000) {
                    $err.= " Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" )
                {
                    $err.= " only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $err.= " your file was not uploaded.";
                // if everything is ok, try to upload file
                }
                else {
                    if (move_uploaded_file($file["tmp_name"], $target_file)) {
                        
                        $imgsql="INSERT INTO house_images (house_id,image) VALUES('$a','$fileupload')";
                        if(mysqli_query($db,$imgsql)){
                        $succ.= "The file ". $fileupload. " has been uploaded.";
                        $counts++;
                        }
                        else{
                        unlink($target_file);
                        $err.="query incomplete!";
                        }
                    } 
                    else {
                        $err.= "Sorry, there was an error uploading your file.";
                    }
                }
                    
            }
          }//loop ends here
        }
              
        else{
                $err.= "No File were uploaded go back and try again";
            }
    
        
    }

    }
   $url="/ibuild/house_architectures/add_architecture?err=".$err."& succ=".$succ;
   header('Location:'.$url);

    mysqli_close($db);
    
}



//new functions here to insert architecture description

function insert_house($db,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r){
    $sql="INSERT INTO house_arc (name, architecture, provider, phone , description, bedrooms, bathrooms, livingrooms, bedrooms_desc, livingrooms_desc, washrooms_desc, floors, garden, garagebays, garage_desc, estim_budget, length, bredth ) VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r')";
   if(mysqli_query($db,$sql)){
       return 1;
   }
   else{
       return 0;
   }
   
}

//rearray

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


?>
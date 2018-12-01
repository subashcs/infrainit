<?php
  include '../../system/init.php';

     $matid=$_POST['mat'];
     //file upload
  if(!empty($_FILES["ifile"]["name"]))
  {
    if($_FILES['ifile']["name"] != "")
    {
      $uploadOk=1;
      if ( 0 < $_FILES['ifile']['error'] ) {
           echo  'Error: ' . $_FILES['ifile']['error'] . 'File Error';
           $uploadOk=0;
             }
       $for_item=mysqli_query($db,"SELECT * FROM items WHERE id='$matid'");
        while($namemat=mysqli_fetch_assoc($for_item))
         {
           $user=$namemat['user_id'];
           $nameofmat=$namemat['material_name'];
           $for_path=mysqli_query($db,"SELECT * FROM usersi WHERE u_id ='$user'");
          while ($e=mysqli_fetch_array($for_path))
           {
            $emailf=$e['email'];
           }//create directory to store file image
           $target_dir = "../../users/suppliers/".$emailf."/materials/";
           if(!file_exists($target_dir))
           {
             mkdir($target_dir,0777,TRUE);
           }
           $target_dir.=$nameofmat."/";
           if(!file_exists($target_dir))
           {
             mkdir($target_dir,0777,TRUE);
           }
           $target_dir.="images/";
           if(!file_exists($target_dir))
           {
             mkdir($target_dir,0777,TRUE);
           }
         $directory="../../users/suppliers/".$emailf."/materials/".$nameofmat."/images/".$_FILES['ifile']['name'];
         }
          $imageFileType = pathinfo($directory,PATHINFO_EXTENSION);
         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
         {
             $errfile= " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
             $uploadOk = 0;
           }
           $image=$_FILES['ifile']['name'];
           if (file_exists($directory)) {
            echo"The file". $_FILES['ifile']['name']." already exists. try with different name instead if error occured!";
            $send_img=mysqli_query($db,"UPDATE items SET f_image='$image' WHERE id='$matid'");
            if($send_img){
              echo"Successful!!";
            }
            else{
              echo"Some errors encountered";
            }
          //the idea is to change the data of image in database only
         } else {

       if($uploadOk!=0) {
       if(move_uploaded_file($_FILES['ifile']['tmp_name'], $directory ))
       {

        $send_img=mysqli_query($db,"UPDATE items SET f_image='$image' WHERE id='$matid'");
        if($send_img){
          echo"Successful!!";
        }
        else{
          echo"Some errors encountered";
        }
      }
    }
    }

  }
  }

  //what to do incase of same name

?>

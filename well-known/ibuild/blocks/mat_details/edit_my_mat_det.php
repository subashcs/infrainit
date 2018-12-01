<?php
  include '../../system/init.php';

   $matid=$_POST['matid'];
 $err="";
  if(!empty($_POST['addedsr']))
  { $addsr=mysqli_real_escape_string($db,$_POST['addedsr']);
    $querysr=mysqli_query($db,"INSERT INTO supply_regions(material_id,supply_region) VALUES ('$matid','$addsr')");
   if(!$querysr){
     $err.="1";
   }
  }

  if(!empty($_POST['addedsize'])&&!empty($_POST['priceadd']))

  {
     $asize=mysqli_real_escape_string($db,$_POST['addedsize']);
     $aprice=mysqli_real_escape_string($db,$_POST['priceadd']);

    $querysi=mysqli_query($db,"INSERT INTO items_sizes(material_id,size,price_per_unit) VALUES ('$matid','$asize','$aprice')");
    if(!$querysi){
      $err.="1";
    }
  }

  if(!empty($_POST['size_id']))
    {
      $size_id=$_POST['size_id'];
    }

    echo $size_id[1];
  if(!empty($_POST['reg_id']))
  {
    $reg_id=$_POST['reg_id'];
  }

    if(!empty($_POST['cat']))
    {
    $cat=mysqli_real_escape_string($db,$_POST['cat']);
    $queryc=mysqli_query($db,"UPDATE items SET category='$cat' WHERE id='$matid'");
    if(!$queryc){
      $err.="1";
    }
    }
    if(!empty($_POST['avail_amnt']))
    {
    $amnt=mysqli_real_escape_string($db,$_POST['avail_amnt']);
    $querya=mysqli_query($db,"UPDATE items SET available_amnt='$amnt' WHERE id='$matid'");
    if(!$querya){
      $err.="1";
    }
    }

    if(!empty($_POST['manufacturer']))
    {
    $manufacturer=mysqli_real_escape_string($db,$_POST['manufacturer']);
    $querym=mysqli_query($db,"UPDATE items SET manufacturer='$manufacturer' WHERE id='$matid'");
    if(!$querym){
      $err.="1";
    }
    }
    if(!empty($_POST['ext_details']))
    {
    $details=mysqli_real_escape_string($db,$_POST['ext_details']);
    $querydet=mysqli_query($db,"UPDATE items SET ext_details='$details' WHERE id='$matid'");
    if(!$querydet){
      $err.="1";
    }
    }
    if(!empty($_POST['supplreg']))
    {
        
    $supplyreg=$_POST['supplreg'];
    $i=0;
    while(!empty($supplyreg[$i]))
    {
       $reg=$reg_id[$i];
      $dist=mysqli_real_escape_string($db,$supplyreg[$i]);//
      $send_supply_reg=mysqli_query($db,"UPDATE supply_regions SET supply_region='$dist' WHERE reg_id='$reg'");
       $i++;
       if(!$send_supply_reg){
         $err.="1";
       }
    }
    }
    if(!empty($_POST['size'])&&!empty($_POST['price']))
    {


    $size=$_POST['size'];
    $prices=$_POST['price'];
    $i=0;
    while(!empty($size[$i]))
    {
      $sizeid=$size_id[$i];
      $siz=mysqli_real_escape_string($db,$size[$i]);

      $price=mysqli_real_escape_string($db,$prices[$i]);//
      $send_size=mysqli_query($db,"UPDATE items_sizes SET size='$siz',price_per_unit='$price' WHERE size_id='$sizeid'");
       $i++;
       if(!$send_size){
         $err.="1";
       }
    }
    }
    if(empty($err)){
      echo"success";
    }
    else{
      echo"Query error.please report!";
    }
    mysqli_close($db);






 ?>

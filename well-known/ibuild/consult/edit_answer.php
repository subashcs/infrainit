<?php
require "../system/init.php";
$data=mysqli_real_escape_string($db,$_POST['ans']);
$id=mysqli_real_escape_string($db,$_POST['ans_id']);

$update=mysqli_query($db," UPDATE queries_answers SET answer='$data' WHERE ans_id='$id'");
if($update){

  echo"successful";
}
else{
    echo "unsuccessful";
  }

mysqli_close($db);
 ?>

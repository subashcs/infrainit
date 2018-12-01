<?php
require "../system/init.php";
$id=mysqli_real_escape_string($db,$_POST['ans_id']);
$findid=mysqli_query($db,"SELECT * FROM queries_answers WHERE ans_id='$id'");
while($rows=mysqli_fetch_assoc($findid)){
 $queid=$rows['que_id'];   
}

$delete=mysqli_query($db," DELETE FROM queries_answers WHERE ans_id='$id'");

if($delete){
      $update=mysqli_query($db,"UPDATE `queries` SET `answer_count`=`answer_count`-1 WHERE `que_id`='$queid'");
        //use trigger instead
          
  echo"successful";
}
else{
    echo "unsuccessful";
  }

mysqli_close($db);
 ?>

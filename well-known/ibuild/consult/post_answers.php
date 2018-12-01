<?php
require '../system/init.php';

 if(isset($_POST['add-answer']) && $_POST['answer']!="Add answer")
 {

 $ans=mysqli_real_escape_string($db,$_POST['answer']);
 $user=$_POST['u_id'];
 $que_id=$_POST['q_id'];
  $errfile=" ";
  if(!empty($_FILES['ansfile']['name']))
  {
    
  $uploadOk=1;
  if ( 0 < $_FILES['ansfile']['error'] ) {
         $errfile.= 'Error: ' . $_FILES['ansfile']['error'] . '<br>';
         $uploadOk=0;
     }
        $directory="../images/questionanswer/".$_FILES['ansfile']['name'];

     $imageFileType = pathinfo($directory,PATHINFO_EXTENSION);
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         $errfile.= " Sorry, only JPG, JPEG , PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
     if($uploadOk!=0) {
        move_uploaded_file($_FILES['ansfile']['tmp_name'], $directory );

          $image=$_FILES['ansfile']['name'];

         $sendquery= mysqli_query($db,"INSERT INTO `queries_answers` (`answerer_id`,`answer`,`file`,`que_id`) VALUES('$user','$ans','$image','$que_id')");
         $sendnumbers=mysqli_query($db,"UPDATE `queries` SET `answer_count`=`answer_count` + 1 WHERE `que_id`='$que_id'");
     }

   }
    else{
          $sendquery= mysqli_query($db,"INSERT INTO `queries_answers` (`answerer_id`,`answer`,`que_id`) VALUES('$user','$ans','$que_id')");
          $sendnumbers=mysqli_query($db,"UPDATE `queries` SET `answer_count`=`answer_count` + 1 WHERE `que_id`='$que_id'");

        }
        if($sendnumbers){
            //send notice to question maker
          $topic="One new answer to your question";
          $dest_url="/ibuild/consult/a_single_question?q_id=".$que_id;
          $n_idfetcher=mysqli_query($db,"SELECT max(n_id) from notices WHERE 1");
          $fetchedid=mysqli_fetch_row($n_idfetcher);
            $the_n_id=$fetchedid[0]+1;

          $sendnotice=mysqli_query($db,"INSERT INTO notices(n_id,topic,dest_url) VALUES('$the_n_id','$topics','$dest_url')");

            $fetchu_id=mysqli_query($db,"SELECT * FROM queries WHERE que_id='$que_id'");
            while($fetchedu=mysqli_fetch_assoc($fetchu_id)){
              $fu_id=$fetchedu['u_id'];
            }

            $sendquestionernotice=mysqli_query($db,"INSERT INTO noticeuser(n_id,target_user) VALUES ('$the_n_id','$fu_id')");
            //send notice to answerer
            $topic="Your answer has been added!";


            $asendnotice=mysqli_query($db,"INSERT INTO notices(n_id,topic,dest_url) VALUES('$the_n_id','$topic','$dest_url')");
            if($asendnotice){
            $sendusertarget=mysqli_query($db,"INSERT INTO noticeuser(n_id,target_user) VALUES ('$the_n_id','$user')");
          }

       }
}


 else{
   $errfile="no input";

 }

 
 $url="index.php?err=".$errfile;
header('location:'.$url);
 ?>

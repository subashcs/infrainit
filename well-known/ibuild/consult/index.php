<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Consult to experts about your infrastructure like House crack fixes,bridge crack solutions , architecture suggestions and more."> 
  <meta name="keywords" content="architecture problem, experts, house crack ,home ,school , reconstruction, suggestions, new , building,decoration">
  <title>Infrainit | Consult</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/ibuild/css/styles.css">
  <link rel="shortcut icon" type="image/png" href="http://www.infrainit.com/ibuild/images/logo.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../scripts/editqueans.js" ></script>
    <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<?php require 'header.php';

include '../blocks/main/encryptor.php';
?>

<div class="container text-center">
    <?php
             if(isset($_GET['err'])){
   ?>
   <span class="alert alert-info">
                <?php echo $_GET['err'];?>
             </span>
    <?php         }
            ?>
  <div class="row">

    <div class="col-sm-9">
        <?php    if(isset($_SESSION['u_id'])&&$bool_log==1){
    ?>
      <div class="col-sm-12 " style="margin:2% 0%;">


            <form method="post" enctype="multipart/form-data" class=" form-group panel panel-default col-md-12" action="post_question.php"  id="query_add" name="query_add" >
                <div class="panel-body">
                  <textarea name="question" style="padding:1%;resize:none;width:100%;" required>Add queries?</textarea>
                </div>
                <div class="panel-heading">
                   <input type="file" name="afile" class="custom-file-input" style="display:inline-block">
                   <input type="hidden" name="u_id" value="<?php echo $user;?>">
                   <button name="add" value="Add" class="btn btn-default btn-sm " style="display:inline-block;margin:1%;" >
                    <span class="glyphicon glyphicon-plus-sign"></span> Add query
                    </button>
               </div>
               
              </form>
            
          </div>


      <?php

                }
                // find out how many rows are in the table
              $sql = "SELECT COUNT(*) FROM queries WHERE 1";
              $result = mysqli_query($db,$sql) or trigger_error("SQL", E_USER_ERROR);
              $r = mysqli_fetch_row($result);
              $numrows = $r[0];

              // number of rows to show per page
              $rowsperpage = 10;
              // find out total pages
              $totalpages = ceil($numrows / $rowsperpage);

              // get the current page or set a default
              if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
               // cast var as int
               $currentpage = (int) $_GET['currentpage'];
              } else {
               // default page num
               $currentpage = 1;
              } // end if

              // if current page is greater than total pages...
              if ($currentpage > $totalpages) {
               // set current page to last page
               $currentpage = $totalpages;
              } // end if
              // if current page is less than first page...
              if ($currentpage < 1) {
               // set current page to first page
               $currentpage = 1;
              } // end if

              // the offset of the list, based on current page
              $offset = ($currentpage - 1) * $rowsperpage;

              // get the info from the db
              $sql = "SELECT * FROM queries ORDER BY que_id DESC LIMIT $rowsperpage OFFSET $offset";

              $fetchquest = mysqli_query($db,$sql) or trigger_error("SQL", E_USER_ERROR);


            while($ques=mysqli_fetch_assoc($fetchquest))
            {
              #fetch query from here
              $questioner_id=$ques['u_id'];
              $questioner_id_send=my_encrypt($questioner_id, $key);
        ?>  
      <div>
           <a href="<?php echo'/ibuild/blocks/accounts?u_id='.$questioner_id_send;?>" class="col-sm-3 container-fluid">
           <?php
           
           $questioner=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$questioner_id'");
                       while($questioner_name=mysqli_fetch_assoc($questioner))
                       {
                         $quname=$questioner_name['name'];
                         $qemail=$questioner_name['email'];
                         $qrole=$questioner_name['role'];
                         $quimg=$questioner_name['image'];
                       }
                       $queurl="../users/".$qrole."/".$qemail."/profile_images/".$quimg;
           ?>
          <img src="<?php echo $queurl;?>" class="img-circle" height="55" width="55" alt="Avatar">
          <p><?php echo $quname;?></p>
        </a>
        <div class="col-sm-9"> <!--question starts-->
          <div class="well well-sm" >
             
               <span style="float:left;font-family:bonds"><?php echo $ques['date'];?></span>    
             <?php
             if($questioner_id==$user){
                 //currentgo?>

              <div style="float:right;clear:both;">
               <button name="edit_question" class="edit_question_button" style="font-size:80%;">edit</button>
                <input type="hidden" class="question_to_edit_del" value="<?php echo $ques['que_id'];?>"/>
                <button name="delete_question" class="delete_question_button" style="font-size:80%;">delete</button>
              </div>
              <div class="edit_question_wrap" >
              <textarea class="edit_question" style="width:100%;max-width:100%;padding:1%;"><?php echo $ques['question'];?></textarea>
              <button class="submit_edited_question">Done edit</button>
              <button class="cancel_question_edit">Cancel</button>
              </div>
             <?php
                //do not change these div and pre order or will affec editqueans.js
              }?>

                <pre id="show_question" style="clear:both;overflow-x:hide;font-size:110%;white-space:pre-line;background:white;word-wrap:break-word;max-height:150px;overflow-y:scroll">
                <?php echo $ques['question'];
                 ?>
                </pre>

              <?php $imageinqueurl="/ibuild/images/questionanswer/".$ques['file'];
                 
                 if(!empty($ques['file']))
                 {
                 ?>
             <img src="<?php echo $imageinqueurl;?>" class="img-rounded img-responsive" alt="<?php echo $ques['question'];?>">
             <?php } ?>

           </div>
           <!--Answer-->

           <h4 style="margin-top:-2%;text-align:left;">Answers</h4>
                <!--divisons-->
              <?php
               $que_id=$ques['que_id'];
               $ans_fetch=mysqli_query($db,"SELECT * FROM queries_answers WHERE que_id='$que_id' ORDER BY ans_id DESC LIMIT 10 ");
              ?>
               <!-- comment content-->
               <?php    if(isset($_SESSION['u_id'])&&$bool_log==1){
    ?>
                   <form enctype="multipart/form-data"  method="post" action="post_answers.php" class="form-group panel panel-default col-sm-12 container"  >
                        <div class="panel-body">
                          <textarea class="form-control " name="answer" rows="3" id="answer" style="resize:none;">Add answer</textarea>
                          <input type="hidden" name="q_id" value="<?php echo $que_id;?>">
                          <input type="hidden" name="u_id" value="<?php echo $user;?>">
                        </div>
                       <div class="panel-heading">

                          <input type="file" name="ansfile" class="custom-file-input" style="display:inline-block;">
                           <button name="add-answer"  value="answer" id="answer" class="btn btn-default btn-sm" style="display:inline-block;margin:1%;" >
                           <span class="glyphicon glyphicon-plus-sign"></span> Answer
                           </button>
                       </div>
                   </form>
                   <?php
               }
                   if(mysqli_num_rows($ans_fetch)==0)
                   {
                     ?>
                     <p> Not answered at -provide your answer above</p>
                    <?php

                   }


                while($fetched_answers=mysqli_fetch_assoc($ans_fetch))
               {
                   ?>
           <div class="col-sm-12" style="padding:1%;"><!--for answers-->
             <!-- comment content-->
                <?php

                 $answerer_id=$fetched_answers['answerer_id'];
                 $answerer_id_send=my_encrypt($answerer_id,$key);
                 ?>
             <a class="col-sm-3" href="<?php echo'/ibuild/blocks/accounts?u_id='.$answerer_id_send;?>">
            <?php

                 $answerer=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$answerer_id'");
                             while($answerer_email=mysqli_fetch_assoc($answerer))
                             {$auname=$answerer_email['name'];
                             $aemail=$answerer_email['email'];
                             $arole=$answerer_email['role'];
                             $auimg=$answerer_email['image'];
                             }
                             $ansurl="../users/".$arole."/".$aemail."/profile_images/".$auimg;
                 
                 ?>
                 
                 <img src="<?php echo $ansurl;?>" class="img-circle" height="55" width="55" alt="Avatar">
                 <p><?php echo $auname;?></p>
             </a>
             <!--answer-->
             <div class="col-md-9 well">
               <span style="float:left;font-family:bonds"><?php echo $fetched_answers['date'];?></span> 
               <?php
                  
                    if($user==$answerer_id){
                                ?>
                                 <div style="float:right;margin-top:0;clear:both;">
                                  <button name="edit_answer" class="edit_answer_button" style="font-size:80%;">edit</button>
                                   <input type="hidden" class="answer_to_edit_del" value="<?php echo $fetched_answers['ans_id'];?>"/>
                                   <button name="delete_answer" class="delete_answer_button" style="font-size:80%;">delete</button>
                                 </div>
                                 <div class="edit_answer_wrap">
                                 <textarea class="edit_answer" style="width:100%;max-width:100%;padding:1%;"><?php echo $fetched_answers['answer'];?></textarea>
                                 <label for="change_file">Change file: </label>
                                 <input type="file" name="change_file" placeholder="Change file">
                                 <label for="add_new_file">Add new file: </label>
                                 <input type="file" name="add_new_file" placeholder="add new file">
                                 <button class="submit_edited_answer">Done edit</button>
                                 <button class="cancel_answer_edit">Cancel</button>
                               </div>
                                <?php
                                   //do not change these div and pre order or will affec editqueans.js
                                 }
                                                ?>
                      <pre id="show_answer" style="clear:both;overflow-x:hide;font-size:110%;white-space:pre-line;word-wrap:break-word;overflow-y:scroll">
                                                <?php echo $fetched_answers['answer'];
                                                               ?>
                                                </pre>

                <?php   $imageinansurl="../images/questionanswer/".$fetched_answers['file'];
                if(!empty($fetched_answers['file'])){
                    
                
                 ?>

                 <img src="<?php echo $imageinansurl;?>" class="img-responsive" alt="infrainit answer">
                       <?php }?>
             </div>
          </div>
          <?php } ?>
        </div>
      </div>

  <?php }

                /******  build the pagination links ******/
                // range of num links to show
                $range = 3;

                // if not on page 1, don't show back links
                if ($currentpage > 1) {
                 // show << link to go back to page 1
                 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
                 // get previous page num
                 $prevpage = $currentpage - 1;
                 // show < link to go back to 1 page
                 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
                } // end if

                // loop to show links to range of pages around current page
                for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
                 // if it's a valid page number...
                 if (($x > 0) && ($x <= $totalpages)) {
                    // if we're on current page...
                    if ($x == $currentpage) {
                       // 'highlight' it but don't make a link
                       echo " [<b>$x</b>] ";
                    // if not current page...
                    } else {
                       // make it a link
                       echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
                    } // end else
                 } // end if
                } // end for

                // if not on last page, show forward and last page links
                if ($currentpage != $totalpages) {
                 // get next page
                 $nextpage = $currentpage + 1;
                  // echo forward link for next page
                 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
                 // echo forward link for lastpage
                 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
                } // end if
                /****** end build pagination links ******/


  ?>
</div>
 <?php include 'sidebar.php';?>
</div>

  <?php include '../blocks/footer/footer.php';?>

</body>
</html>

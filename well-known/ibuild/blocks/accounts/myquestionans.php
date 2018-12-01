<div id="my_question_ans">
       <form id="query_add" name="query_add" method="post" action="../../consult/post_question.php" enctype="multipart/form-data">
       <textarea name="question" required>Add queries?</textarea>
       <br/>
       <div style="clear:both;margin-top:-1%;background-color:#fafafa;">
        <input type="file" name="file_for_question" style="margin-right:50%;"/>
        <input type="submit" name="add" value="Add" style="float:right;margin-right:2%;"/>
       </div>
       </form>
       <h2>My Queries</h2>
       <?php $fetchquestions=mysqli_query($db,"SELECT * FROM queries WHERE u_id=$user");
             while($quesfetcher=mysqli_fetch_assoc($fetchquestions))
               {
                 $curques=$quesfetcher['que_id'];
                  $cururl="../../consult/a_single_question?q_id=$curques";
                  $fetchedq=$quesfetcher['question'];
                  $quesfinal=substr($fetchedq,0,80);
                  if(strlen($fetchedq)>80){
                  $quesfinal.="....";
                    }
                 ?>
                 <a href="<?php echo $cururl;?>" style="color:blue;padding:1%;"><?php echo $quesfinal?></a>
                 <br/><br/><?php
               }
               if(mysqli_num_rows($fetchquestions)==0){
                 echo"<h4>No queries yet!! ADD one!!</h4>";
               }
         ?>
       </p>

</div>

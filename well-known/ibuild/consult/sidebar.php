
    <div class="col-sm-3">
      <div>
        <p>UnAnswered Queries:<br>
        <?php  $fetchquestions=mysqli_query($db,"SELECT * FROM queries WHERE answer_count=0 ORDER BY que_id DESC LIMIT 5 ");
              if(mysqli_fetch_assoc($fetchquestions)==0){
                  echo "No questions to show!";
              }
               else{
                while($quesfetcher=mysqli_fetch_assoc($fetchquestions))
                { 
                  $curques=$quesfetcher['que_id'];
                   $cururl="/ibuild/consult/a_single_question?q_id=$curques";
                   $fetchedq=$quesfetcher['question'];
                   $quesfinal=substr($fetchedq,0,80);
                       if(strlen($fetchedq)>80){
                       $quesfinal.="....";
                         }
                            ?>
                  <a href="<?php echo $cururl;?>" style="color:blue;padding:1%;"><?php echo $quesfinal?></a>
                  <br/><br/><?php
                }
               }
          ?>
        </p>

      </div>
      <div class="panel">
        <p>Popular queries:
          <br/>
          <?php  $popquestions=mysqli_query($db,"SELECT * FROM queries ORDER BY answer_count DESC LIMIT 5");

                  while($quespop=mysqli_fetch_assoc($popquestions))
                  {

                    $curquespop=$quespop['que_id'];
                     $cururl="/ibuild/consult/a_single_question?q_id=$curquespop";
                     $fetchedq=$quespop['question'];
                     $quesfinal=substr($fetchedq,0,80);
                     if(strlen($fetchedq)>80){
                     $quesfinal.="....";
                       }
                    ?>
                    <a href="<?php echo $cururl;?>" style="color:blue;padding:1%;"><?php echo $quesfinal?></a>
                    <br/><br/><?php
                  }
            ?>

        </p>
      </div>
      <div class="panel">
        <p>Extra</p>
      </div>
    </div>
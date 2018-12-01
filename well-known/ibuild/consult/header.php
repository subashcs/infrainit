

  <nav class="navbar  navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/ibuild">Infrainit</a>

             <form class="navbar-brand navbar-form" role="search" action="/ibuild/consult/searchqueries.php">
             <div class="form-group input-group">
               <input type="text" class="form-control" name="search" placeholder="Search..">
               <span class="input-group-btn">
                 <button class="btn btn-default" type="button">
                   <span class="glyphicon glyphicon-search"></span>
                 </button>
               </span>
             </div>
           </form>

      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
          <li class="active"><a href="/ibuild">Home</a></li>

       </ul>
         <ul class="navbar-right navbar-nav nav">

        <li><i class="fa fa-user"></i> <?php
          session_start();
          
          include $_SERVER['DOCUMENT_ROOT'].'/ibuild/system/init.php';
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
          if(isset($_SESSION['u_id'])&&$bool_log==1)
          {
           $query1=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user'");
        if($query1==TRUE)
          {  while ($row=mysqli_fetch_assoc($query1)) {
            ?>
            <a href="/ibuild/blocks/accounts" ><?php  echo $row['name'];?></a>
        <?php }}
          }
        else {
          ?>
          <a href="/ibuild/blocks/login.php" ><?php  echo'Account';?></a>
      <?php  }
          ?></li>
        </ul>
      </div>
    </div>
  </nav>

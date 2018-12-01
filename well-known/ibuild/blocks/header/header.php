<div id="header">
  <ul id="top_head">
    <li id="logo">
     <a href="/ibuild/">
      <img class="logo" src= "/ibuild/images/logo.png" alt="i-build" > </a>
    </li>
    <li id="wrap">
      <form action="/ibuild/search/" method="get">
       <input type="text" id="search" name="search" placeholder="Search... what you want to find" required>
      </form>
    </li>

    <li id="noti_Container">
               <div id="noti_Counter"></div>   <!--SHOW NOTIFICATIONS COUNT.-->

               <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
               <div id="noti_Button">Notices</div>

               <!--THE NOTIFICAIONS DROPDOWN BOX.-->
               <div id="notifications">
                   <h3>Notifications</h3>
                   <div id="notices" style="height:300px;">

                  </div>


                   <div class="seeAll"><a href="/ibuild/blocks/notifications.php">See All</a></div>
               </div>
           </li>
    <li id="account">
      <i class="fa fa-user"></i> <?php
   
      if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

      include $_SERVER['DOCUMENT_ROOT'].'/ibuild/system/init.php';
        
          //security mechanism start
                  $bool_log=0;
            
            if(isset($_SESSION['u_id'])){
               
            $rand=$_SESSION['u_id'];
             $findlog=mysqli_query($db,"SELECT * FROM infra_login WHERE rand='$rand'");
             while($logs=mysqli_fetch_assoc($findlog)){
                 $user=$logs['u_id'];
                 $bool_log=1;
                 
             }
            }
            //security mechanism ends
      if(isset($_SESSION['u_id'])&&$bool_log==1)
      {      
          if(isset($_GET['u_id'])){
            $query1=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$cu'");
            if(mysqli_num_rows($query1)>0)
            {  while ($row=mysqli_fetch_assoc($query1))
              {
              ?>
              <a href="/ibuild/blocks/accounts" ><?php  echo $row['name'];?></a>
          <?php }
              }
          }
          
        else{
             $queryget=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user'");
            if(mysqli_num_rows($queryget)>0)
             {  while ($row=mysqli_fetch_assoc($queryget))
               {
               ?>
               <a href="/ibuild/blocks/accounts" ><?php  echo $row['name'];?></a>
            <?php
               }
              }
              
         }
         
      }
     

    else {
        ?>
      <a href="/ibuild/blocks/login.php" ><?php  echo'Account';?></a>
  <?php  }
      ?>
     </li>
     <?php if(isset($_SESSION['u_id'])){
              ?>

        <li class="dropdown_settings">
        <button onclick="myFunction()" class="dropbtn_settings">
          <i class="fa fa-cog"> </i> Settings
        </button>
          <div id="myDropdown_settings" class="dropdown-content_settings">
            <a href="/ibuild/blocks/main/logout.php"><i class="fa fa-cogs"> </i> log out</a>
            <a href="/ibuild/blocks/setting/">Change Password</a>
          </div>
        </li>

        <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown_settings").classList.toggle("show_settings");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn_settings')) {

            var dropdowns = document.getElementsByClassName("dropdown-content_settings");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show_settings')) {
                openDropdown.classList.remove('show_settings');
              }
            }
          }
        }
        </script>
  <?php
     }
     ?>
    <li id="mycart">
     <a href="/ibuild/cart"><i class="fa fa-shopping-cart" ></i> Cart</a>
    </li>
  </ul>

   <?php include $_SERVER['DOCUMENT_ROOT'].'/ibuild/blocks/navigation/navigation.php'; ?>
</div>

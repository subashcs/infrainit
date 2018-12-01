<div id="suppliers_wrapper_det">
   <h3 style="font-size:115%;border-color:transparent;margin-top:-2%;">Our Suppliers</h3>

    <div class="slideshow-container" id="s_container">

      <div class="wrap_all_obtained">
        <?php
         //first fire a query to get data from database about the suppliers
         include $_SERVER['DOCUMENT_ROOT'].'/ibuild/system/init.php';
         $suppliers=mysqli_query($db,"SELECT * FROM usersi AS u INNER JOIN suppliers AS s ON u.u_id=s.u_id ORDER BY u.u_id ASC  ");
         while ($supp=mysqli_fetch_array($suppliers)) {
             ?>
                <div class="mySlidesupp" >
                 <?php $path="/ibuild/users/suppliers/".$supp['email']."/profile_images/".$supp['image'];

                    ?>

                      <img src="<?php echo $path;?>" alt="infrainit suppliers image" >
                      <div class="text" style="display:block;padding-top:2%;">
                       <strong style="color:#fff7a5;"><?php echo $supp['company_name'];?></strong>
                       <div  class="company_description" style="font-style:italic;font-color:grey;"><?php echo $supp['company_des'];?></div>
                       <br/>
                        Location District: <?php echo $supp['district'];?>
                        </br>
                       <a href="<?php echo $supp['website'];?>" alt="web" style="text-decoration:underline;">Visit Website </a>
                     </div>
              </div>

         <?php } ?>
    </div>

</div>
  </div>

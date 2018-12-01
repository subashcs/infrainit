<?php
$findsuppliers=mysqli_query($db,"SELECT * FROM usersi INNER JOIN suppliers ON usersi.u_id=suppliers.u_id WHERE usersi.role='suppliers' AND  suppliers.company_name LIKE '%{$search_word}%' ");

if(mysqli_num_rows($findsuppliers)==0){
    echo "No searh matches!!";
}

while($searchedcustom=mysqli_fetch_assoc($findsuppliers)){
    
  $cus_id=$searchedcustom['u_id'];
  $cus_id_send=my_encrypt($cus_id,$key);
  $custake="../blocks/accounts?u_id=".$cus_id_send;
  ?>
 <a href="<?php echo $custake;?>">
  <li class="cust_ser_single">
    <!--insert image here-->

    <?php

      $path="../users/".$searchedcustom['role']."/".$searchedcustom['email']."/profile_images/".$searchedcustom['image'];

     ?>
     <table>
     <tr >
      <td rowspan="3">
       <img src="<?php echo $path;?>" alt="User" class="ser_image_cust" style="z-index:0;">
      </td>
      <td style="font-variant:petite-caps;">
      <?php echo $searchedcustom['name'];?>
      </td>
      <td rowspan="3" style="vertical-align:middle;">
        message
      </td>
    </tr>
    <tr>

      <td style="color:grey;">
        District: <?php echo $searchedcustom['district'];?>
      </td>

    </tr>
    <tr>
      <td>
        <a href="<?php echo $searchedcustom['website'];?>" style="color:#03f;">See social profile</a>
      </td>

    </tr>
  </table>

   </li>
  <p style="font-size:13px;margin-top:-5px;"><i>click this box to see infrainit profile</i></p>
 </a>
  <?php
}
?>

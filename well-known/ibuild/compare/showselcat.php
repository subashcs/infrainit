<?php

require $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";
if(isset($_POST['sc'])){
  $var=$_POST['sc'];
}
else{
  $var="";
}

$sql="SELECT * FROM items WHERE category='$var' AND deleted='0'";
$query=mysqli_query($db,$sql);

//this table is to show  a single item to choose-


     while($options=mysqli_fetch_assoc($query))
     {
       $itemid=$options['id'];
      echo" <input type='checkbox' name='items[]' value='".$itemid."' id='check_an_item'>";

    echo"<table class='table_show_opt' id='a_product_table_".$options['id']."'>";
      echo"

       <tr id='fis'>
         <input type='hidden' id='tis' value='".$options['id']."'>
       </tr>
       <tr>
         <td rowspan='4'>";

           $user_id=$options['user_id'];
           $ouruser=mysqli_query($db,"SELECT * FROM usersi WHERE u_id=$user_id");
           while($users=mysqli_fetch_assoc($ouruser))
           {
           $img="../users/suppliers/".$users['email']."/materials/".$options['material_name']."/images/".$options['f_image'];
             }
        echo"<img src='". $img."' alt='image' width='100px' >
         </td>
       </tr>
       <tr>
         <td>
          ".$options['material_name']."
         </td>
       </tr>
         <tr>
         <td>
           ".$options['likes']." likes:
         </td>
       </tr>
          ";
           $findsize=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id=$itemid");
           while($sizes=mysqli_fetch_assoc($findsize)){
               $price=$sizes['price_per_unit'];
               $size=$sizes['size'];
               
          echo "<tr><td>".$price." for size ".$size."</td></tr>";
           }
         echo" </table>";

       }
?>

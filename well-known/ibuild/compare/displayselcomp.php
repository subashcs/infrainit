<?php

include $_SERVER['DOCUMENT_ROOT']."/ibuild/system/init.php";

if(!empty($_GET['a']) &&!empty($_GET['b']))
{
    $id1=$_GET['a'];
  $result1=mysqli_query($db,"SELECT * FROM items WHERE id='$id1'");
  
  while($data = mysqli_fetch_assoc($result1))
      {
          
       echo "<table id='hold_resp'><tr><td><table class='show_tab'>";
       
      $prodname=$data['material_name'];
      $category=$data['category'];
      $avamnt=$data['available_amnt'];
      $likes=$data['likes'];
      $sales=$data['sales'];
      $manufacturer=$data['manufacturer'];
      $user=$data['user_id'];
      $extdet=$data['ext_details'];
       $fetchuser=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user'");
       while($userdet=mysqli_fetch_assoc($fetchuser))
       {
         $email=$userdet['email'];

       }
       $imgdir="../users/suppliers/".$email."/materials/".$data['material_name']."/images/".$data['f_image'];
        echo "<tr>
      <th>".$prodname."</th>";
      echo "</tr><tr>";
       echo"  <tr><td align=center><img src='".$imgdir."' class='compare_image' width='200px'></td></tr>";

       $fetchuser=mysqli_query($db,"SELECT * FROM suppliers WHERE u_id='$user'");
       while($userdet=mysqli_fetch_assoc($fetchuser))
       {
         $suppname=$userdet['company_name'];


       }
       echo "<tr>
       <td align=left> <b>Supplier: </b> ".$suppname."</td>";
       echo "</tr><tr>";

     
      echo"<td align=left><b>Likes: </b>".$likes."</td>";
      echo "</tr><tr>";
      echo"<td align=left><b>Sales: </b>".$sales."</td>";
      echo "</tr><tr>";
      echo"<td align=left><b>Available amount: </b>".$avamnt."</td>";
      echo "</tr><tr>";
      
      echo"<td align=left><b>Manufacturer: </b>".$manufacturer."</td>";
      echo "</tr><tr>";
      echo"<td align=left style='color:maroon'><b>Sizes: </b>";
      $quer=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$id1'");
      while($suppl=mysqli_fetch_assoc($quer)){
        $size=$suppl['size'];
        $price=$suppl['price_per_unit'];
        echo "Rs. ".$price ." for size ".$size." ,";
      }
      echo "</td>";
    echo "</tr><tr>";
    
          echo"<td align=left><b>Supply regions: </b>";
          $query=mysqli_query($db,"SELECT * FROM supply_regions WHERE material_id='$id1'");
          while($suppl=mysqli_fetch_assoc($query)){
            echo $suppl['supply_region'].", ";
          }
          echo"</td></tr><tr>";
          
      echo"<td align=left><b>Description: </b>".$extdet."</td>";
          echo "</tr>";
          $cartadd="/ibuild/cart/add_to_cart.php?mat=".$id1;
          echo "<tr><td><a href='".$cartadd."' class='add-to-cart' data-toggle='tooltip' title='click to add to cart'>Add to Cart</a></td></tr>";

        echo "</table></td>";

      }


  $id2=$_GET['b'];

    $result2=mysqli_query($db,"SELECT * FROM items WHERE id='$id2' AND deleted='0'");

    while($data = mysqli_fetch_assoc($result2))
    {
     echo "</td><td><table class='show_tab'>";
    $prodname=$data['material_name'];
    $category=$data['category'];
    $avamnt=$data['available_amnt'];
    $likes=$data['likes'];
    $sales=$data['sales'];
    $manufacturer=$data['manufacturer'];
    $user=$data['user_id'];
    $extdet=$data['ext_details'];
     $fetchuser=mysqli_query($db,"SELECT * FROM usersi WHERE u_id='$user'");
     while($userdet=mysqli_fetch_assoc($fetchuser))
     {
       $email=$userdet['email'];

     }
     $imgdir="../users/suppliers/".$email."/materials/".$data['material_name']."/images/".$data['f_image'];
         echo "<tr>
    <th align=center>".$prodname."</th>";
    echo "</tr><tr>";

     echo"  <tr><td colspan='1'><img src='".$imgdir."' class='compare_image' width='200px'></td></tr>";

     $fetchuser=mysqli_query($db,"SELECT * FROM suppliers WHERE u_id='$user'");
     while($userdet=mysqli_fetch_assoc($fetchuser))
     {
       $suppname=$userdet['company_name'];


     }
     echo "<tr>
     <td align=left> <b>Supplier: </b>".$suppname."</td>";
     echo "</tr><tr>";
    echo"<td align=left><b>Likes: </b>".$likes."</td>";
      echo "</tr><tr>";
      echo"<td align=left><b>Sales: </b>".$sales."</td>";
      echo "</tr><tr>";
    echo"<td align=left><b>Available amount: </b>".$avamnt."</td>";
    echo "</tr><tr>";
    
    echo"<td align=left><b>Manufacturer: </b>".$manufacturer."</td>";
echo "</tr><tr>";
      echo"<td align=left style='color:maroon'><b>Sizes: </b>";
      $quer=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$id2'");
      while($supp=mysqli_fetch_assoc($quer)){
        $size=$supp['size'];
        $price=$supp['price_per_unit'];
        echo "Rs. ".$price." for size ".$size;
      }
      echo "</td>";
      echo "</tr><tr>";
        echo"<td align=left><b>Supply regions: </b>";
        $query=mysqli_query($db,"SELECT * FROM supply_regions WHERE material_id='$id2'");
        while($suppl=mysqli_fetch_assoc($query)){
          echo $suppl['supply_region'];
        }
        echo"</td></tr>";
        
    echo"<td align=left><b>Description: </b>".$extdet."</td>";
        echo "</tr>";
        
          $cartadd="/ibuild/cart/add_to_cart.php?mat=".$id2;
          echo "<tr><td><a href='".$cartadd."' class='add-to-cart' data-toggle='tooltip' title='click to add to cart'>Add to Cart</a></td></tr>";
          
      echo "</table></td></tr></table>";
    }

}

else {
  echo "error";
}
?>

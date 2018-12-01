<?php
include '../system/init.php';
$cartitem=$_POST['cartid'];
echo "<button id='cancel_button_ontop'> <span class='fa fa-times'></span> </button>";
echo "<br/>";

  echo "<form name='order_form' id='order_form'>";
   $item=mysqli_query($db,"SELECT * FROM items WHERE id='$cartitem'");
   while($items=mysqli_fetch_assoc($item)){
         $itemid=$items['id'];
       #code for Sizes
        if($items['category']=="bricks")
       {
       echo "<b>Available sizes (l*b*h)</b>";
     }
      else if($items['category']=="rods")
      {
        echo"<b>Sizes radius,length (r,l)</b>";
      }
      else if($items['categrory']=="blocks")
      {
        echo"<b>Available Sizes (l*b*h)</b>";
      }
      else 
      {
        echo "<b>Available Sizes</b>";
      }

       echo "<br/><br/>";


      $sizes=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$cartitem'");
      while($sizearr=mysqli_fetch_assoc($sizes))
      {
         echo "<input type='radio' id='size_click' name='sizes' value=".$sizearr['size_id'].">". $sizearr['size']. " , </b>";
      }



      echo "<h4>Choose Material Amount:</h4>";



            $findmatcat=mysqli_query($db,"SELECT * FROM items WHERE id='$itemid'");
            while($foundcats=mysqli_fetch_assoc($findmatcat)){
              $foundcategory=$foundcats['category'];

              echo "<input type='hidden' name='price_per' id='price_per_unit_holder'></span>";

            }
            if($foundcategory=="bricks"||$foundcategory=="blocks"){
            echo "<input type='number' name='amount' placeholder='Enter no. of bricks..' id='amount_c'> <b>Pieces</b>";
            }
            else if($foundcategory=="rods"){
             echo "<input type='number' name='length' placeholder='Enter required amount.. ' id='amount_c'> <b>units</b><br/>";

            }
            else if($foundcategory=="cement"){
              echo "<input type='number' name='amount' placeholder='Enter amount of cement required..' id='amount_c'> <b>kgs </b>";

            }
            else if($foundcategory=="gravel"||$foundcategory=="sand"){
              echo "<input type='number' name='amount' placeholder='Enter how much..' id='amount_c'> <b>trippers/ 265cubic feet</b>";
            }
            else if($foundcategory="others"){
                
              echo "<input type='number' name='amount' placeholder='Enter how much..' id='amount_c'> <b>units</b>";
            }
            else{
                 echo "sorry there was an error identifying the product!";
            }
              echo "<br/><b>Total price : Rs <span id='total_price_shower'></span>";
          }
         echo "<br/>";
         echo "Supply Address<br>";
         echo "<button type='button' name='setcuraddress' id='setcuraddress'>Set my current address to supply location</button><br>";
         echo "<button type='button' name='setcusaddress' id='setcustaddress'>Set custom address to supply location</button>";
       echo"<div id='supplylocation'>";
          echo "<input type='text' name='gaunagar' id='gaunagar' placeholder='Gaunpalika/Nagarpalika'>";
         echo"<input type='number' name='oda' id='oda' placeholder='Oda No.'><br>";
         echo"<input type='text'name='street' id='street' placeholder='street address'>";
         echo"<input type='text'name='extraaddr' id='extraaddr' placeholder='Extra Address details'>";
           echo"</div>";
            echo "<h4> Choose payment Option</h4>";

      echo "<select name='payment_type'>
       <option  value='cashondel'>Cash on Delivery</option>
       <option  value='esewa'>esewa</option>
     </select>
     <br>
     <button type='button' id='order_final_button'>Order</button>
   </form>";
?>

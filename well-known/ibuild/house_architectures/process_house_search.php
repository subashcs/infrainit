<?php
include $_SERVER['DOCUMENT_ROOT'].'/ibuild/system/init.php';
$architectures=$_GET['architectures'];

$bedrooms=$_GET['bedrooms'];
$Garagebays=$_GET['garage'];
$floors=$_GET['floors'];
$livingrooms=$_GET['livingrooms'];
$estim_budget=$_GET['budget'];
$query=mysqli_query($db,"SELECT * FROM house_arc WHERE architecture='$architectures' OR bedrooms='$bedrooms' OR Garagebays='$Garagebays' OR floors='$floors' OR livingrooms='$livingrooms' OR estim_budget='$estim_budget'");
if (!$query) {
  echo"errrorr";
  echo $architectures;
  # code...
}
while($houses=mysqli_fetch_assoc($query))
{

 echo "<table id='a_single_house'> <tr>
     <td colspan='2' style='font-family:times;background-color:#f9fafb;font-size:120%;font-weight:bold;'>".$houses['name'].
     "</td>
     <td style='background-color:#f9fafb;'>
       <button name='like'  style='background-color:white;border:none;color:blue;'><i class='fa fa-thumbs-o-up'></i></button>".$houses['likes'].
     "</td>
   </tr>
   <tr>
     <td colspan='3' >
       <img src='../images/houses/".$houses['image']."' alt='image error' style='width:100%;'>
     </td>

   </tr>

   <tr>
     <td>
       bedrooms:<br/>".$houses['bedrooms']."
     </td>
       <td>
         Floors:<br/>
         ".$houses['floors']."
       </td>
       <td>
           livingrooms:<br/>
           ".$houses['livingrooms']."
       </td>
    </tr>
    <tr>
       <td>
           Estimated Budget:<br/>
           ".$houses['estim_budget']."
       </td>
       <td>
           Area (in m):<br/>
           ".$houses['area']."
       </td>
       <td>
           Dimensions(in sq.m):<br/>
           ".$houses['dimension']."
       </td>
    </tr>

 </table>";


 }

 ?>

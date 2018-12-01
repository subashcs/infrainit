
<div id="for_supplier">

  <div id="profile-image-wrap-supp">
    <?php

      $path="../../users/".$rows['role']."/".$rows['email']."/profile_images/".$rows['image'];

     ?>

    <img src="<?php echo $path;?>" alt="User">
    <input type="file" name="file" id="image_file_to"/>
    <button type="button" id="done">done</button> <!--//profile adder-->
    <button type="button" id="edit_image"><i class="fa fa-pencil"></i> Edit image</button>

    <!--add likes shower-->
    <br/>
     <span id="supplier-name"> <?php
           $fetchsupplierdet=mysqli_query($db,"SELECT * FROM suppliers WHERE u_id=$user");
           while($suppdet=mysqli_fetch_assoc($fetchsupplierdet))
           {
             ?>          <button type="button"  id="comp_edit"> <i class="fa fa-pencil"></i> </button>

                        <input type="text" name="comp_name" id="comp_name" value="<?php echo $suppdet['company_name'];?>" required/>
                        <h3 style='text-align:left;' id="company_name_sup"><?php echo $suppdet['company_name'];?></h3>
                        <h4 id="company_des_sup"><?php echo $suppdet['company_des'];?></h4>
                         <br/>
                      <textarea id="comp_des" required> <?php echo $suppdet['company_des'];?>
                      </textarea>
                      <button type="button"  id="done_namedet_edit"> done </button>
           <?php }
     //done?></span>
  </div>
  <div id="details-wrap-supplier" >
    <table>
      <th style="text-align:left;"> Intro </th>
      <th><button name="edit_info" id="edit_info"><i class="fa fa-pencil" aria-hidden="true"></i> </button> </th>

    <tr>
      <td id="proprieter"><b>Proprieter: </b> <?php echo $rows['name'];?></td>
    </tr>
    <tr>
      <td id="citznum">
        <b>Citizenship Number:</b> <?php echo $rows['citizenship_no'];?>
      </td>
      </tr>
      <tr>
        <td style="text-align:center;">

        </td>
      </tr>
      <tr>


      </table>
      <button type="button" id="done_edit">Done</button>
      
       <?php include "targetaccount/location.php";?>
      <?php include '../maps/suppliermap.php';?>

    </div>
    <div id="right_side_supp_profile">
      <ul id="shifter">
        <li id="add_new_mat_but">
          Add New Mat
        </li>
        <li id="orders_button">Orders</li>
      </ul>
      <div id="add_new_mat">
     <form  enctype="multipart/form-data" action="targetaccount/process_sup_mats.php" method="post" >
      <h3>Add New Material</h3>

              <input type="text" name="mat_name" placeholder="Input material name" required/>
              <label for="category">Choose Category</label>
                <select name="category" id="item_category">
                <option value="bricks">Bricks</option>
                <option value="rods">Rods</option>
                <option value="Cement">Cement</option>
                <option value="sand">Sand</option>
                <option value="gravel">Gravel</option>
                <option value="blocks">Blocks</option>
                <option value="others">Others</option>

               </select>
                 <span>
                <input type="text" name="available_amount" placeholder="Available quantity"style="margin-right:-.5%;" required />

                <select name="selectunit" style="margin-left:0.5%;border:0px solid transparent;">
                    <optgroup label="choose unit">
                    <option value="units">units</option>
                    <option value="meter">meter</option>
                    <option value="kg">kg</option>
                    <option value="tons">tons</option>
                    <option value=""></option>

                  </optgroup>
                    </select>
                    <br/>


                  <!-- code for taking sizes as input from supplier-->

                <div id="duplicator_parent">
                          <h4>Enter size of item and price</h4>
                  <div class="duplicatersize0">

                    <input type="text" name="select_sizes[]"  placeholder="Enter Item size" />
                    <input type="number" name="price[]" placeholder="Price per unit (Rupees)" required/>
                  </div>
                </div>

                  <i>you can add sizes later from edit options </i>


                 <!--delete checksizes bricks and checksies bricksone-->


                          


              <br/>
              <span class="multiselect">
                 <div class="selectBox" onclick="showCheckboxes()">
                    <select>
                      <option> Select supply regions </option>
                    </select>
                    <div class="overSelect"></div>
                  </div>
                    <div id="checkboxes">
                      <label for="one">
                        <input type="checkbox" name="districts[]" id="one" value="Taplejung" />Taplejung</label>
                      <label for="two">
                        <input type="checkbox" name="districts[]" id="two" value="Panchthar"/>Panchthar</label>
                      <label for="three">
                        <input type="checkbox" name="districts[]" id="three" value="Illam"/>Illam</label>
                      <label for="four">
                        <input type="checkbox" name="districts[]" id="five" value="Jhapa" />Jhapa</label>
                      <label for="six">
                        <input type="checkbox" name="districts[]" id="six" value="Morang"/>Morang</label>
                      <label for="seven">
                          <input type="checkbox" name="districts[]" id="seven" value="Sunsari" />sunsari</label>
                      <label for="eight">
                          <input type="checkbox" name="districts[]" id="eight" value="Dhankuta"/>Dhankuta</label>
                      <label for="nine">
                          <input type="checkbox" name="districts[]" id="nine" value="Sankhuwasabha"/>Sankhuwasabha</label>
                      <label for="ten">
                          <input type="checkbox" name="districts[]" id="ten" value="Bhojpur"/>Bhojpur</label>
                      <label for="eleven">
                          <input type="checkbox" name="districts[]" id="eleven" value="Terhathum"/>Terhathum</label>
                      <label for="twelve">
                          <input type="checkbox" name="districts[]" id="twelve" value="Okhaldunga" />Okhaldunga</label>
                      <label for="thirteen">
                          <input type="checkbox" name="districts[]" id="thirteen" value="Khotang"/>Khotang</label>
                      <label for="fourteen">
                          <input type="checkbox" name="districts[]" id="fourteen" value="Solukhumbu"/>Solukhumbu</label>
                      <label for="fifteen">
                          <input type="checkbox" name="districts[]" id="fifteen" value="Udayapur"/>Udayapur</label>
                      <label for="sixteen">
                          <input type="checkbox" name="districts[]" id="sixteen" value="Saptari"/>Saptari</label>
                      <label for="seventeen">
                          <input type="checkbox" name="districts[]" id="seventeen" value="Siraha"/>Siraha</label>
                      <label for="eighteen">
                          <input type="checkbox" name="districts[]" id="eighteen" value="Dhanusa" />Dhanusa</label>
                      <label for="nineteen">
                          <input type="checkbox" name="districts[]" id="nineteen" value="Mahottari"/>Mahottari</label>
                      <label for="twenty">
                          <input type="checkbox" name="districts[]" id="twenty" value="Sarlahi"/>Sarlahi</label>
                      <label for="twentyone">
                          <input type="checkbox" name="districts[]" id="twentyone" value="Sindhuli"/>Sindhuli</label>
                      <label for="twentytwo">
                          <input type="checkbox" name="districts[]" id="twentytwo" value="Ramechhap"/>Ramechhap</label>
                      <label for="twentythree">
                          <input type="checkbox" name="districts[]" id="twentythree" value="Dolkha"/>Dolkha</label>
                      <label for="twentyfour">
                          <input type="checkbox" name="districts[]" id="twentyfour" value="Sindhupalchok"/>Sindhupalchok</label>
                      <label for="twentyfive">
                          <input type="checkbox" name="districts[]" id="twentyfive" value="Kavreplanchauk"/>Kavreplanchauk</label>
                      <label for="twentysix">
                          <input type="checkbox" name="districts[]" id="twentysix" value="Lalitpur"/>Lalitpur</label>
                      <label for="twentyseven">
                          <input type="checkbox" name="districts[]" id="twentyseven" value="Bhaktapur"/>Bhaktapur</label>
                      <label for="twentyeight">
                          <input type="checkbox" name="districts[]" id="twentyeight" value="Kathmandu" />Kathmandu</label>
                      <label for="twentynine">
                          <input type="checkbox" name="districts[]" id="twentynine" value="Nuwakot"/>Nuwakot</label>
                      <label for="thirty">
                          <input type="checkbox" name="districts[]" id="thirty" value="Rasuwa" />Rasuwa</label>

                      <label for="thirtyone">
                          <input type="checkbox" name="districts[]" id="thirtyone" value="Dhading" />Dhading</label>
                      <label for="thirtytwo">
                          <input type="checkbox" name="districts[]" id="thirtytwo" value="Makwanpur"/>Makwanpur</label>
                      <label for="thirtythree">
                          <input type="checkbox" name="districts[]" id="thirtythree" value="Rautahat"/>Rautahat</label>
                      <label for="thirtyfour">
                          <input type="checkbox" name="districts[]" id="thirtyfour" value="Bara"/>Bara</label>
                      <label for="thirtyfive">
                          <input type="checkbox" name="districts[]" id="thirtyfive" value="Parsa"/>Parsa</label>
                      <label for="thirtysix">
                          <input type="checkbox" name="districts[]" id="thirtysix" value="Chitwan"/>Chitwan</label>
                      <label for="thirtyseven">
                          <input type="checkbox" name="districts[]" id="thirtyseven" value="Gorkha"/>Gorkha</label>
                      <label for="thirtyeight">
                          <input type="checkbox" name="districts[]" id="thirtyeight" value="Lamjung"/>Lamjung</label>
                      <label for="thirtynine">
                          <input type="checkbox" name="districts[]" id="thirtynine" value="Tanahun"/>Tanahun</label>
                      <label for="forty">
                          <input type="checkbox" name="districts[]" id="forty" value="Syangja"/>Syangja</label>
                      <label for="fortyone">
                          <input type="checkbox" name="districts[]" id="fortyone" value="Kaski" />Kaski</label>
                      <label for="fortytwo">
                          <input type="checkbox" name="districts[]" id="fortytwo" value="Manang"/>Manang</label>
                      <label for="fortythree">
                          <input type="checkbox" name="districts[]" id="fortythree" value="Mustang"/>Mustang</label>
                      <label for="fortyfour">
                          <input type="checkbox" name="districts[]" id="fortyfour"  value="Parwat"/>Parwat</label>
                      <label for="fortyfive">
                          <input type="checkbox" name="districts[]" id="fortyfive" value="Myagdi"/>Myagdi</label>
                      <label for="fortysix">
                          <input type="checkbox" name="districts[]" id="fortysix" value="Baglung"/>Baglung</label>

                     </div>
                     <script type="text/javascript">
                         var expanded = false;

                          function showCheckboxes() {
                          var checkboxes = document.getElementById("checkboxes");
                          if (!expanded) {
                          checkboxes.style.display = "block";
                          expanded = true;
                          } else {
                          checkboxes.style.display = "none";
                          expanded = false;
                          }
                          }
                     </script>
                   </span>

                    <input type="text" name="manufacturer" placeholder="Manufacturer's Name"/>
                    <textarea name="ext_details" cols="30" >Type your Material Details
                    </textarea>
                  <input type="file" name="file">
                    <input type="submit" name="submit" value="Submit"/>

        <?php if(isset($_GET['errf']))
        {
          echo $_GET['errf'];
        }?>
      </form>
    </div>

      <div id="orders_shower">
       <?php include 'orders_show.php';?>
      </div>
  </div>
      <div id="see_my_materials">
        <h3 style="display:block;margin:1% -.5% 0% -1%;color:#e3ead3;padding:1%;background-color:#172234; ">Materials</h3>

        <div id="wrap_only_materials">
          <?php
          $query1=mysqli_query($db,"SELECT * FROM items WHERE user_id=$user AND deleted='0'");
            if(mysqli_num_rows($query1)==0)
            {
              echo "<center>No products added yet</center>";
            }
             while($products=mysqli_fetch_assoc($query1))
            {

                ?><div class="a_single_item" draggable="true" ondragstart="drag(event)" id="a_single_item<?php echo $products['id'];?>"  onmouseover="$(this).animate({'margin-top':'-2px'});$(this).animate({'margin-top':'2px'});">
                     <p class="ide_p_id" style="display:none"><?php echo $products['id'];?></p>
                     <span style="display:block;font-weight:bold;">
                     <span class="count" style="float:left;" ><?php echo $products['sales'];?> <i> sales</i></span>

                       <span class="count" style="float:right;"><?php echo $products['likes'];?> <i> likes</i></span>
                     </span>    <?php
                             $productid=$products['id'];
                              $user_idfetched=$products['user_id'];
                              $findfile=mysqli_query($db,"SELECT email FROM usersi WHERE u_id='$user_idfetched'");
                             $findsupp=mysqli_query($db,"SELECT * FROM suppliers WHERE u_id='$user_idfetched'");
                              while($findsupparr=mysqli_fetch_assoc($findsupp))
                              {
                                $supplier=$findsupparr['company_name'];

                              }
                              while($findfilearr=mysqli_fetch_assoc($findfile))
                              {
                                $email=$findfilearr['email'];
                              }
                          $directory="/ibuild/users/suppliers/";
                          $directory.=$email;
                          $directory.="/materials/".$products['material_name']."/images/".$products['f_image'];

                          if(!empty($directory))
                          {
                        ?>
                         <img src="<?php echo $directory;?>" class="mat_img">
                         <?php
                       }
                         else {
                           echo"<p>sorry no image in directory </p>";
                         }
                          ?>


                     <table>
                     <tr>
                       <td class="indicator"> <?php  echo $products['material_name'];?>

                       </td>
                     </tr>
                     <tr>
                       <td class="indicator"><?php  echo $products['available_amnt'];?>

                       <i> available</i>  </td>
                     </tr>
                     <tr>
                       <td class="indicator"><span class="price">
                         <?php
                           $matid=$products['id'];
                           $sizpris=mysqli_query($db,"SELECT * FROM items_sizes WHERE material_id='$matid'");
                           if(mysqli_num_rows($sizpris)==0){
                             echo"Not specified!";
                           }
                            while($sizprices=mysqli_fetch_assoc($sizpris))
                              {
                                echo " Per Unit Rs:".$sizprices['price_per_unit'];
                                if(!empty($sizprices['size'])){
                              echo " for size ".$sizprices['size'].", ";
                                   }
                           }?></span>
                       </td>
                     </tr>
                     <tr>
                       <td class="indicator"> Supply Regions <br/>
                         <span class="price">
                     <?php

                       $sups=mysqli_query($db,"SELECT * FROM supply_regions WHERE material_id='$matid'");
                       if(mysqli_num_rows($sups)==0){
                         echo"Not specified!";
                       }
                        while($suppls=mysqli_fetch_assoc($sups))
                        {
                          echo $suppls['supply_region'].", ";
                       }?>
                     </span>
                     </td>
                     </tr>
                     <tr id="detail">
                       <td colspan="3">
                         <a href="<?php echo "/ibuild/blocks/mat_details/?mat=".$matid;?>">Edit Details
                         </a>
                       </td>

                     </tr>

                   </table>
                 </div>

                <?php


                 }

//add your material recycle bin
                  ?>
       </div>
         <?php include "suppliers_bin.php";?>
         <?php include "myquestionans.php"?>

      </div>


</div>

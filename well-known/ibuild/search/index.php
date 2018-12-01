<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <head>

   <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />

   <link rel="stylesheet" href="../css/styles.css">
   <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="../scripts/dragtocart.js" type="text/javascript"></script>
   <script src="../scripts/notify.js" type="text/javascript"></script>
   <script src="../scripts/search.js" type="text/javascript"></script>


  <title>Searches| <?php if(!empty($_GET['search'])){ echo $_GET['search']; }?></title>
   <script type="text/javascript">

     function allowDrop(ev) {
       ev.preventDefault();
     }

     function drag(ev) {
       ev.dataTransfer.setData("text", ev.target.id);
     }

    function drop(ev, el) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
        el.appendChild(document.getElementById(data));
      document.getElementById('show_info_cart_text').style.display="";
      var id=document.getElementById(data).getElementsByClassName('ide_p_id');
      var idcurrent=id[id.length-1].innerHTML;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
      // Typical action to be performed when the document is ready:

        if(xhttp.responseText=="Successfully Added");
          {
            el.removeChild(document.getElementById(data));
            window.location.href="";
          }
            alert(xhttp.responseText);
         }
        };
         xhttp.open("GET", "../blocks/main/add_to_cart.php?mat="+idcurrent, true);
         xhttp.send();

         //end function
       }

   </script>


</head>
  <body >
      
   <?php
   
require "../blocks/main/encryptor.php";
include '../blocks/header/header.php'; ?>
   <dl id="searches_result_options">
     <dt>Search Results</dt>
       <dd>
       <li id="show_searched_materials_button">Materials</li>
       <li id="show_searched_customers_button">Customers</li>
       <li id="show_searched_suppliers_button">Suppliers</li>
       <li id="show_searched_architects_button">Architects</li>
     </dd>

   </dl>
   <div id="materials">
     <?php

     if(!empty($_GET['search']))
     {
     $search_word=mysqli_real_escape_string($db,$_GET['search']);
     }
     else {
       $search_word="";
     }

      include 'searchedmat.php';
    include '../blocks/rightbar/addtocartdirect.php';
    ?>
   </div>
   <div id="customers">
      <!--this will show all customers-->
      <?php include 'show_customers_searched.php';?>
   </div>
   <div id="suppliers">
      <!--this will show searched suppliers-->
      
      <?php include 'show_suppliers_searched.php';?>
      
   </div>
   
   <div id="architects">
      <!--this will show searched architects-->
      
      <?php include 'show_architects_searched.php';?>
      
   </div>
   
   <?php include '../blocks/footer/footer.php';?>

  </body>

</html>

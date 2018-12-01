<!Doctype HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Tope selling infrastructure construction materials in Nepal and all over the world find and buy.">
 <head>
   <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
   <link rel="stylesheet" href="../css/styles.css">
   <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="../scripts/cartdisplay.js" type="text/javascript"> </script>

   <script src="../scripts/notify.js" type="text/javascript"></script>
  <title>Infrainit| top selling</title>
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
     var loc="../cart/add_to_cart.php?mat="+idcurrent;
     location.replace(loc);

        //end function
      }

  </script>
 </head>
  <body id="top_selling_page">
    <?php include "../blocks/header/header.php";?>

<div id="top_selling_mat_wrap">
<center>
  <span id="top_sell_title">Top Selling <sub>materials</sub> </span>
</center>
  <?php include 'top_selling_mat.php';?>
<?php include '../blocks/rightbar/addtocartdirect.php';?>
  </div>

<?php include "../blocks/footer/footer.php";?>

</body>
</html>

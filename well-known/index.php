<!Doctype HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Infrainit is a online portal that helps user to shop construction material view infrastructure architectures and consult expertise about infrastructural problems">
    <meta name="keywords" content="Infrastructure, Resources ,Infrainit ,bricks, blocks, rods, gravel, cement, Nepal, experts, house architectures">
   <!--  Essential META Tags -->
    
    <meta property="og:title" content="infrainit - select, collect, build and share">
    <meta property="og:description" content="View designs ,Shop for Constrution Materials, Build your infrastructure and Share your experiance. ">
    <meta property="og:image" content="https://www.infrainit.com/ibuild/feature.jpg">
    <meta property="og:url" content="https://www.infrainit.com/index.php">
    <meta name="twitter:card" content="summary_large_image">
    
    
    <!--  Non-Essential, But Recommended -->
    
    <meta property="og:site_name" content="infrainit">
    <meta name="twitter:image:alt" content="infrainit-Analyze collect build and share">
    
    
    <!--  Non-Essential, But Required for Analytics 
    
    <meta property="fb:app_id" content="your_app_id" />
    <meta name="twitter:site" content="@website-username">
    -->
    
   <link href="ibuild/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
   <link rel="stylesheet" href="ibuild/css/styles.css">
 <script src="ibuild/scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="ibuild/scripts/notify.js" type="text/javascript"></script>

   <script src="ibuild/scripts/cartdisplay.js" type="text/javascript" > </script>

  <title>Infrainit |Home</title>
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
      var loc="ibuild/cart/add_to_cart.php?mat="+idcurrent;
      location.replace(loc);

         //end function
       }

   </script>


</head>
  <body id="inframain">
   <?php include 'ibuild/blocks/header/header.php'; ?>
   <?php include 'ibuild/blocks/main/site_featured.php';?>
   <?php include 'ibuild/blocks/main/categorized_mat.php';?>
   <?php include 'ibuild/blocks/rightbar/addtocartdirect.php';?>
   <?php include 'ibuild/blocks/main/articleforindex.html';?>
   <?php include "ibuild/blocks/main/suppliers.php";?>
   <?php include "ibuild/blocks/footer/footer.php";?>

  </body>

</html>

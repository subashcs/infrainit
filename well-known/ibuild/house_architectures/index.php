<!Doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="view house architectures in Nepal and allocate materials need to build the architecture">
<meta name="keywords" content="house architectures, nepal, architectures in nepal">
<head>
  <title>
    House Architechtures
  </title>
  <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css"; rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
  <link rel="stylesheet" href="../css/styles.css">
  <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script  src="../scripts/searchhouse.js" type="text/javascript"></script>
  <script src="../scripts/liker.js" type="text/javascript"></script>
  <script src="../scripts/notify.js" type="text/javascript"></script>
</head>
  <body id="house_architectures">
    <!--header code-->
    <?php include '../blocks/header/header.php';?>
    


    <h2>Our Architectures</h2>
     <div id="wrap_house">
        <?php  $name_vid = $name_type = $name_model = "(nothing)";?>
    <form id="left_sidebar"  method="get" action="">

       <h3>SEARCH CRITERIA</h3>
     House Architecture:
    <select name="architectures">
            <option value="">All</option>
            <option value = "Nepali Traditional House" <?php if($name_vid == 'Nepali Traditional House') echo 'selected="selected"'; ?>>Nepali Traditional House</option>
            <option value="Log Home">Log Home</option>
            
            <option value="Cape Cod">Cape Cod</option>
            
            <option value="Art Deco">Art Deco</option>
            
            <option value="Crafts Man">Craftsman</option>
            
            <option value="Log Home">Log Home</option>
            
            <option value="Traditional Newari">Traditional Newari</option>
            
            <option value="Contemporary">Contemporary</option>
            
            <option value="Colonial">Colonial</option>
            
            <option value="Mid-Century Modern">Mid-Century Modern</option>
            
            <option value="French Provincial">French Provincial</option>
            
            <option value="Greek Revival">Greek Revival</option>
            
            <option value="Italinate">Italinate</option>
            
            <option value="Mediterranean">Mediterranean</option>
            
            <option value="Neoclassical">Neoclassical</option>
            
            <option value="Town House">Town House</option>
            
            <option value="Cottage">Cottage</option>
            
            <option value="Farmhouse">Farmhouse</option>
            
            <option value="Others">Others</option>
            
            
            <option value="Modern Concrete Building">Modern Concrete Building</option>
    </select>
         <br/>

       bedrooms:
    <ul id="check_enclose">
      <li>
      <input type="radio" id="c1" name="bedrooms" value="1" checked/><br/>
     <label for="c2">1</label>
      </li>
      <li>
      <input type="radio" id="c2" name="bedrooms" value="2"/><br/>
     <label for="c2">2</label>
      </li>
      <li>
      <input type="radio" id="c3" name="bedrooms" value="3"/><br/>
     <label for="c3">3</label>
      </li>
      <li>
      <input type="radio" id="c4" name="bedrooms" value="4"/><br/>
     <label for="c4">4</label>
      </li>
      <li>
      <input type="radio" id="c5" name="bedrooms" value="5"/><br/>
     <label for="c5">5+</label>
      </li>
    </ul>
       Garage bays:
       <ul id="check_enclose">
         <li>
         <input type="radio" id="c1" name="garage" value="1" checked/><br/>
        <label for="c2">1</label>
         </li>
         <li>
         <input type="radio" id="c2" name="garage" value="2"/><br/>
        <label for="c2">2</label>
         </li>
         <li>
         <input type="radio" id="c3" name="garage" value="3"/><br/>
        <label for="c3">3</label>
         </li>
         <li>
         <input type="radio" id="c4" name="garage" value="4"/><br/>
        <label for="c4">4</label>
         </li>
         <li>
         <input type="radio" id="c5" name="garage" value="5"/><br/>
        <label for="c5">5+</label>
         </li>
       </ul>
       Floors:
       <ul id="check_enclose">
         <li>
         <input type="radio" id="c1" name="floors" value="1" checked/><br/>
        <label for="c2">1</label>
         </li>
         <li>
         <input type="radio" id="c2" name="floors" value="2"/><br/>
        <label for="c2">2</label>
         </li>
         <li>
         <input type="radio" id="c3" name="floors" value="3"/><br/>
        <label for="c3">3</label>
         </li>
         <li>
         <input type="radio" id="c4" name="floors" value="4"/><br/>
        <label for="c4">4</label>
         </li>
         <li>
         <input type="radio" id="c5" name="floors" value="5"/><br/>
        <label for="c5">5+</label>
         </li>
       </ul>
       Living Rooms:
       <ul id="check_enclose">
         <li>
         <input type="radio" id="c1" name="livingrooms" value="1" checked/><br/>
        <label for="c2">1</label>
         </li>
         <li>
         <input type="radio" id="c2" name="livingrooms" value="2"/><br/>
        <label for="c2">2</label>
         </li>
         <li>
         <input type="radio" id="c3" name="livingrooms" value="3"/><br/>
        <label for="c3">3</label>
         </li>
         <li>
         <input type="radio" id="c4" name="livingrooms" value="4"/><br/>
        <label for="c4">4</label>
         </li>
         <li>
         <input type="radio" id="c5" name="livingrooms" value="5"/><br/>
        <label for="c5">5+</label>
         </li>
       </ul>
       Estimate Budget (in lakhs):
       <ul id="check_enclose">
         <li>
          <input type="radio" id="c1" name="budget" value="5" checked/><br/>
          <label for="c2">up to 5</label>
          </li>
          <li>
          <input type="radio" id="c2" name="budget" value="10"/><br/>
          <label for="c2">up to 10</label>
          </li>
          <li>
          <input type="radio" id="c3" name="budget" value="20"/><br/>
          <label for="c3">up to 20</label>
          </li>
          <li>
          <input type="radio" id="c4" name="budget" value="100"/><br/>
          <label for="c4">up to 100</label>
         </li>
          <li>
          <input type="radio" id="c5" name="budget" value="150"/><br/>
          <label for="c5">100+</label>
          </li>
        </ul>
         <button  type="button" id="searchhousebut">Submit</button>
    </form>
    <div id="middle_part">
      <?php include 'show_architechtures.php';?>
    </div>
</div>
<!-- footer code copied-->
<?php include '../blocks/footer/footer.php';?>
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
    
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Infrainit is a online portal that helps user to shop construction material view infrastructure architectures and consult expertise about infrastructural problems">
    
    <meta name="keywords" content="Infrastructure, Resources ,Infrainit ,bricks, blocks, rods, gravel, cement, Nepal, experts, house architectures">
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
   <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/styles.css">
 <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="scripts/notify.js" type="text/javascript"></script>
 <title>Contact Us</title>


<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea,input[type=email] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

/* Style the container/contact section */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
    float: left;
    width: 50%;
    margin-top: 6px;
    padding: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>

<?php include 'blocks/header/header.php';?>

<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for service visit, or leave us a message:</p>
  </div>
  <?php if(isset($_GET['succ'])){
            ?>
     <span style="color:green;display:block;text-align:center;"><?php echo $_GET['succ'];?></span>
     <?php
      
        }
     if(isset($_GET['err'])){
         
     ?>
     <span style="color:maroon;display:block;text-align:center;"><?php echo $_GET['err'];?></span>
     <?php }
      ?>
  <div class="row">
    <div class="column">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.4961416559045!2d85.32045721444408!3d27.70196373233664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19227c5d6f8d%3A0x109ada96bb834f16!2sInfrainit!5e0!3m2!1sen!2snp!4v1525854093537" frameborder="0" id="map" style="width:100%;height:500px" style="border:0" allowfullscreen></iframe>
      </div>
    
    <div class="column">
      <form action="blocks/main/contact_process.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Your last name..">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email address..">
       
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>
</div>


<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<?php include 'blocks/footer/footer.php';?>
</body>
</html>

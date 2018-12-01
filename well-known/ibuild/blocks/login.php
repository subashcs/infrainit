<!Doctype HTML>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta name="description" content="Get started interacting on Infrainit by logging in or sign up">

      <link rel="stylesheet" href="../intl-tel-input-12.1.0/build/css/intlTelInput.css">
    <link rel="shortcut icon" type="image/png" href="https://www.infrainit.com/ibuild/images/logo.png" />
      <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/styles.css">
      <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
      <script src="../scripts/login.js" type="text/javascript"></script>
      <script src="../scripts/emailvalid.js" type="text/javascript"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
  <title>
   Infrainit | Login
  </title>
</head>
<body style="text-align:center;align-items:center;">
<center>

   <ul id="login_title">
       <li id="logo">
     <a href="/ibuild/">
      <img class="logo" src= "/ibuild/images/logo.png" alt="infrainit" > </a>
    </li>
    <li id="titleshow">
     Login or Sign Up
     </li>
   </ul>
   <!--use javascript here-->
   <span id="errormessage"><?php if(isset($_GET['err'])){echo $_GET['err'];}?></span>
    <script>
    //this script should clear error message after certain time if error message is not empty
    var a=document.getElementById("errormessage").textContent;
    if(a)
    {
      setTimeout(clearmess,4000);
    }
    function clearmess(){
      location.replace('login.php');
    }
    </script>
   <div id="log_box_wrap">
      <ul>
        <li id="login_button">Login</li>
        <li id="signup_button">Signup</li>
      </ul>
     <form action="login/logonly.php" method="post" onsubmit="return validateForm()" name="login" id="log_box1">

       <input type="email" name="email" id="email" placeholder="Type your email">
          <br/>
       <label id="label1" for="email"> </label>
        <label id="email_status"></label>

       <br/>
       <input type="password" name="password" placeholder="Enter pass-phrase">
       <a href="reconfirm.php" style="float:left;margin-left:6%;color:#4a90e2;font-style:italic;">Reconfirm my account</a>
       <button type="submit" name="submit" class="continue">Continue</button>
       <br/><label id="label2"></label>
    </form>
    <script type="text/javascript">
    function validateForm()
    {
    var a=document.forms["login"]["email"].value;
    var b=document.forms["login"]["password"].value;
    if (a==null || a=="",b==null || b=="")
      {
      alert("Please Fill All Required Field");
      return false;
      }
    }
    </script>
     <form action="login/signup.php" method="post" name="signupf" onsubmit="return validate()" id="log_box3">
        <h4>Choose user type</h4>
        <select id="user_type" name="user_type">
        <option selected="selected" value="customer">Customer</option>
        <option value="supplier">Supplier</option>
        <option value="architect">Architecture</option>
      </select>
       <h3 class="supplier_cont">Account owner name</h3>
       <input type="text" name="firstname"class="name" placeholder="Enter first name" required />
       <input type="text" name="lastname" class="name" placeholder="Enter last name" required />
       
         <input type="hidden" name="phone" id="phonesend" value="" required>

       <input type="tel" name="phoneshow" id="phone" required>
        <span id="errorphone"></span>
        <script src="../intl-tel-input-12.1.0/build/js/intlTelInput.js"></script>
        <script>

        $("#phone").focusout(function(){

        var isValid = $("#phone").intlTelInput("isValidNumber");

        if(isValid){
          var intlNumber = $("#phone").intlTelInput("getNumber");

        }
        else{
          var error = $("#phone").intlTelInput("getValidationError");
             $("#phone").val("");
            document.getElementById('errorphone').innerHTML="error! type proper number";
         }

          });

          $("#phone").focusin(function(){
            document.getElementById('errorphone').innerHTML="";

          });
                $("#phone").intlTelInput({
          initialCountry: "auto",
          geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
            });
          },
          utilsScript: "../intl-tel-input-12.1.0/build/js/utils.js" // just for formatting/placeholders etc
        });

        </script>
        </br>
       <input type="text" name="company_name" placeholder="company name"/>
       <input type="text" name="pan_no" placeholder="Enter PAN No."/>
        <h3 id="estd">Company Established Date:</h3>
       <input type="date" name="cdate"/>
       <h3 id="dob" style="display:inline-block;">Date of Birth:</h3>
       <input type="date" name="udate" >
       <input type="text" name="description" placeholder="company description"/>
       <input type="email" name="email" id="email2" placeholder="Type your email" required />
       <br/><label id="label3"> </label>
       <p id="email_stat"></p>
       <input type="password" name="password" placeholder="Enter pass-phrase" required />
        <input type="password" name="confpass" placeholder="Re-enter Pass-phrase"required /><br/>
          <h3 id="estd">Permanent Address</h3>
        <input type="text" name="district" placeholder="Enter District" required>
        <input type="text" name="metropolitan" placeholder="Enter metropolitan (Gaunpalika/Nagarpalika)" required>
        <input type="number" name="oda" placeholder="Enter oda number" required>
        <input type="text" name="street" placeholder="Enter street address" required>
        <br/>
         <h3 class="supplier_cont">Payment option</h3>
        <input type="checkbox" name="payment[]" value="cash on delivery" checked required>Cash on Delivery
        
        <input type="checkbox" name="payment[]" value="esewa" id="esewa">E-sewa
       <br/>
       <!--use javascript to detect the option above selecter and
       display accordingly the following-->
        
        <input type="text" name="e_sewa"id="esewa_name" placeholder="Enter e-sewa username">
  <br/>
       <div class="g-recaptcha" data-sitekey="6LcgGjgUAAAAAOYLkqF6BKQQt1NQuIShMhsPUdN9"></div>


        <SPAN>
        <?php IF(ISSET($RECAPTCHAERRORS[0]))
           ECHO $RECAPTCHAERRORS[0];?>
                   </SPAN>

        <input type="checkbox" value="1" name="agree" required >i agree to <a href="#" style="color:blue;" >terms and conditions</a> of the site
         <br/>
         <span id="errsign"><?php if(isset($_GET['errs'])){echo $_GET['errs'];}?></span>
         <button type="submit" name="submit"  class="continue">Continue</button>
     </form>

     <br/>

   </div>
</center>
   <div id="forgot" style="position:sticky;">
     <a href="setting/forgotpass.php">Forgot your Password?</a></div>

  <ul id="bottom" style="position:sticky;width:auto;">
    <li style="margin-right:5%;font-weight:bold;">Copyright &copy 2018 Infrainit .All Rights Reserved</li>
    <li id="co_last"><a href="main/privacy_policy.htm"><h3>Privacy<br/>
        Policy</h3></a>
    </li>
    <li id="co_last"><a href="refund_policy.html"><h3>Refund<br/> Policy</h3></a></li>
    <li><b>Payment
       methods:</b>
    </li>
    <li><img src="/ibuild/images/esewa.png" akt="esewa" width="90px"></li>
    <li><img src="/ibuild/images/cashondelivery.png" akt="esewa" width="95px"></li>
  </ul>

</body>
</html>

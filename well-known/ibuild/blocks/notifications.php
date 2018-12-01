<!DOCTYPE html>
<html>
<head>
 <title>Notifications</title>
 <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/styles.css">
 <script src="../scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script src="../scripts/notify.js" type="text/javascript"></script>

</head>

<body>
<?php include 'header/header.php'?>
<h2>Notifications</h2>

<div id="notices_shower"></div>

<script>

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        erows = JSON.parse(this.responseText);

          for(var i=0; i< erows.length;i++){
           var a= document.createElement("a");
           a.setAttribute("href",erows[i]['dest_url']);
           a.setAttribute("id","a_notice");
           a.setAttribute("target","_blank");
           a.innerHTML=erows[i]['topic'];

            document.getElementById("notices_shower").appendChild(a);
          }
    }
};
xmlhttp.open("GET", "main/fetch_notices.php", true);
xmlhttp.send();

</script>
<h4>Sorry if the service is not functioning well.we are working for it.Thank you</h4>

<?php include 'footer/footer.php'?>
</body>
</html>

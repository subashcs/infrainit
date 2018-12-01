

    <h3>Company Location</h3>
    <div id="map"></div>
    <script>
    var lati=28;
    var longi=74;

    function initMap() {
        var val="<?php if(isset($_GET['u_id'])){echo $_GET['u_id'];}?>";
        var data="val="+val;
      var jsonIssues = {};
      $.ajax({
          type:"post",
          url: "targetaccount/getlocationdata.json.php",
          async: false,
          data:data,
          dataType: 'json',
          success: function(data) {
              jsonIssues = data;
          }
      });
      lati=Number(jsonIssues[0]['latitude']);
      longi=Number(jsonIssues[0]['longitude']);

      // jso

        var uluru = {lat: lati, lng: longi};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8UDDr0ICQNx5C16h2KXlix4NKuDbSrwg&callback=initMap">
    </script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    
    <script type="text/javascript">
        var currenttime = '<?php echo date('F j, Y H:i:s'); ?>';
        var d=new Date();

        function displaytime()
        {
            d.setSeconds(d.getSeconds()+1);
            var s=d.getSeconds();
            var m=d.getMinutes();
            var h=d.getHours();
            var day=d.getDay();
            var date=d.getDate();
            var month=d.getMonth();
            var year=d.getFullYear();
            var days=new Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์");
            var months=new Array('มกราคา','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
            var date;
            var time;
            if (s<10) {s="0" + s}
            if (m<10) {m="0" + m}
            //if (h>12) {h-=12;am_pm = "pm"}
            //else {am_pm="am"}
            if (h<10) {h="0" + h}
            date = "วัน" + days[day] + " ที่ " + date + " " + months[month] + " " + year;
            time = "เวลา " + h + ":" + m + ":" + s;
            document.getElementById("clock").innerHTML = date + '<br />' + time;
            setTimeout(displaytime,1000);
        }

        window.onload = function()
        {
            displaytime();
        }
    </script>
	<title>Check In Time&Locatio</title>
</head>

<body>
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="container">
          <div class="row">
            <div class="col col-sm-12">
              <h3  class="jumbotron" align="center">Check In Time&Location - bete</h3>
            </div>
          </div>

          <div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
            <strong>Note:</strong>The geolocation property is not supported in IE8 and earlier versions.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <!-- Horizontal Form -->
          <div class="container">
            <div class="row">
              <div class="col-sm-4"></div>
              <div class="col col-sm-4">                

                <div>
                  <button type="button" class="btn btn-primary" onclick="showPosition();">CHECK IN</button>
                </div>
                <p></p>
                <!-- on Page Date&Time -->
                <div class="text-center">
                  <h5 class="heading text-info">                  
                    <div id="clock">กำลังโหลด...</div>                                
                  </h5>
                </div> 

                <!-- onClick.Action embedded in <div> -->
                <div id="embedMap" style="width: 325px; height: 280px;">
                <!-- Google map will be embedded here -->
                </div>
                <!-------------------------------------->             
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="row">              
                <div>
                </div>                     
            </div>            
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>

      <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!-- Script Google map -->
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- Script Geolocation -->
      
    <script>
        function showPosition() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showMap, showError);
          } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
          }
        } 
        // Define callback function for successful attempt
        function showMap(position) {
        // Get location data
          lat = position.coords.latitude;
          long = position.coords.longitude;

          var latlong = new google.maps.LatLng(lat, long);

          var myOptions = {
            center: latlong,
            zoom: 16,
            mapTypeControl: true,
            navigationControlOptions: {
                style:google.maps.NavigationControlStyle.SMALL
            }
          } 

          var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
          var marker = new google.maps.Marker({ position:latlong, map:map, title:"You are here!" });
        } 
        // Define callback function for failed attempt
        function showError(error) {
          if(error.code == 1) {
            result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
          } else if(error.code == 2) {
            result.innerHTML = "The network is down or the positioning service can't be reached.";
          } else if(error.code == 3) {
            result.innerHTML = "The attempt timed out before it could get the location data.";
          } else {
            result.innerHTML = "Geolocation failed due to unknown error.";
          }
        }
    </script>


</body>
</html>

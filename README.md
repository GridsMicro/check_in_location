# check in time&location

php script เอาไว้ใน tag head ใช้สำหรับดึงค่า วันที่/เวลา จาก Server มาแสดงผล

```php
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
```
นี่เป็นส่วนของ content, การแสดงผล และ button นำ code นี้ไปแทรกใน body หรือใน container

```html
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
          <div class="row">
            <div class="col col-sm-12">
              <h3  class="jumbotron" align="center">DH Check In Location - bete</h3>
            </div>
          </div>

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
```                      
ส่วนของการแสดงผลวันที่/เวลา

```html
                <p></p>
                <!-- on Page Date&Time -->
                <div class="text-center">
                  <h5 class="heading text-info">                  
                    <div id="clock">กำลังโหลด...</div>                                
                  </h5>
                </div> 
```
ส่วนของการแสดงผลแผนที่

```html
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
```
นี่เป็น script สำหรับการตรจสอบ Location ในส่วนนี้ให้นำ code ไปแทรกด้านล่าง ก่อนปิด body

```javascript
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
```

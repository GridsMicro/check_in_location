# check in location

นำ code นี้ไปแทรกใน body หรือใน container
```html
        <div class="content-wrapper">
          <div class="container">
            <div class="row">
              <div class="col col-sm-12">
                <h3  class="jumbotron" align="center">DH Check In Location - bete</h3>
              </div>
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

                  <p><strong>Note:</strong> The geolocation property is not supported in IE8 and earlier versions.</p> 

                  <p></p>
                  <!-- onClick.Action embedded in <div> -->
                  <div id="embedMap" style="width: 360px; height: 300px;">
                  <!-- Google map will be embedded here -->
                  </div>              

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
ในส่วนนี้ให้นำ code ไปแทรกด้านล่าง ก่อนปิด body

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

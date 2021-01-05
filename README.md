# check in location

  ```javascript
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>DH.Workflow | Dashboard</title>

      <!-- Google Font: Source Sans Pro -->
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
      />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
      <!-- Ionicons -->
      <link
        rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
      />
      <!-- Tempusdominus Bootstrap 4 -->
      <link
        rel="stylesheet"
        href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
      />
      <!-- iCheck -->
      <link
        rel="stylesheet"
        href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"
      />
      <!-- JQVMap -->
      <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css" />
      <!-- overlayScrollbars -->
      <link
        rel="stylesheet"
        href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
      />
      <!-- Daterange picker -->
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
      <!-- summernote -->
      <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">

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

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge("uibutton", $.ui.button);
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- DH.Workflow App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- DH.Workflow for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- DH.Workflow dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>


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

  ```

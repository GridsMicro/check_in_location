<?php
$condb= mysqli_connect("localhost","microtronic","Grids@Dev","app_microdev") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');
?>
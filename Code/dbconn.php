 <?php
//enter the credentials according to your databse
  $databaseHost = "www.trafficounts.co.in"; 

  $databaseUser = "tusharco_12";

  $databasePassword = "Epecoin@1234";

  $databaseName = "tusharco_epe";
// Create connection
  $con=mysqli_connect($databaseHost ,$databaseUser ,$databasePassword )or die ('Connection Error');
// Check connection
  mysqli_select_db($con,"tusharco_epe") or die ('Database Error');  

  ?>
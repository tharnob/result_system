<?php

  $host_name = "localhost";
  $name = "root";
  $pass = "";
  $db = "result_system";

  $con = mysqli_connect($host_name, $name, $pass) or die("Database error!");
  $dbcon=mysqli_select_db($con,$db);



 ?>

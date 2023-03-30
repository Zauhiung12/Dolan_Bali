<?php
  session_start();
  // error_reporting(0);
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "dolan_bali";

  $conn = mysqli_connect($server , $user , $password , $database);

  if(!$conn){
    die("Connection Failed :" . mysqli_connect_error());
    echo "Not Connected";
  }
  else{

  }
?>
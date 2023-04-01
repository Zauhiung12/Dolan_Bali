<?php
session_start();
// include "connection/connection.php";
if(empty($_SESSION['user_autentification'])) {
   header("location:index.php");
   die();
}
if($_SESSION['user_autentification'] !="valid") {
   header("location:index.php");
   die();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Halaman Utama</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
body{
   background: skyblue;
   color: #222;
   font-size: 20px;
}
</style>
</head>
<body>
   <div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10" style="padding:25px;">
     <h1>Perpustakaan Online [Home]</h1>
     <p>Selamat datang <b> <?= $_SESSION['username']; ?> </b></p>
     <p>Halaman ini hanya bisa diakses oleh member yang sudah mendaftar dan terverifikasi.</p>
     </div>
   <div class="col-md-1"></div>
   </div>
</body>
</html>
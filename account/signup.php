<?php
	include "../connection/connection.php";
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(($email != '') || ($username != '') || ($password != '')){
        $sqlCek = "SELECT * FROM tblogin WHERE email='$email'";
        $queryCek = mysqli_query($conn,$sqlCek) or die();
        $numCek = mysqli_num_rows($queryCek);

        if($numCek > 0){
            echo "<script>alert('Email sudah digunakan, silahkan coba yang lain..'); window.location.href='../signup.php';</script>";
        }else{
            $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
            $sqlInput = "INSERT INTO tblogin(username,email,password) VALUES ('$username','$email','$password_encrypted')";
            $queryInput = mysqli_query($conn,$sqlInput) or die();
                
            if($queryInput){
                echo "<script>alert('Akun berhasil dibuat..'); window.location.href='../index.php';</script>";
            }else{
                echo "<script>alert('Akun gagal dibuat..'); window.location.href='../signup.php';</script>";
            }
        }
    }
?>

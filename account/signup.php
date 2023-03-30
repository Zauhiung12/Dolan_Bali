<?php
	include "../connection/connection.php";
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if(($email != '') || ($username != '') || ($pass != '')){
        $sqlCek = "SELECT * FROM users WHERE email='$email'";
        $queryCek = mysqli_query($conn,$sqlCek) or die();
        $numCek = mysqli_num_rows($queryCek);

        if($numCek > 0){
            echo "<script>alert('Email sudah digunakan, silahkan coba yang lain..'); window.location.href='../signup.php';</script>";
        }else{
            $password_encrypted = password_hash($pass, PASSWORD_DEFAULT);
            $sqlInput = "INSERT INTO users(name,email,password) VALUES ('$username','$email','$password_encrypted')";
            $queryInput = mysqli_query($conn,$sqlInput) or die();
                
            if($queryInput){
                echo "<script>alert('Akun berhasil dibuat..'); window.location.href='../index.php';</script>";
            }else{
                echo "<script>alert('Akun gagal dibuat..'); window.location.href='../signup.php';</script>";
            }
        }
    }
?>

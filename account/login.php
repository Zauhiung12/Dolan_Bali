<?php
	include "../connection/connection.php";

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	if(($email != '') || ($pass != '')){
		$sqlCek = "SELECT * FROM users WHERE email = '$email'";
		$queryCek = mysqli_query($conn,$sqlCek);
		$numCek = mysqli_num_rows($queryCek);
		$data = mysqli_fetch_array($queryCek);
		
		if($numCek > 0){
			if(password_verify($pass, $data['password'])){
				$_SESSION['username'] = $data['name'];
				$_SESSION['user_autentification'] = 'valid';
				header("location : ../home.php");
			}else{
				echo "<script>alert('Password salah!'); window.location.href = '../index.php'</script>";
			}
		}else{
			echo "<script>alert('Email salah!'); window.location.href = '../index.php'</script>";
		}
	}
?>

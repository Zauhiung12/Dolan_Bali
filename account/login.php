<?php
	include "../connection/connection.php";

	$email = $_POST['email'];
	$password = $_POST['password'];

	if(!empty($email) || !empty($password)){
		$sqlCek = "SELECT * FROM tblogin WHERE email = '$email'";
		$queryCek = mysqli_query($conn,$sqlCek);
		$data = mysqli_fetch_array($queryCek);
		$numCek = mysqli_num_rows($queryCek);
		
		if($numCek > 0){
			if(password_verify($password, $data['password'])){
				$_SESSION['username'] = $data['username'];
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

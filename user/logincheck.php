<?php
	include "../config/preference.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	session_start();
	$query_login = "select * from pengguna where username='$username' and password='$password'";
	$result_login = $mysqli->query($query_login);
	$num_results_login = $result_login->num_rows;

	if ($num_results_login > 0){
		$_SESSION['username'] = $username;
		echo "<script>document.location='../application/home.php';alert('Berhasil Login!')</script>";
	}
	else{
		echo "<script>document.location='../index.php';alert('Username atau Password salah!')</script>";
	}
?>
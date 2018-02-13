<?php
	session_start();
	session_destroy();
	echo "<script>document.location='../index.php';alert('Terima kasih, Anda Berhasil Logout!')</script>";
?>
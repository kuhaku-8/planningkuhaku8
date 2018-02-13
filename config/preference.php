<?php
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$base = "planning";

	//cek database
	$mysqli = new mysqli($host, $user, $pass, $base);
	if(mysqli_connect_errno()){
		echo "Error: Tidak Bisa Terhubung Dengan Database.";
		exit;	
	}

	//tampil data buy
	$query_dibeli = "select * from barang_akan_dibeli ORDER BY harga ASC";
	$result_dibeli = $mysqli->query($query_dibeli);
	$num_results_dibeli = $result_dibeli->num_rows;

	//tampil data history
	$query_sudah = "select * from barang_punya";
	$result_sudah = $mysqli->query($query_sudah);
	$num_results_sudah = $result_sudah->num_rows;

	$action = isset($_POST['action']) ? $_POST['action'] : "";

	//tambah
	if($action=='create'){
	    $query = "insert into barang_akan_dibeli
	    set
	    nama = '".$mysqli->real_escape_string($_POST['nama'])."',
	    harga = '".$mysqli->real_escape_string($_POST['harga'])."',
	    qty = '".$mysqli->real_escape_string($_POST['qty'])."'";


	    if($mysqli->query($query)) {
	    	echo "<script>document.location='./buy.php';alert('Barang Telah Ditambahkan!')</script>";
	    }
	    else{
	        echo "<script>document.location='./buy.php';alert('Database Error! Barang Tidak Dapat Ditambahkan!')</script>";
	    }
	    $mysqli->close();
	}
	//ubah
	else if($action == "update"){
    	$query = "update barang_akan_dibeli
    	set
    	nama = '".$mysqli->real_escape_string($_POST['nama'])."',
   		harga = '".$mysqli->real_escape_string($_POST['harga'])."',
   		qty = '".$mysqli->real_escape_string($_POST['qty'])."'
    	where id='".$mysqli->real_escape_string($_REQUEST['id'])."'";
    	
    	if($mysqli->query($query)) {
    		echo "<script>document.location='./buy.php';alert('Barang Telah Diubah!')</script>";
    	}
    	else{
    		echo "<script>document.location='./buy.php';alert('Database Error! Barang Tidak Dapat Diubah!')</script>";
    	}
	}
?>
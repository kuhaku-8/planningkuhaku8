<?php
	include "../config/preference.php";

    session_start();
    if (!isset($_SESSION['username'])){
        header ("location:../index.php");
    }

	$pilih = "select * from barang_akan_dibeli where id='".$mysqli->real_escape_string($_REQUEST['id'])."' limit 0,1";
    $result = $mysqli->query($pilih);
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $harga = $row['harga'];
    $qty = $row['qty'];

    $pindah = "insert into barang_punya set
        nama = '".$mysqli->real_escape_string($nama)."',
        harga = '".$mysqli->real_escape_string($harga)."',
        qty = '".$mysqli->real_escape_string($qty)."'";

    $delete = "delete from barang_akan_dibeli where id='".$mysqli->real_escape_string($_REQUEST['id'])."'";
    
    if($mysqli->query($pilih)){
        if($mysqli->query($pindah)){
            if($mysqli->query($delete)){
                echo "<script>document.location='./home.php';alert('Barang Sudah Dipindahkan!')</script>";
            }
        }
    }
    else{
        echo "<script>document.location='./home.php';alert('Database Error! Barang Tidak Dapat Dipindahkan!')</script>";
   	}
?>
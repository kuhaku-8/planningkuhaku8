<?php
	include "../config/preference.php";

	$delete = "delete from barang_akan_dibeli where id='".$mysqli->real_escape_string($_REQUEST['id'])."'";

    if($mysqli->query($delete) ){
        echo "<script>document.location='./buy.php';alert('Barang Sudah Dihapus!')</script>";
    }
    else{
        echo "<script>document.location='./buy.php';alert('Database Error! Barang Tidak Dapat Dihapus!')</script>";
   	}
?>
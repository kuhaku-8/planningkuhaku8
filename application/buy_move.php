<?php
	include "../config/preference.php";

    session_start();
    if (!isset($_SESSION['username'])){
        header ("location:../index.php");
    }
    include '../config/profil.php';

    $pilih = "select * from barang_akan_dibeli where id='".$mysqli->real_escape_string($_REQUEST['id'])."' limit 0,1";
    $result = $mysqli->query($pilih);
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $harga = $row['harga'];
    $qty = $row['qty'];

    $hasil=$saldo_tunai-($harga*$qty);

    if($hasil>=0){
        $saldo_berkurang_beli = "update pengguna set saldo_tunai ='".$mysqli->real_escape_string($hasil)."' where username='$username'";

        $pindah = "insert into barang_punya set
        nama = '".$mysqli->real_escape_string($nama)."',
        harga = '".$mysqli->real_escape_string($harga)."',
        qty = '".$mysqli->real_escape_string($qty)."'";

        $delete = "delete from barang_akan_dibeli where id='".$mysqli->real_escape_string($_REQUEST['id'])."'";

        if($mysqli->query($pilih) && $mysqli->query($pindah) && $mysqli->query($delete) && $mysqli->query($saldo_berkurang_beli)){
            echo "<script>document.location='./buy_index.php';alert('Barang Sudah Dipindahkan Ke Daftar Barang Sudah Beli!')</script>";
        }
        else{
            echo "<script>document.location='./buy_index.php';alert('Database Error! Barang Tidak Dapat Dipindahkan!')</script>";
        }
    }
    else{
        echo "<script>document.location='./buy_index.php';alert('Barang Tidak Dapat Dibeli Karena Saldo Anda Kurang!')</script>";
    }
?>
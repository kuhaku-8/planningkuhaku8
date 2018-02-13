<?php
    $username=$_SESSION['username'];
    $query_login = "select * from pengguna where username='$username'";
    $result_login = $mysqli->query($query_login);
    $num_results_login = $result_login->num_rows;
    $row_pengguna = $result_login->fetch_assoc();
    $namalengkap = $row_pengguna['namalengkap'];
    $namamedium = $row_pengguna['namamedium'];
    $id = $row_pengguna['id'];
    $saldo_tunai = $row_pengguna['saldo_tunai'];

    $query_yang_hutang = "select * from yang_hutang";
	$result_yang_hutang = $mysqli->query($query_yang_hutang);
	$num_results_yang_hutang = $result_yang_hutang->num_rows;
	$banyak_yang_hutang=0;
	$total_yang_hutang=0;
	while($row = $result_yang_hutang->fetch_assoc()){
		$jumlah_yang_hutang = $row['jumlah_yang_hutang'];
		$banyak_yang_hutang++; 
		$total_yang_hutang+=$jumlah_yang_hutang;
	}

	$query_berhutang = "select * from berhutang";
	$result_berhutang = $mysqli->query($query_berhutang);
	$num_results_berhutang = $result_berhutang->num_rows;
	$banyak_berhutang=0;
	$total_berhutang=0; 
	while($row = $result_berhutang->fetch_assoc()){
		$jumlah_berhutang = $row['jumlah_berhutang'];
		$banyak_berhutang++;
		$total_berhutang+=$jumlah_berhutang;
	}

	$total_keseluruhan=($saldo_tunai+$total_yang_hutang)-$total_berhutang;
?>
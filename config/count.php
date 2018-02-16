<?php
    $query_yang_hutang_hitung = "select * from yang_hutang";
    $result_yang_hutang_hitung = $mysqli->query($query_yang_hutang_hitung);

    $banyak_yang_hutang_hitung=0;
    $total_yang_hutang_hitung=0;
    $total_yang_hutang_sisa=0;
    while($row = $result_yang_hutang_hitung->fetch_assoc()){
        extract($row);
        $banyak_yang_hutang_hitung++;
        $total_yang_hutang_hitung+=$jumlah_yang_hutang;
        $total_yang_hutang_sisa+=$sisa_yang_hutang;
        $total_lunas_yang_hutang=$total_yang_hutang_hitung-$total_yang_hutang_sisa;
    }

    $query_berhutang_hitung = "select * from berhutang";
    $result_berhutang_hitung = $mysqli->query($query_berhutang_hitung);

    $banyak_berhutang_hitung=0;
    $total_berhutang_hitung=0;
    $total_berhutang_sisa=0;
    while($row = $result_berhutang_hitung->fetch_assoc()){
        extract($row);
        $banyak_berhutang_hitung++;
        $total_berhutang_hitung+=$jumlah_berhutang;
        $total_berhutang_sisa+=$sisa_berhutang;
        $total_lunas_berhutang=$total_berhutang_hitung-$total_berhutang_sisa;
    }

    $query_sudah_hitung = "select * from barang_punya ORDER BY id DESC";
    $result_sudah_hitung = $mysqli->query($query_sudah_hitung);

    $total_habis=0;
    while($row = $result_sudah_hitung->fetch_assoc()){
        extract($row);
        $jumlah=$harga*$qty;
        $total_habis+=$jumlah;
    }

    $total_keseluruhan=($saldo_tunai+$total_yang_hutang_sisa)-$total_lunas_berhutang;
?>
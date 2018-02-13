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
?>
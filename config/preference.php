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
	$query_sudah = "select * from barang_punya ORDER BY id DESC";
	$result_sudah = $mysqli->query($query_sudah);
	$num_results_sudah = $result_sudah->num_rows;

    $query_yang_hutang = "select * from yang_hutang ORDER BY id_yang_hutang ASC";
    $result_yang_hutang = $mysqli->query($query_yang_hutang);
    $num_results_yang_hutang = $result_yang_hutang->num_rows;

    $query_yang_hutang_lunas = "select * from yang_hutang_lunas";
    $result_yang_hutang_lunas = $mysqli->query($query_yang_hutang_lunas);
    $num_results_yang_hutang_lunas = $result_yang_hutang_lunas->num_rows;

    $query_berhutang = "select * from berhutang ORDER BY id_berhutang ASC";
    $result_berhutang = $mysqli->query($query_berhutang);
    $num_results_berhutang = $result_berhutang->num_rows;

    $query_berhutang_lunas = "select * from berhutang_lunas";
    $result_berhutang_lunas = $mysqli->query($query_berhutang_lunas);
    $num_results_berhutang_lunas = $result_berhutang_lunas->num_rows;

	$action = isset($_POST['action']) ? $_POST['action'] : "";

	//tambah
	if($action=='create'){
	    $query = "insert into barang_akan_dibeli
	    set
	    nama = '".$mysqli->real_escape_string($_POST['nama'])."',
	    harga = '".$mysqli->real_escape_string($_POST['harga'])."',
	    qty = '".$mysqli->real_escape_string($_POST['qty'])."'";

	    if($mysqli->query($query)) {
	    	echo "<script>document.location='./buy_index.php';alert('Barang Telah Ditambahkan!')</script>";
	    }
	    else{
	        echo "<script>document.location='./buy_index.php';alert('Database Error! Barang Tidak Dapat Ditambahkan!')</script>";
	    }
	}

	//tambah_yang_hutang
    if($action=='create_owe'){
        $query = "insert into yang_hutang
            set
            nama_yang_hutang = '".$mysqli->real_escape_string($_POST['nama_yang_hutang'])."',
            jumlah_yang_hutang = '".$mysqli->real_escape_string($_POST['jumlah_yang_hutang'])."',
            status_yang_hutang = '".$mysqli->real_escape_string($_POST['status_yang_hutang'])."',
            tanggal_yang_hutang = '".$mysqli->real_escape_string($_POST['tanggal_yang_hutang'])."'";

        if($mysqli->query($query)) {
            echo "<script>document.location='./financial_owe_index.php';alert('Orang Yang Berhutang Telah Ditambahkan!')</script>";
        }
        else{
            echo "<script>document.location='./financial_owe_index.php';alert('Database Error! Orang Yang Berhutang Tidak Dapat Ditambahkan!')</script>";
        }
        $mysqli->close();
    }

    //tambah_berhutang
    if($action=='create_debt'){
        $query = "insert into berhutang
                set
                nama_berhutang = '".$mysqli->real_escape_string($_POST['nama_berhutang'])."',
                jumlah_berhutang = '".$mysqli->real_escape_string($_POST['jumlah_berhutang'])."',
                status_berhutang = '".$mysqli->real_escape_string($_POST['status_berhutang'])."',
                tanggal_berhutang = '".$mysqli->real_escape_string($_POST['tanggal_berhutang'])."'";

        if($mysqli->query($query)) {
            echo "<script>document.location='./financial_debt_index.php';alert('Hutang Telah Ditambahkan!')</script>";
        }
        else{
            echo "<script>document.location='./financial_debt_index.php';alert('Database Error! Hutang Tidak Dapat Ditambahkan!')</script>";
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
    		echo "<script>document.location='./buy_index.php';alert('Barang Telah Diubah!')</script>";
    	}
    	else{
    		echo "<script>document.location='./buy_index.php';alert('Database Error! Barang Tidak Dapat Diubah!')</script>";
    	}
	}
?>
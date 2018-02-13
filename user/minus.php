<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Kurangi" required>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
    	<input type="reset" class="btn btn-default pull-left" value="Reset">
        <input type="submit" class="btn btn-primary" name="kurangi" value="Kurangi">
        <?php 
	if(isset($_POST['kurangi'])){
		$jumlah=$_POST['jumlah'];
		$hasil=$saldo_tunai-$jumlah;

		$query_kurangi = "update pengguna set saldo_tunai ='".$mysqli->real_escape_string($hasil)."' where username='$username'";

		if($mysqli->query($query_kurangi)) {
			$tampil=number_format("$jumlah",0,",",".");
			echo "<script>document.location='./financial.php';alert('Saldo Telah Dikurangi Sebanyak Rp $tampil!')</script>";
		}
		else{
			echo "<script>document.location='./financial.php';alert('Database Error! Saldo Gagal Dikurangi!')</script>";
		}
	}
?>
    </div>
</form>
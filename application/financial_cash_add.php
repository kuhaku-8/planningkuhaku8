<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Tambahan" required>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
    	<input type="reset" class="btn btn-default pull-left" value="Reset">
        <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
        <?php 
	if(isset($_POST['tambah'])){
		$jumlah=$_POST['jumlah'];
		$hasil=$saldo_tunai+$jumlah;

		$query_tambah = "update pengguna set saldo_tunai ='".$mysqli->real_escape_string($hasil)."' where username='$username'";

		if($mysqli->query($query_tambah)) {
			$tampil=number_format("$jumlah",0,",",".");
			echo "<script>document.location='./financial.php';alert('Saldo Telah Ditambahkan Sebanyak Rp $tampil!')</script>";
		}
		else{
			echo "<script>document.location='./financial.php';alert('Database Error! Saldo Gagal Ditambahkan!')</script>";
		}
	}
?>
    </div>
</form>
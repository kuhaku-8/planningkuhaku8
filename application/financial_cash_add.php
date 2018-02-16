<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Jumlah</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-money"></i>
                </div>
                <input type="number" class="form-control" name="jumlah_cash" autocomplete="off" placeholder="Masukkan Jumlah Tambahan" required>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
    	<input type="reset" class="btn btn-outline pull-left" value="Reset">
        <input type="submit" class="btn btn-outline" name="tambah_cash" value="Tambah">
    </div>
</form>

<?php
    if(isset($_POST['tambah_cash'])){
        $jumlah_cash=$_POST['jumlah_cash'];
        $hasil_cash=$saldo_tunai+$jumlah_cash;

        $query_cash_tambah = "update pengguna set saldo_tunai ='".$mysqli->real_escape_string($hasil_cash)."' where username='$username'";

        if($mysqli->query($query_cash_tambah)) {
            $tampil_cash=number_format("$jumlah_cash",0,",",".");
            echo "<script>document.location='./financial_index.php';alert('Saldo Tunai Telah Ditambahkan Sebanyak Rp $tampil_cash!')</script>";
        }
        else{
            echo "<script>document.location='./financial_index.php';alert('Database Error! Saldo Gagal Ditambahkan!')</script>";
        }
    }
?>
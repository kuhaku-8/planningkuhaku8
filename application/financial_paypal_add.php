<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Jumlah</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-paypal"></i>
                </div>
                <input type="number" step="any" min=”0″ class="form-control" name="jumlah_paypal" autocomplete="off" placeholder="Masukkan Jumlah Tambahan" required>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
        <input type="reset" class="btn btn-outline pull-left" value="Reset">
        <input type="submit" class="btn btn-outline" name="tambah_paypal" value="Tambah">
    </div>
</form>

<?php
if(isset($_POST['tambah_paypal'])){
    $jumlah_paypal=$_POST['jumlah_paypal'];
    $hasil_paypal=$saldo_paypal+$jumlah_paypal;

    $query_paypal_tambah = "update pengguna set saldo_paypal ='".$mysqli->real_escape_string($hasil_paypal)."' where username='$username'";

    if($mysqli->query($query_paypal_tambah)) {
        echo "<script>document.location='./financial_index.php';alert('Saldo Paypal Telah Ditambahkan Sebanyak USD $jumlah_paypal!')</script>";
    }
    else{
        echo "<script>document.location='./financial_index.php';alert('Database Error! Saldo Gagal Ditambahkan!')</script>";
    }
}
?>
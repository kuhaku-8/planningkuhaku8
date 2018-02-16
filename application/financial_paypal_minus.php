<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Jumlah</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-paypal"></i>
                </div>
                <input type="text" step="any" min=”0″ class="form-control" name="jumlah_paypal" autocomplete="off" placeholder="Masukkan Jumlah Kurangi" required>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
        <input type="reset" class="btn btn-outline pull-left" value="Reset">
        <input type="submit" class="btn btn-outline" name="kurangi_paypal" value="Kurangi">
    </div>
</form>

<?php
    if(isset($_POST['kurangi_paypal'])){
        $jumlah_paypal=$_POST['jumlah_paypal'];
        if($jumlah_paypal>$saldo_paypal){
            echo "<script>document.location='./financial_index.php';alert('Saldo Paypal Gagal Dikurangi Karena Tidak Mencukupi!')</script>";
        }
        else{
            $hasil_paypal=$saldo_paypal-$jumlah_paypal;

            $query_paypal_kurangi = "update pengguna set saldo_paypal ='".$mysqli->real_escape_string($hasil_paypal)."' where username='$username'";

            if($mysqli->query($query_paypal_kurangi)) {
                echo "<script>document.location='./financial_index.php';alert('Saldo Paypal Telah Dikurangi Sebanyak USD $jumlah_paypal!')</script>";
            }
            else{
                echo "<script>document.location='./financial_index.php';alert('Database Error! Saldo Gagal Dikurangi!')</script>";
            }
        }
    }
?>
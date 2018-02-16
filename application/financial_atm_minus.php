<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Jumlah</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-credit-card"></i>
                </div>
                <input type="number" class="form-control" name="jumlah_atm" autocomplete="off" placeholder="Masukkan Jumlah Kurangi" required>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
        <input type="reset" class="btn btn-outline pull-left" value="Reset">
        <input type="submit" class="btn btn-outline" name="kurangi_atm" value="Kurangi">
    </div>
</form>

<?php
    if(isset($_POST['kurangi_atm'])){
        $jumlah_atm=$_POST['jumlah_atm'];
        if($jumlah_atm>$saldo_atm){
            echo "<script>document.location='./financial_index.php';alert('Saldo ATM Gagal Dikurangi Karena Tidak Mencukupi!')</script>";
        }
        else{
            $hasil_atm=$saldo_atm-$jumlah_atm;

            $query_atm_kurangi = "update pengguna set saldo_atm ='".$mysqli->real_escape_string($hasil_atm)."' where username='$username'";

            if($mysqli->query($query_atm_kurangi)) {
                $tampil_atm=number_format("$jumlah_atm",0,",",".");
                echo "<script>document.location='./financial_index.php';alert('Saldo ATM Telah Dikurangi Sebanyak Rp $tampil_atm!')</script>";
            }
            else{
                echo "<script>document.location='./financial_index.php';alert('Database Error! Saldo Gagal Dikurangi!')</script>";
            }
        }
    }
?>
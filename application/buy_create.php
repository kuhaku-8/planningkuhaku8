<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Nama</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-inbox"></i>
                </div>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang" required>
            </div>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-money"></i>
                </div>
                <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga" required>
            </div>
        </div>
        <div class="form-group">
            <label>Qty</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-database"></i>
                </div>
                <input type="number" class="form-control" name="qty" value="1" placeholder="Masukkan Banyak Barang" required>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
        <input type="reset" class="btn btn-default pull-left" value="Reset">
        <input type='hidden' name='action' value='create'>
        <input type="submit" class="btn btn-primary" value="Tambah">
    </div>
</form>
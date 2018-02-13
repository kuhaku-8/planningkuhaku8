<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" class="form-control" name="harga" placeholder="Masukkan harga" required>
        </div>
        <div class="form-group">
            <label>Qty</label>
            <input type="number" class="form-control" name="qty" value="1" placeholder="Masukkan Banyak Barang" required>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
        <input type="reset" class="btn btn-default pull-left" value="Reset">
        <input type='hidden' name='action' value='create'>
        <input type="submit" class="btn btn-primary" value="Tambah">
    </div>
</form>
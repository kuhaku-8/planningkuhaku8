<!-- form start -->
<form role="form" action="#" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label>Nama</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" class="form-control" name="nama_yang_hutang" placeholder="Masukkan Nama Yang Kita Hutangi" required>
            </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-group"></i>
                </div>
                <select class="form-control" name="status_yang_hutang" required>
                    <option value="">Silahkan Pilih</option>
                    <option value="Teman">Teman</option>
                    <option value="Keluarga">Keluarga</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_yang_hutang" placeholder="Masukkan Tanggal">
            </div>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-money"></i>
                </div>
                <input type="number" class="form-control" name="jumlah_yang_hutang" placeholder="Masukkan Jumlah" required>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="modal-footer">
        <input type="reset" class="btn btn-outline pull-left" value="Reset">
        <input type='hidden' name='action' value='create_owe'>
        <input type="submit" class="btn btn-outline" value="Tambah">
    </div>
</form>
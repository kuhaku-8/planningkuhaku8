<?php
include "../config/preference.php";

session_start();
if (!isset($_SESSION['username'])){
    header ("location:../index.php");
}
include "../config/profil.php";

$query_yang_hutang = "select * from yang_hutang where id_yang_hutang='".$mysqli->real_escape_string($_REQUEST['id'])."'limit 0,1";
$result_yang_hutang = $mysqli->query($query_yang_hutang);
$row_yang_hutang = $result_yang_hutang->fetch_assoc();
$id_yang_hutang = $row_yang_hutang['id_yang_hutang'];
$nama_yang_hutang = $row_yang_hutang['nama_yang_hutang'];
$status_yang_hutang = $row_yang_hutang['status_yang_hutang'];
$jumlah_yang_hutang = $row_yang_hutang['jumlah_yang_hutang'];
$tanggal_yang_hutang = $row_yang_hutang['tanggal_yang_hutang'];
$sisa_yang_hutang = $row_yang_hutang['sisa_yang_hutang'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "$nama_yang_hutang" ?></title>
    <?php include '../config/top.php'; ?>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include '../config/header.php'; ?>
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <?php include '../config/sidebar_user.php'; ?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">KEUANGAN</li>
                <li><a href="./financial_index.php"><i class="fa fa-balance-scale"></i> Dimiliki</a></li>
                <li class="treeview active">
                    <a href="#"><i class="fa fa-users"></i> Daftar Yang Berhutang
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="./financial_owe_index.php"><i class="fa fa-th-list"></i> Lihat</a></li>
                        <li><a href="./financial_owe_history.php"><i class="fa fa-check"></i> Sudah Lunas</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i> Daftar Hutang
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./financial_debt_index.php"><i class="fa fa-th-list"></i> Lihat</a></li>
                        <li><a href="./financial_debt_history.php"><i class="fa fa-check"></i> Sudah Lunas</a></li>
                    </ul>
                </li>
                <li class="header">BARANG</li>
                <li>
                    <a href="./buy_index.php">
                        <i class="fa fa-tasks"></i> <span>Barang Akan Dibeli</span>
                    </a>
                </li>
                <li>
                    <a href="./history_index.php">
                        <i class="fa fa-check-circle"></i> <span>Barang Sudah Dibeli</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <a href="./financial_owe_index.php"><i class="fa fa-arrow-left"></i></a>
                &nbspUbah Hutang
                <small><?php echo "$nama_yang_hutang" ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#">Daftar Yang Berhutang</a></li>
                <li><a href="./financial_owe_index.php">Lihat</a></li>
                <li class="active">Ubah Hutang</li>
            </ol>
        </section>
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo "$nama_yang_hutang" ?></h3>
                </div>
                <!-- /.box-header -->
                <form class="form-horizontal" method="post" action="#">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" name="nama_yang_hutang" class="form-control" value="<?php echo "$nama_yang_hutang" ?>" placeholder="Masukkan Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="tanggal_yang_hutang" class="form-control" id="datepicker" value="<?php echo "$tanggal_yang_hutang" ?>" placeholder="Masukkan Jumlah Hutang" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Lunas</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </div>
                                            <input type="number" name="sisa_yang_hutang" class="form-control" value="<?php echo "$sisa_yang_hutang" ?>" placeholder="Masukkan Jumlah Sisa" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-group"></i>
                                            </div>
                                            <select class="form-control" name="status_yang_hutang" required>
                                                <?php if($status_yang_hutang=="Keluarga"){ ?>
                                                    <option value="Teman">Teman</option>
                                                    <option value="Keluarga" selected>Keluarga</option>
                                                <?php }else{ ?>
                                                    <option value="Teman" selected>Teman</option>
                                                    <option value="Keluarga">Keluarga</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jumlah</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </div>
                                            <input type="number" name="jumlah_yang_hutang" class="form-control" value="<?php echo "$jumlah_yang_hutang" ?>" placeholder="Masukkan Jumlah" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="reset" class="btn btn-default" />
                        <input type='hidden' name='id_yang_hutang' value='<?php echo $id_yang_hutang ?>' />
                        <input type='hidden' name='action' value='update_owe' />
                        <input type='submit' class="btn btn-info pull-right" value='Simpan' onclick="return confirm('Yakin Ingin Mengubah <?php echo "$nama_yang_hutang" ?>?')" />
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.box-body -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '../config/footer.php'; ?>
    <?php include '../config/bottom.php'; ?>
</div>
</body>
</html>
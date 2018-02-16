<?php
	include "../config/preference.php";

	session_start();
	if (!isset($_SESSION['username'])){
		header ("location:../index.php");
	}
    include '../config/profil.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Barang Yang Ingin Dibeli</title>
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
                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i> Daftar Yang Berhutang
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./financial_owe_index.php"><i class="fa fa-th-list"></i> Lihat</a></li>
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
                <li class="active">
                    <a href="#">
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
                Barang
                <small>yang akan dibeli</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./home.php"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Barang Akan Dibeli</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Barang</h3>
                        </div>
                        <div class="box-body">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">
                                <i class="fa fa-cart-plus"></i> &nbspTambah
                            </button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if($num_results_dibeli>0){ ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; $total=0; while($row = $result_dibeli->fetch_assoc()){extract($row); ?>
                                    <tr>
                                        <td><?php echo "$no" ?></td>
                                        <td><?php echo "$nama" ?></td>
                                        <td><?php echo "$qty" ?></td>
                                        <td>
                                            <table width="90">
                                                <tr>
                                                    <td>Rp</td>
                                                    <td align="right"><?php echo number_format("$harga",0,",",".") ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <?php
                                            $jumlah=$harga*$qty;
                                            if($saldo_tunai>=$jumlah){$status="Dapat Dibeli";}
                                            else{
                                                $kurang=$jumlah-$saldo_tunai;
                                                $kurangnya = number_format("$kurang",0,",",".");
                                                $status="Uang Kurang Rp $kurangnya";
                                            }
                                        ?>
                                        <td>
                                            <table width="90">
                                                <tr>
                                                    <td>Rp</td>
                                                    <td align="right"><?php echo number_format("$jumlah",0,",",".") ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td><?php echo "$status" ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="./buy_update.php?id=<?php echo "$id" ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspUbah</a>
                                                <a href="./buy_delete.php?id=<?php echo "$id" ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus No. <?php echo "$no" ?>?')"><i class="fa fa-trash"></i> &nbspHapus</a>
                                                <a href="./buy_move.php?id=<?php echo "$id" ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin No. <?php echo "$no" ?> Sudah Dibeli?')"><i class="fa fa-share"></i> &nbspSudah Dibeli</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++; $total+=$jumlah; } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                            <?php }else{ ?>
                                Tidak Ada Data!
                            <?php }
                                $result_dibeli->free();
                                $mysqli->close();
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include '../config/footer.php'; ?>
    <?php include '../config/bottom.php'; ?>
</div>
<div class="modal modal-info fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-cart-plus"></i> &nbspTambahkan Barang</h4>
            </div>
            <?php include './buy_create.php'; ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>
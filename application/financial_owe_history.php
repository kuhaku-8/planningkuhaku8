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
    <title>Daftar Yang Berutang</title>
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
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Keuangan</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./financial_index.php"><i class="fa fa-balance-scale"></i> Lihat</a></li>
                        <li class="treeview active">
                            <a href="#"><i class="fa fa-users"></i> Daftar Yang Berhutang
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./financial_owe_index.php"><i class="fa fa-th-list"></i> Lihat</a></li>
                                <li class="active"><a href="#"><i class="fa fa-check"></i> Sudah Lunas</a></li>
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
                    </ul>
                </li>
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
                Daftar
                <small>yang lunas berhutang</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#">Keuangan</a></li>
                <li class="active">Daftar Yang Lunas Berutang</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Yang Lunas Berhutang</h3>
                        </div>
                        <!-- /.box-header -->
                        <?php if($num_results_yang_hutang_lunas>0){ ?>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Tanggal (Y-M-D)</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; while($row_yang_hutang_lunas = $result_yang_hutang_lunas->fetch_assoc()){extract($row_yang_hutang_lunas); ?>
                                        <tr>
                                            <td><?php echo "$no" ?></td>
                                            <td><?php echo "$nama_yang_hutang_lunas" ?></td>
                                            <td><?php echo "$status_yang_hutang_lunas" ?></td>
                                            <td><?php echo "$tanggal_yang_hutang_lunas" ?></td>
                                            <td>
                                                <table width="90">
                                                    <tr>
                                                        <td>Rp</td>
                                                        <td align="right"><?php echo number_format("$jumlah_yang_hutang_lunas",0,",",".") ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <a href="./financial_owe_update.php?id=<?php echo "$id_yang_hutang" ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspEdit</a>
                                                <a href="./financial_owe_delete.php?id=<?php echo "$id_yang_hutang" ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus <?php echo "$nama_yang_hutang" ?>?')"><i class="fa fa-trash"></i> &nbspDelete</a>
                                                <a href="./financial_owe_move.php?id=<?php echo "$id_yang_hutang" ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin <?php echo "$nama_yang_hutang" ?> Sudah Lunas?')"><i class="fa fa-share"></i> &nbspMove</a>
                                            </td>
                                        </tr>
                                        <?php $no++;} ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Tanggal (Y-M-D)</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        <?php }else{ ?>
                            No records found.
                            <?php
                        }
                        $result_yang_hutang_lunas->free();
                        $mysqli->close();
                        ?>
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
</body>
</html>
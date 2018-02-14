<?php
include "../config/preference.php";

session_start();
if (!isset($_SESSION['username'])){
    header ("location:../index.php");
}
include '../config/profil.php';

$query = "select * from barang_punya where id='".$mysqli->real_escape_string($_REQUEST['id'])."'limit 0,1";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
$id = $row['id'];
$nama = $row['nama'];
$harga = $row['harga'];
$qty = $row['qty'];
$web_resmi = $row['web_resmi'];
$spek = $row['spek'];
$vendor = $row['vendor'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "$nama" ?></title>
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
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Keuangan</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./"><i class="fa fa-balance-scale"></i> Lihat</a></li>
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
                Barang
                <small><?php echo "$nama" ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#">History</a></li>
                <li class="active">Selengkapnya</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Galeri</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="../src/barang_punya/<?php echo "$id" ?>/1.jpg" alt="First slide">
                                    </div>
                                    <div class="item">
                                        <img src="../src/barang_punya/<?php echo "$id" ?>/2.jpg" alt="Second slide">
                                    </div>
                                    <div class="item">
                                        <img src="../src/barang_punya/<?php echo "$id" ?>/3.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Selengkapnya</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo "$nama" ?></td>
                                            <td>
                                                <table width="90">
                                                    <tr>
                                                        <td>Rp</td>
                                                        <td align="right"><?php echo number_format("$harga",0,",",".") ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Web Resmi</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="<?php echo "$web_resmi" ?>" target="_blank"><?php echo "$vendor" ?></a></td>
                                            <td><?php echo "$qty" ?></td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th colspan="2">Spek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><?php echo "$spek" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!--/.row-->
        </section>
        <!-- /.box-body -->
    </div>
    <!-- /.content-wrapper -->

    <?php include '../config/footer.php'; ?>
    <?php include '../config/bottom.php'; ?>
</div>
</body>
</html>
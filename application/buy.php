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
                <li>
                    <a href="../user/financial.php">
                        <i class="fa fa-money"></i> <span>Keuangan</span>
                    </a>
                </li>
                <li class="active">
                    <a>
                        <i class="fa fa-tasks"></i> <span>Barang Akan Dibeli</span>
                    </a>
                </li>
                <li>
                    <a href="./history.php">
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
                <li><a href="../application/home.php"><i class="fa fa-home"></i>Home</a></li>
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
                                <i class="fa fa-plus"></i>&nbsp&nbspTambah
                            </button>
                        </div>
                        <!-- /.box-header -->
                        <?php if($num_results_dibeli>0){ ?>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
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
                                        <?php $jumlah=$harga*$qty; ?>
                                        <td>
                                            <table width="90">
                                                <tr>
                                                    <td>Rp</td>
                                                    <td align="right"><?php echo number_format("$jumlah",0,",",".") ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="update.php?id=<?php echo "$id" ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspEdit</a>
                                                <a href="delete.php?id=<?php echo "$id" ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus <?php echo "$nama" ?>?')"><i class="fa fa-trash"></i> &nbspDelete</a>
                                                <a href="move.php?id=<?php echo "$id" ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin <?php echo "$nama" ?> Sudah Dibeli?')"><i class="fa fa-share"></i> &nbspMove</a>
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
                        $result_sudah->free();
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
<div class="modal modal-info fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Barang</h4>
            </div>
            <?php include './create.php'; ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>
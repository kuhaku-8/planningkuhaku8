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
    <title>Keuangan</title>
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
                <li class="active">
                    <a>
                        <i class="fa fa-money"></i> <span>Keuangan</span>
                    </a>
                </li>
                <li>
                    <a href="../application/buy.php">
                        <i class="fa fa-tasks"></i> <span>Barang Akan Dibeli</span>
                    </a>
                </li>
                <li>
                    <a href="../application/history.php">
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
                Keuangan
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../application/home.php"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Keuangan</li>
            </ol>
        </section>

        <!-- Main content -->
	    <section class="content">
	      <!-- Small boxes (Stat box) -->
	      <div class="row">
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>Rp <?php echo number_format("$total_keseluruhan",0,",",".") ?></h3>

	              <p>Total Yang Dimiliki</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-bag"></i>
	            </div>
	            <div class="small-box-footer">
	            	<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#tambah_tunai">
                        <i class="fa fa-plus"></i>&nbsp&nbspTambah
                    </button>
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#kurangi_tunai">
                        <i class="fa fa-minus"></i>&nbsp&nbspKurangi
                    </button>
	          	</div>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3>53<sup style="font-size: 20px">%</sup></h3>

	              <p>Keuntungan Pekerjaan</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-stats-bars"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3><?php echo "$banyak_yang_hutang"; ?></h3>

	              <p>Orang Yang Berhutang</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-person-add"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        <div class="col-lg-3 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-red">
	            <div class="inner">
	              <h3><?php echo "$banyak_berhutang"; ?></h3>

	              <p>Hutang Kepada Orang</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-pie-graph"></i>
	            </div>
	            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	      </div>
	      <!-- /.row -->                           
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include '../config/footer.php'; ?>
    <?php include '../config/bottom.php'; ?>
</div>
<div class="modal modal-info fade" id="tambah_tunai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahan Jumlah Uang Tunai</h4>
            </div>
            <?php include './add.php'; ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-info fade" id="kurangi_tunai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kurangi Jumlah Uang Tunai</h4>
            </div>
            <?php include './minus.php'; ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>
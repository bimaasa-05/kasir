<?php

include "../config/koneksi.php";

session_start();

//Membuat sebuah kondisi untuk melakukan cek apakah yang mengakses ini sudah login atau belum?
if ($_SESSION['role'] == "") {
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?php
                                    $UserID = $_SESSION['UserID'];
                                    $dt_user = mysqli_query($koneksi, "SELECT * FROM tb_user where UserID = '$UserID'");

                                    while ($user = mysqli_fetch_assoc($dt_user)) { ?>
                                    <?php
                                        echo $user['NamaUser'];
                                    }
                                    ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php
                                        $UserID = $_SESSION['UserID'];
                                        $dt_user = mysqli_query($koneksi, "SELECT * FROM tb_user where UserID = '$UserID'");
                                        while ($user = mysqli_fetch_array($dt_user)) {
                                        ?>

                                        <?php
                                            echo $user['NamaUser'] . "<small>Username : " . $user['username'] . "</small>";
                                        }
                                        ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-danger btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php
                            $UserID = $_SESSION['UserID'];
                            $dt_user = mysqli_query($koneksi, "SELECT * FROM tb_user where UserID = '$UserID'");

                            while ($user = mysqli_fetch_assoc($dt_user)) { ?>
                            <?php
                                echo $user['NamaUser'];
                            }
                            ?>
                        </p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Master Data</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pelanggan_data.php"><i class="fa fa-circle-o"></i> Data Pelanggan</a></li>
                            <li><a href="produk_data.php"><i class="fa fa-circle-o"></i> Data Produk</a></li>
                            <li><a href="kasir_data.php"><i class="fa fa-circle-o"></i> Data Kasir</a></li>
                        </ul>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span>Data Transaksi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="transaksi_data.php"><i class="fa fa-circle-o"></i> Data Transaksi</a></li>
                            <li><a href="transaksi_tambah.php"><i class="fa fa-circle-o"></i> Tambah Transaksi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="transaksi_laporan.php">
                            <i class="fa fa-book"></i> <span>Laporan Transaksi</span>
                        </a>
                    </li>
                    </li>
            </section>
            <!-- /.sidebar -->
        </aside>
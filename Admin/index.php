<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Aplikasi Sederhana</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Pelanggan</span>
                        <span class="info-box-number">
                            <?php
                            $pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                            echo mysqli_num_rows($pelanggan);
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-cart-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Produk</span>
                        <span class="info-box-number">
                            <?php
                            $produk = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                            echo mysqli_num_rows($produk);
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Transaksi</span>
                        <span class="info-box-number">
                            <?php
                            $penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
                            echo mysqli_num_rows($penjualan);
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Transaksi</span>
                        <span class="info-box-number">
                            <?php
                            $total_transaksi = mysqli_query($koneksi, "SELECT SUM(TotalHarga) AS jml_total FROM  tb_penjualan");
                            while ($t_trans = mysqli_fetch_array($total_transaksi)) { ?>
                            <?php
                                $total = $t_trans['jml_total'];
                            }
                            ?>
                            <?php
                            global $total;
                            echo "Rp. " . number_format($total) . ",-";
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</section>
</div>
<!-- /.content -->
<!-- /.content-wrapper -->

<?php

include "footer.php";

?>
</body>

</html>
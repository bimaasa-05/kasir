<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Transaksi || Aplikasi Kasir Sederhana</title>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include "../config/koneksi.php";

    session_start();
    //Melakukan Sebuah Kondisi untuk melakukan pengecekan apakah sudah login atau belum
    if ($_SESSION['role'] === "") {
        header("location: ../index.php");
    }
    ?>
    <div class="container">
        <h2 class="text-center"><strong>Kasir Sederhana</strong></h2>
        <p class="text-center"><strong>Jl. Jedral Soedirman No. 175 Indramayu</strong></p>
        <br>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>No </td>
                    <td>Nomor Transaksi</td>
                    <td>Tanggal Penjualan</td>
                    <td>Nama Pelanggan</td>
                    <td>Nama Petugas</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $tgl_awal = $_GET['dari'];
                $tgl_akhir = $_GET['sampai'];


                $UserID = $_SESSION['UserID'];
                $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_pelanggan.PelangganID = tb_penjualan.PelangganID INNER JOIN tb_user ON tb_user.UserID = tb_penjualan.UserID WHERE date(TanggalPenjualan) >= '$tgl_awal' AND date(TanggalPenjualan) <= '$tgl_akhir' ORDER BY TanggalPenjualan DESC");
                $no = 1;
                while ($penjualan = mysqli_fetch_array($dt_penjualan)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $penjualan['PenjualanID']; ?></td>
                        <td><?php echo $penjualan['TanggalPenjualan']; ?></td>
                        <td><?php echo $penjualan['NamaPelanggan']; ?></td>
                        <td><?php echo $penjualan['NamaUser']; ?></td>
                        <td><?php echo "Rp. " . number_format($penjualan['TotalHarga']) . ",- ";  ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <p class="text-center"><i>"Laporan Transaksi Dari Tanggal <?php echo $tgl_awal; ?> sampai <?php echo $tgl_akhir; ?>"</i></p>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
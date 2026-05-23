<?php
include "header.php";
include "../config/koneksi.php";
?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-body">
            <form action="transaksi_laporan.php" method="GET">
              <table class="table table-bordered table-striped">
                <tr>
                  <td>
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="tgl_awal">
                  </td>
                  <td>
                    <label>Tanggal Akir</label>
                    <input type="date" class="form-control" name="tgl_akhir">
                  </td>
                </tr>
                <td colspan="2">
                  <input type="submit" class="btn btn-primary pull-right" value="Filteer">
                </td>
              </table>
            </form>
          </div>
        </div>
      </div>
      <?php
      if (isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])) {
        $awal = $_GET['tgl_awal'];
        $akhir = $_GET['tgl_akhir'];
      ?>
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <a href="transaksi_laporan_cetak.php?dari=<?php echo $awal; ?>&sampai=<?php echo $akhir; ?>" target="_blank" class="btn btn-success pull-right"><i class="glyphicon glyphicon-print"></i>Cetak</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>NO</td>
                    <td>NOMOR TRANSAKSI</td>
                    <td>TANGGAL PENJUALAN</td>
                    <td>NAMA PELANGGAN</td>
                    <td>NAMA PETUGAS</td>
                    <td>TOTAL</td>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $UserID = $_SESSION['UserID'];
                  $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_pelanggan.PelangganID = tb_penjualan.PelangganID INNER JOIN tb_user ON tb_user.UserID = tb_penjualan.UserID WHERE date(TanggalPenjualan) >= '$awal' AND date(TanggalPenjualan) <= '$akhir' ORDER BY TanggalPenjualan DESC");
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
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
</div>
<?php

include "footer.php";

?>
</body>

</html>
<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <a href="transaksi_tambah.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Tambah</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>TANGGAL PENJUALAN</th>
              <th>NAMA PELANGGAN</th>
              <th>KASIR</th>
              <th>TOTAL</th>
              <th>OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $UserID = $_SESSION['UserID'];
            $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_penjualan INNER JOIN tb_pelanggan ON tb_pelanggan.PelangganID = tb_penjualan.PelangganID INNER JOIN tb_user ON tb_user.UserID = tb_penjualan.UserID");
            $no = 1;
            while ($transaksi = mysqli_fetch_array($dt_penjualan)) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $transaksi['TanggalPenjualan']; ?></td>
                <td><?php echo $transaksi['NamaPelanggan']; ?></td>
                <td><?php echo $transaksi['NamaUser']; ?></td>
                <td><?php echo "Rp." . number_format($transaksi['TotalHarga']) . ".-"; ?></td>
                <td>
                  <a href="transaksi_invoice_cetak.php?PenjualanID=<?php echo $transaksi['PenjualanID']; ?>" target="_blank" class="btn btn-xs btn-warning" role="button" title="Cetak"><i class="fa fa-print"> Cetak</i></a>
                </td>

              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </section>
</div>
<!-- /.content -->
</div>
<div class="modal fade" id="tambah-transaksi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Produk</h4>
      </div>
      <form action="produk_proses.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="nm_produk">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" name="stok">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Save </button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php

include "footer.php";

?>
</body>

</html>
<?php
include "header.php";
include "../config/koneksi.php"
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-transaksi"><i class="glyphicon glyphicon-plus"></i> Tambah </button>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box box-primary">
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA BARANG</th>
                  <th>JUMLAH</th>
                  <th>SUB TOTAL</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $dt_penjualan = mysqli_query($koneksi, "SELECT max(PenjualanID) as PenjualanID FROM tb_penjualan");
                  $penjualan = mysqli_fetch_array($dt_penjualan);
                  $kode_penjualan = $penjualan['PenjualanID'];
                  $urutan = (int) substr($kode_penjualan, -4, 4);
                  $urutan++;
                  $huruf = date('ymd');
                  $kode_barang = $huruf . sprintf("%04s", $urutan);

                  $dt_jumlah = mysqli_query($koneksi, "SELECT *, SUM(JumlahProduk) AS JumlahProduk FROM tb_detail_penjualan INNER JOIN tb_produk ON tb_produk.ProdukID = tb_detail_penjualan.ProdukID where PenjualanID = '$kode_barang' GROUP BY tb_detail_penjualan.ProdukID");

                  $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_detail_penjualan INNER JOIN tb_produk ON tb_produk.ProdukID = tb_detail_penjualan.ProdukID");
                  $no = 1;
                  while ($penjualan = mysqli_fetch_array($dt_jumlah)) { ?>
                    <td><?= $no++; ?></td>
                    <td><?= $penjualan['NamaProduk']; ?></td>
                    <td><?= $penjualan['JumlahProduk']; ?></td>
                    <td><?= "Rp. " . number_format($penjualan['SubTotal']) . "-,"; ?></td>
                    <td>
                      <a href="transaksi_barang_hapus.php?ProdukID=<?php echo $penjualan['ProdukID']; ?>&PenjualanID=<?php echo $penjualan['PenjualanID']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
              <?php
                  }
              ?>
              <tfoot>
                <tr>

                  <?php
                  $PenjualanID = $kode_barang;
                  //tidak dipasang juga kayaknya tidak apa-apa
                  //-> error $ProdukID = $penjualan['ProdukID'];
                  //bisa di ganti dengan -> $ProdukID = isset($penjualan['ProdukID']) ? $penjualan['ProdukID'] : '';
                  $sub_total_belanja = mysqli_query($koneksi, "SELECT SUM(SubTotal) AS Sub_Total FROM tb_detail_penjualan where PenjualanID ='$PenjualanID'");
                  while ($total_belanja = mysqli_fetch_array($sub_total_belanja)) { ?>
                  <?php
                    $total = +$total_belanja['Sub_Total'];
                  }
                  ?>
                  <td colspan="3">Total Belanja</td>
                  <td colspan="2"><strong><?php echo "Rp. " . number_format($total) . "-,"; ?></strong></td>
                </tr>
              </tfoot>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!--/.box---->
      </div>
      <form action="transaksi_proses.php" method="POST">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <input type="hidden" class="form-control" name="TotalHarga" value="<?php echo $total; ?>">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d') ?>" readonly id="tanggal">
              </div>
              <div class="form-group">
                <label for="trans">Nomor Transaksi</label>
                <input type="text" class="form-control" name="no_trans" value="<?php echo $kode_barang; ?>" id="trans" readonly>
              </div>
              <div class="form-group">
                <label for="kasir">Data Kasir</label>
                <?php
                $UserID = $_SESSION['UserID'];
                $dt_user = mysqli_query($koneksi, "SELECT * FROM tb_user where UserID = '$UserID'");
                while ($user = mysqli_fetch_array($dt_user)) { ?>
                  <input type="hidden" class="form-control" name="UserID" value="<?php echo $user['UserID'] ?>">
                  <input type="text" class="form-control" name="nm_user" value="<?php echo $user['NamaUser'] ?>" readonly id="kasir">

                <?php
                }
                ?>
              </div>
              <div class="form-group">
                <label for="pelanggan">Pilih Pelanggan</label>
                <select name="pelanggan" id="pelanggan" class="form-control">
                  <option value="">--- Pilih Pelanggan ---</option>
                  <?php
                  $dt_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
                  while ($pelanggan = mysqli_fetch_array($dt_pelanggan)) { ?>
                    <option value="<?php echo $pelanggan['PelangganID'] ?>"><?php echo $pelanggan['NamaPelanggan'] ?></option>

                  <?php
                  }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-success pull-right">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<div class="modal fade" id="tambah-transaksi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <form action="transaksi_detail_proses.php" method="POST">
        <div class="modal-body">
          <?php
          $dt_penjualan = mysqli_query($koneksi, "SELECT max(PenjualanID) as PenjualanID FROM tb_penjualan");
          $penjualan = mysqli_fetch_array($dt_penjualan);
          $kode_penjualan = $penjualan['PenjualanID'];
          $urutan = (int) substr($kode_penjualan, -4, 4);
          $urutan++;
          $huruf = date('ymd');
          $kode_barang = $huruf . sprintf("%04s", $urutan);
          ?>
          <div class="form-group">
            <label>Nomor Transaksi</label>
            <input type="text" class="form-control" name="no_trans" value=<?php echo $kode_barang; ?> readonly>
          </div>
          <div class="form-group">
            <label>Pilih Produk</label>
            <select name="produk" id="produk" class="form-control">
              <option value="">-- Pilih Produk --</option>
              <?php
              $dt_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk");
              while ($produk = mysqli_fetch_array($dt_produk)) { ?>
                <option value="<?php echo $produk['ProdukID']; ?>"><?php echo $produk['NamaProduk'] . "(" . $produk['Stok'] . ")"; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Tambah </button>
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
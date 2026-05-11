<?php 
  include "header.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>
  Data Produk
      <small>
    Aplikasi Kasir Sederhana
    </small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Pelanggan</li>
      </ol>
      </section>

      <!-- Main content -->
      <section class="content">
      <div class="box box-primary">
  <div class="box-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-produk"><i class="glyphicon glyphicon-plus"></i> Tambah

  </button>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA PRODUK</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $dt_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk");
            $no = 1;
            while ($produk = mysqli_fetch_array($dt_produk)){ ?>
            <tr> <!-- Pindahkan <tr> ke dalam loop -->
            <td><?php echo $no++; ?></td>
          
            <td><?php echo $produk['NamaProduk']; ?></td>
            <td><?php echo "Rp. " . number_format($produk['Harga']). ",-"; ?></td>
            <td><?php echo $produk['Stok']; ?></td>
            <td>
            <!-- Hilangkan spasi pada id modal -->
            <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-produk<?php echo $produk['ProdukID']; ?>">
            <i class="glyphicon glyphicon-edit"></i>
            </button>
            <div class="modal fade" id="edit-produk<?php echo $produk['ProdukID']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Data PRODUK</h4>
          </div>
          <form action="produk_update.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label>NAMA PRODUK</label>
                  
                  <input type="hidden" class="form-control" name="id_produk" value="<?php echo ($produk['ProdukID']); ?>">
                  <input type="text" class="form-control" name="nm_produk" value="<?php echo ($produk['NamaProduk']); ?>">
                </div>
                <div class="form-group">
                  <label>HARGA</label>
                  <input type="text" class="form-control" name="harga" value="<?php echo "Rp. " . number_format($produk['Harga']).",-"; ?>">
                </div>
                <div class="form-group">
                  <label>STOK</label>
                  <input type="number" class="form-control" name="stok" value="<?php echo ($produk['Stok']); ?>">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"> Update </button>
                </div>
              </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

              <a href="produk_hapus.php?ProdukID=<?php echo $produk ['ProdukID']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus">
              <i class="glyphicon glyphicon-trash"></i>
              </a>
            </td> <!-- Tutup td sebelum tutup tr -->
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
  <div class="modal fade" id="tambah-produk">
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

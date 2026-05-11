  <?php 
  include "header.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>
  Data Pelanggan
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-pelanggan"><i class="glyphicon glyphicon-plus"></i> Tambah

  </button>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA KAMU</th>
            <th>ALAMAT</th>
            <th>NOMOR TELEPON</th>
            <th>OPSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $dt_pelangan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
            $no = 1;
            while ($pelanggan = mysqli_fetch_array($dt_pelangan)){ ?>
            <tr> <!-- Pindahkan <tr> ke dalam loop -->
            <td><?php echo $no++; ?></td>
          
            <td><?php echo $pelanggan['NamaPelanggan']; ?></td>
            <td><?php echo $pelanggan['Alamat']; ?></td>
            <td><?php echo $pelanggan['NomorTelepon']; ?></td>
            <td>
            <!-- Hilangkan spasi pada id modal -->
            <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-pelanggan<?php echo $pelanggan['PelangganID']; ?>">
            <i class="glyphicon glyphicon-edit"></i>
            </button>
            <div class="modal fade" id="edit-pelanggan<?php echo $pelanggan['PelangganID']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Data Pelanggan</h4>
          </div>
          <form action="pelanggan_update.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  
                  <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo ($pelanggan['PelangganID']); ?>">
                  <input type="text" class="form-control" name="nm_pelanggan" value="<?php echo ($pelanggan['NamaPelanggan']); ?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?php echo ($pelanggan['Alamat']); ?>">
                </div>
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_hp" value="<?php echo ($pelanggan['NomorTelepon']); ?>">
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

              <a href="pelanggan_hapus.php?PelangganID=<?php echo $pelanggan ['PelangganID']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus">
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
  <div class="modal fade" id="tambah-pelanggan">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Data Pelanggan</h4>
          </div>
          <form action="pelanggan_proses.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input type="text" class="form-control" name="nm_pelanggan">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_hp">
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

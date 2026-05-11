<?php 
include "../config/koneksi.php";

//Tutorial Menangkap si Hitam >.<

$ProdukID = $_GET['ProdukID'];
$PenjualanID = $_GET['PenjualanID'];

//Menghitung Stok ternew
$jmk_stok = mysqli_query($koneksi,"SELECT JumlahProduk FROM tb_detail_penjualan where ProdukID='$ProdukID' AND PenjualanID = '$PenjualanID'");
$jml = mysqli_fetch_assoc($jmk_stok);
$stok = mysqli_query($koneksi, "SELECT Stok from tb_produk Where ProdukID='$ProdukID'");
$s = mysqli_fetch_assoc($stok);

//Penjumlahan
$up_stok = implode($s) + implode($jml);

//Update Stok
mysqli_query($koneksi, "UPDATE tb_produk SET Stok = '$up_stok' where ProdukID = '$ProdukID'");

//Menghapus Data Dari tb_detail_penjualan
mysqli_query($koneksi, "DELETE FROM tb_detail_penjualan where ProdukID= '$ProdukID' AND PenjualanID ='$PenjualanID'");

header("Location:transaksi_tambah.php");
?>
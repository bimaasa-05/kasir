<?php 
include "../config/koneksi.php";

$no_trans = $_POST['no_trans'];
$ProdukID = $_POST['produk'];
$JumlahProduk = $_POST['jumlah'];

//Menghitung Subtotal
$st = mysqli_query($koneksi, "SELECT Harga FROM tb_produk where ProdukID = '$ProdukID'");
$harga = mysqli_fetch_assoc($st);
$sub_total = implode($harga) * $JumlahProduk;

//Insert Data => tb_detail_penjualan
mysqli_query($koneksi, "INSERT INTO tb_detail_penjualan values ('', '$no_trans', '$ProdukID', '$JumlahProduk', '$sub_total')");

//Menghitung Stok Terbaru
$stok = mysqli_query($koneksi, "SELECT Stok FROM tb_produk where ProdukID = '$ProdukID'");
$s =mysqli_fetch_assoc($stok);
$Update = implode($s)-$JumlahProduk;

//Update Data Stok
mysqli_query($koneksi, "UPDATE tb_produk set Stok = '$Update' where ProdukID ='$ProdukID'");

header("Location:transaksi_tambah.php");
?>
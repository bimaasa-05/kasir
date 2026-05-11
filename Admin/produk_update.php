<?php 
include "../config/koneksi.php";

//Mengambil data yang dikirim dari modal Edit data pelanggan 

$ProdukID = $_POST['id_produk'];
$NamaProduk = $_POST['nm_produk'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];

mysqli_query($koneksi, "UPDATE tb_produk set NamaProduk = '$NamaProduk', Harga = '$Harga', Stok = '$Stok' where ProdukID = '$ProdukID'");

header("location:produk_data.php");
?>
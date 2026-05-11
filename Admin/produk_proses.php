<?php 
require "../config/koneksi.php";

//Mengambil data yang dikirim dari modal tambah data pelanggan 

$NamaProduk = $_POST['nm_produk'];
$Harga = $_POST['harga'];
$Stok = $_POST['stok'];

mysqli_query($koneksi, "INSERT into tb_produk values ('','$NamaProduk', '$Harga', '$Stok')");

header("location:produk_data.php");
?>
<?php 
include "../config/koneksi.php";

$total = $_POST['TotalHarga'];
$tanggal = $_POST['tanggal'];
$no_trans = $_POST['no_trans'];
$UserID = $_POST['UserID'];
$PelangganID = $_POST['pelanggan'];

mysqli_query($koneksi, "INSERT INTO tb_penjualan values('$no_trans', '$tanggal', '$total', '$PelangganID', '$UserID')");

header("Location: transaksi_data.php");

?>
<?php 
include "../config/koneksi.php";

//Mengambil PelangganID Dari URL

$PelangganID = $_GET['PelangganID'];

//Query Untuk Menghapus Data

mysqli_query($koneksi, " DELETE FROM tb_pelanggan WHERE PelangganID = '$PelangganID'");

header("location:pelanggan_data.php")
?>
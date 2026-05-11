<?php 
include "../config/koneksi.php";

//Mengambil PelangganID Dari URL

$UserID = $_GET['UserID'];

//Query Untuk Menghapus Data

mysqli_query($koneksi, " DELETE FROM tb_user WHERE UserID = '$UserID'");

header("location:kasir_data.php")
?>
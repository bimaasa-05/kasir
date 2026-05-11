<?php
include "../config/koneksi.php";

//mengambil PelangganID Dari URL
$ProdukID = $_GET['ProdukID'];

//Query Untuk Menghapus Data
mysqli_query($koneksi, "DELETE from tb_produk where ProdukID = '$ProdukID'");

header("location:produk_data.php");
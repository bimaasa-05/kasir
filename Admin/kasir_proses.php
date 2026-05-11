<?php
include "../config/koneksi.php";

//Mengambil data yang dikirim Dari modal tambah data Kasir / Petugas

$NamaUser = $_POST['nm_user'];
$Username = $_POST['username'];
$Password = md5($_POST['password']) ;
$Role = "Petugas";

mysqli_query($koneksi, "INSERT INTO tb_user values ('','$NamaUser','$Username','$Password', '$Role')");

header("location:kasir_data.php");
<?php 


$localhost = "localhost";
$username  = "root";
$password  = "";
$database  = "kasir_bm"; // Tidak boleh pakai tanda minus (-)

// Membuat koneksi
$koneksi = mysqli_connect($localhost, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "";
}

?>

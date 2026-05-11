<?php
include "config/koneksi.php";
$namauser= $_POST['nm_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$akses = $_POST['role'];

if (empty($namauser)) {
    echo "
    <script>
    alert('Tolong isi terlebih dahulu');
    document.location.href = 'register.php';
    </script>
    ";
    exit;
}elseif (empty($username)){
    echo "
    <script>
    alert('Tolong isi terlebih dahulu');
    document.location.href = 'register.php';
    </script>
    ";
    exit;
}elseif (empty($password)){
    echo "
    <script>
    alert('Tolong isi terlebih dahulu');
    document.location.href = 'register.php';
    </script>
    ";
    exit;
}

//Input Data KE DAta base
$register = mysqli_query($koneksi, "INSERT into tb_user values ('', '$namauser', '$username', '$password', '$akses')");


    if ($register > 0 ) {
 //Memunculkan Pop up
    echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
        }else {
            echo "
            <script>
            alert('Data gagal ditambahkan');
            document.location.href = 'register.php';
            </script>
            ";
        }

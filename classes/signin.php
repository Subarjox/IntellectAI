<?php
session_start();
include "koneksi.php";

// Ambil data dari form
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($koneksi, $_POST['password']) : '';

$query = "INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES (NULL, '$nama', '$email', '$password', 'premium');";
$insert= mysqli_query($koneksi, $query);

if ($insert){
   echo " <script text='text/javascript'>
   alert('Berhasil daftar, silahkan login!');
   window,location.href='../pages/sign-in.php';
   </script>";

} else {
    echo "<script>
            alert('Gagal daftar, silahkan coba lagi!');

          </script>";
}
?>

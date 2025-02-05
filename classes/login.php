<?php
session_start();
include "koneksi.php";

// Ambil data dari form
$email = isset($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($koneksi, $_POST['password']) : '';

// Query untuk memeriksa keberadaan pengguna dengan status aktif
$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Simpan informasi user ke dalam session
    $_SESSION['id'] = $user['id']; // ID pengguna
    $_SESSION['role'] = $user['role']; // Role (guru/murid)

    // Redirect berdasarkan role
    if ($_SESSION['role'] == 'premium') {
        header("Location: ../pages/main/dashboard.php");

    } elseif ($_SESSION['role'] == 'free') {
        header("Location: ../pages/main/sign-in.php");
    }
    exit();
} else {
    echo "<script>
            alert('Login Gagal, Email atau Password salah!');
            window.location.href = '../pages/sign-in.php';
          </script>";
}
?>

<?php
// Username dan password yang sudah terdefinisi
$expectedUsername = "admin";
$expectedPassword = "password123";

// Validasi username dan password yang dimasukkan oleh pengguna
$username = $_POST['username'];
$password = $_POST['password'];

// Periksa apakah username dan password sesuai dengan yang sudah terdefinisi
if ($username === $expectedUsername && $password === $expectedPassword) {
    // Jika sesuai, alihkan ke halaman admin_dashboard.php
    header('Location: admin_dashboard.php');
} else {
    // Jika tidak sesuai, kembalikan ke halaman login dengan pesan kesalahan
    header('Location: login.html?error=true');
}
?>


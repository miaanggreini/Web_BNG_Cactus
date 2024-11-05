<?php
include 'koneksi.php';

// Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menggunakan rand() untuk menghasilkan order_id acak
    $order_id = rand(100000, 999999);  // Menghasilkan angka acak antara 100000 dan 999999
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $alamat = $_POST["alamat"];
    $produk = $_POST["produk"];
    $jumlah = $_POST["jumlah"];
    $total_harga = input ($_POST["totalPrice"]);

    // Query untuk menyimpan data ke dalam tabel koneksi termasuk order_id
    $sql = "INSERT INTO koneksi (order_id, name, email, phone, alamat, produk, jumlah, total_harga) 
            VALUES ('$order_id', '$name', '$email', '$phone', '$alamat', '$produk', '$jumlah', '$total_harga')";
if (mysqli_query($conn, $sql)) {
    header("Location:midtrans/examples/snap/checkout-process.php?order_id=$order_id");
    exit();
} else {
    echo "<div class='alert alert-danger'> Data gagal disimpan: " . mysqli_error($kon) . "</div>";
}
}
?>

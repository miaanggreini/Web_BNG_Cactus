<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pembayaran";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// // Ambil data dari AJAX request
// $order_id = rand(1000000, 999999);
// $name = isset($_POST['name']) ? $_POST['name'] : '';
// $email = isset($_POST['email']) ? $_POST['email'] : '';
// $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
// $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
// $cart = isset($_POST['cart']) ? json_decode($_POST['cart'], true) : [];

// // Periksa apakah semua field diisi dan cart tidak kosong
// if ($name && $email && $phone && $alamat && !empty($cart)) {
//     foreach ($cart as $item) {
//         $produk = $item['name'];
//         $jumlah = $item['quantity'];
//         $total_harga = $item['totalPrice'];

//         // SQL untuk insert data
//         $sql = "INSERT INTO koneksi (order_id, name, email, phone, alamat, produk, jumlah, total_harga) VALUES ('$order_id', '$name', '$email', '$phone', '$alamat', '$produk', '$jumlah', '$total_harga')";

//         if ($conn->query($sql) !== TRUE) {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//             exit;
//         }
//     }
//     echo "New record created successfully";
// } else {
//     // echo "All fields are required!";
// }
// header("location:./bng/Responsive_Webage_Home-main/midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id");
// // // Tutup koneksi
// // $conn->close();
// // ?>

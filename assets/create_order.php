<?php
include 'koneksi.php';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];

    // Query untuk menyimpan data ke dalam database
    $sql = "INSERT INTO koneksi (name, email, phone, alamat, produk, jumlah, total_harga) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Persiapkan statement
    $stmt = $conn->prepare($sql);

    // Bind parameter ke statement
    $stmt->bind_param("sssssss", $name, $email, $phone, $alamat, $produk, $jumlah, $total_harga);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Redirect ke halaman admin_dashboard.php setelah data berhasil disimpan
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Jika terjadi kesalahan dalam eksekusi statement
        echo "Error creating record: " . $conn->error;
    }

    // Tutup statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Create Order</h1>
    <form method="post">
        <!-- Form input fields -->
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="phone" placeholder="Phone"><br>
        <textarea name="alamat" placeholder="Alamat"></textarea><br>
        <input type="text" name="produk" placeholder="Produk"><br>
        <input type="number" name="jumlah" placeholder="Jumlah"><br>
        <input type="text" name="total_harga" placeholder="Total Harga"><br>
        <!-- Tombol Create -->
        <input type="submit" value="Create">
    </form>
</body>
</html>

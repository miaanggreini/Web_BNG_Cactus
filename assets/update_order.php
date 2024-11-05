<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM koneksi WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Order not found";
        exit;
    }
} else {
    echo "No order ID specified";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];

    $sql = "UPDATE koneksi SET name='$name', email='$email', phone='$phone', alamat='$alamat', produk='$produk', jumlah='$jumlah', total_harga='$total_harga' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Order</h1>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"><br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"><br>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>"><br>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat"><?php echo $row['alamat']; ?></textarea><br>
            <label for="produk">Produk:</label>
            <input type="text" name="produk" id="produk" value="<?php echo $row['produk']; ?>"><br>
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" value="<?php echo $row['jumlah']; ?>"><br>
            <label for="total_harga">Total Harga:</label>
            <input type="text" name="total_harga" id="total_harga" value="<?php echo $row['total_harga']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>

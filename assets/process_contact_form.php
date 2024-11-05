<?php
// Koneksi ke database
include "koneksi.php";

// Tangkap data dari form
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Periksa apakah semua field diisi
if ($name && $email && $subject && $message) {
    // SQL untuk insert data
    $sql = "INSERT INTO contactus (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "All fields are required!";
}

// Tutup koneksi setelah selesai melakukan operasi query
$conn->close();
?>

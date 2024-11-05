<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    // Persiapkan prepared statement untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM koneksi WHERE id = ?";
    
    // Persiapkan statement
    $stmt = $conn->prepare($sql);

    // Jika statement berhasil disiapkan
    if ($stmt) {
        // Bind parameter ke statement
        $stmt->bind_param("i", $_GET['id']);

        // Eksekusi statement
        if ($stmt->execute()) {
            // Jika penghapusan berhasil, alihkan kembali ke admin_dashboard.php
            header("Location: admin_dashboard.php");
            exit;
        } else {
            // Jika terjadi kesalahan dalam eksekusi statement
            echo "Error deleting record: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        // Jika terjadi kesalahan dalam menyiapkan statement
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    // Jika tidak ada ID yang disediakan
    echo "No order ID specified";
    exit;
}

// Tutup koneksi
$conn->close();
?>

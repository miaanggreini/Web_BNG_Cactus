<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        a {
            text-decoration: none;
            color: blue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            margin: 0 5px;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-align: center;
        }
        td a.delete {
            background-color: #dc3545;
        }
        td a.update {
            background-color: #1e90FF;
        }
        td a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 20px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .button:hover {
            background-color: #218838;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px; /* Sesuaikan lebar input */
        }
        .search-container button {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #45a049;
        }
        .logout-button {
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
            text-align: center;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="search-container">
            <form method="GET">
                <input type="text" name="search" id="searchInput" placeholder="Search...">
                <button type="submit" class="button">Search</button>
            </form>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
        <a href="create_order.php" class="button">Create New Order</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM koneksi WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR alamat LIKE '%$search%' OR produk LIKE '%$search%' OR jumlah LIKE '%$search%' OR total_harga LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM koneksi";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["produk"] . "</td>";
                        echo "<td>" . $row["jumlah"] .  "</td>";
                        echo "<td>" . $row["total_harga"] . "</td>";
                        echo '<td>
                                <a href="update_order.php?id=' . $row["id"] . '" class="update">Update</a> |
                                <a href="delete_order.php?id=' . $row["id"] . '" class="delete" onclick="return confirm(\'Are you sure you want to delete this order?\')">Delete</a>
                              </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No orders found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const deleteLinks = document.querySelectorAll('a.delete');
            deleteLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!confirm('Are you sure you want to delete this order?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>

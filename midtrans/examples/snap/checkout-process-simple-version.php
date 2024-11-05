<?php
namespace Midtrans;
// Set Your server key
require_once dirname(__FILE__) . '/../../Midtrans.php';
Config::$serverKey = 'SB-Mid-server-8PrwlEoNKqZ08XeNnxiCdi_Y';
Config::$clientKey = 'SB-Mid-client-k0vtGT62fQQEOl6v';

// Uncomment for production environment
Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// Get order ID from query string
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;

include ('../../../koneksi.php');

if ($order_id) {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pembayaran";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch order details from the database
    $sql = "SELECT * FROM koneksi WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $order = $result->fetch_assoc();
    $stmt->close();

    if ($order) {
        // Prepare transaction details
        $transaction_details = array(
            'order_id' => $order_id,
            'gross_amount' => $order['totalPrice'], // total price
        );

        // Prepare item details
        $item_details = array (
            array(
                'id' => 'a1',
                'price' => $order['total_harga'],
                'quantity' => $order['jumlah'],
                'name' => $order['produk']
            ),
        );

        // Prepare customer details
        $customer_details = array(
            'first_name'    => $order['name'],
            'last_name'     => '',
            'email'         => $order['email'],
            'phone'         => $order['phone'],
        );

        // Fill transaction details
        $transaction = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        $snap_token = '';
        try {
            $snap_token = Snap::getSnapToken($transaction);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    } else {
        echo "Order not found!";
        exit;
    }
} else {
    echo "Invalid order ID!";
    exit;
}

?>

<!DOCTYPE html>
<html>
    <body>
        <button id="pay-button">Pay!</button>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>');
            };
        </script>
    </body>
</html>

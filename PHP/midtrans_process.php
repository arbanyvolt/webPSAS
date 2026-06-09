<?php
session_start();
header('Content-Type: application/json');

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once 'koneksi_midtrans.php';
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'You must be logged in to checkout.']);
    exit;
}

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = MIDTRANS_SERVER_KEY;
\Midtrans\Config::$isProduction = MIDTRANS_IS_PRODUCTION;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$order_id = 'ORD-' . time();
$gross_amount = (int)$input['total'];
$name = $input['name'];
$email = $input['email'];
$address = isset($input['address']) ? mysqli_real_escape_string($conn_midtrans, $input['address']) : '';
$latitude = isset($input['latitude']) ? mysqli_real_escape_string($conn_midtrans, $input['latitude']) : '';
$longitude = isset($input['longitude']) ? mysqli_real_escape_string($conn_midtrans, $input['longitude']) : '';

$params = [
    'transaction_details' => [
        'order_id' => $order_id,
        'gross_amount' => $gross_amount,
    ],
    'customer_details' => [
        'first_name' => $name,
        'email' => $email,
        'phone' => $input['phone'],
    ],
];

try {
    // Hapus data pending yang sudah lebih dari 5 menit (Backup jika Event Scheduler mati)
    mysqli_query($conn_midtrans, "DELETE FROM orders WHERE status = 'pending' AND created_at < NOW() - INTERVAL 5 MINUTE");

    // Simpan data awal ke database dengan status 'pending'
    $query = "INSERT INTO orders (order_id, user_id, user_email, name, email, address, latitude, longitude, amount, status) VALUES ('$order_id', '$user_id', '$user_email', '$name', '$email', '$address', '$latitude', '$longitude', '$gross_amount', 'pending')";
    mysqli_query($conn_midtrans, $query);

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    echo json_encode(['token' => $snapToken, 'order_id' => $order_id]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

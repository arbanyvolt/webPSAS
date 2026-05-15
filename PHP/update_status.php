<?php
header('Content-Type: application/json');
require_once 'koneksi_midtrans.php';

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$order_id = $input['order_id'];
$status = $input['status'];

$query = "UPDATE orders SET status = '$status' WHERE order_id = '$order_id'";
if (mysqli_query($conn_midtrans, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => mysqli_error($conn_midtrans)]);
}
?>

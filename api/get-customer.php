<?php
require '../db.php';
header('Content-Type: application/json');

$id = $_GET['id_customer'] ?? '';

if ($id === '') {
    echo json_encode(["error" => "ID not found"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM customer WHERE id_customer = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["error"=> "Customer not found"]);
    exit;
}

echo json_encode($result->fetch_assoc());

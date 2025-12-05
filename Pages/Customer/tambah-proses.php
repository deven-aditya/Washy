<?php
require '../../db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /WASHY/Pages/Customer/tambah.php');
    exit;
}

$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$house_address = trim($_POST['house_address'] ?? '');
$email_address = trim($_POST['email_address'] ?? '');
$phone_number = trim($_POST['phone_number'] ?? '');

// if (!$first_name || !$last_name || !$house_address || !$email_address || !$phone_number) {
//     echo json_encode(["status" => "error", "message" => "Masih ada yang kosong atau belum diisi"]);
//     exit;
// }

$sql = "INSERT INTO customer (first_name, last_name, house_address, email_address, phone_number)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

$stmt->bind_param("sssss", $first_name, $last_name, $house_address, $email_address, $phone_number);

if ($stmt->execute()) {
    header("Location: /WASHY/Pages/Customer/index.php?msg=created");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
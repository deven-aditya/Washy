<?php
require '../../db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /WASHY/Pages/Transaction/tambah.php');
    exit;
}

$nama_customer = trim($_POST['nama_customer'] ?? '');
$service_type  = trim($_POST['service_type'] ?? '');
$weight        = isset($_POST['weight']) ? (float) $_POST['weight'] : 0;

if (empty($nama_customer) || $nama_customer === 'null' || empty($service_type) || $weight <= 0) {
    echo "Masih ada data yang kosong.<br>";
    echo "Nama Customer: '$nama_customer'<br>";
    echo "Service Type: '$service_type'<br>";
    echo "Weight: $weight<br>";
    exit;
}

$nameParts = explode(' ', $nama_customer, 2);
$firstName = isset($nameParts[0]) ? trim($nameParts[0]) : '';
$lastName = isset($nameParts[1]) ? trim($nameParts[1]) : '';

$sql_cust = "SELECT id_customer FROM Customer WHERE (first_name = ? AND last_name = ?) OR (first_name = ? AND last_name = '') LIMIT 1";
$stmt_cust = $conn->prepare($sql_cust);

if (!$stmt_cust) {
    die('Prepare failed: ' . $conn->error);
}

$stmt_cust->bind_param("sss", $firstName, $lastName, $firstName);
$stmt_cust->execute();
$result_cust = $stmt_cust->get_result();

if ($result_cust->num_rows === 0) {
    echo "Customer tidak ditemukan di database.";
    exit;
}

$row = $result_cust->fetch_assoc();
$id_customer = $row['id_customer'];
$stmt_cust->close();

$price = 0;
if ($service_type === 'Express') {
    $price = 12000 * $weight;
} elseif ($service_type === 'Regular') {
    $price = 6000 * $weight;
} else {
    echo "Service type tidak valid.";
    exit;
}

$sql = "INSERT INTO transaction_data (id_customer, service_type, weight, price) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

$stmt->bind_param("isdd", $id_customer, $service_type, $weight, $price);

if ($stmt->execute()) {
    header("Location: /WASHY/Pages/Transaction/index.xhtml?msg=created");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
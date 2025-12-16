<?php
header("Content-Type: application/json");
require "../db.php";
session_start();

if (!isset($_SESSION['id_user'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);

    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM users WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data ?? []);
?>
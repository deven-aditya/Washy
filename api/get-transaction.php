<?php 

header("Content-Type: application/json");
require "../db.php";

$id = isset($_GET['id_transaction']) ? (int) $_GET['id_transaction'] : 0;

if ($id <= 0) {
    echo json_encode([]);
    exit;
}

$sql = "
    SELECT *
    FROM transaction_data t
    JOIN customer c ON t.id_customer = c.id_customer
    WHERE t.id_transaction = ?
    LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data ?? []);

?>
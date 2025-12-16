<?php

require '../../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /WASHY/Pages/Transaction/edit.xhtml');
    exit;
}

if (isset($_POST['submit'])) {

    $weight = floatval($_POST['weight']);
    $service_type = $_POST['service_type'];
    $id_trans = $_POST['id_transaksi'];

    $price = 0;
    if ($service_type === 'Express') {
        $price = 12000 * $weight;
    } elseif ($service_type === 'Regular') {
        $price = 6000 * $weight;
    } 

    $sql = "UPDATE transaction_data 
            SET weight = ?, service_type = ?, price = ?
            WHERE id_transaction = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("dsdi", $weight, $service_type, $price, $id_trans);

    if ($stmt->execute()) {
        header("Location: /WASHY/Pages/Transaction/index.xhtml?msg=updated");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    header('Location: /WASHY/Pages/Transaction/index.xhtml');
    exit;
}


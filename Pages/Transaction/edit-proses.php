<?php

require '../../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /WASHY/Pages/Transaction/edit.php');
    exit;
}

if (isset($_POST['submit'])) {

    $weight = $_POST['weight'];
    $service_type = $_POST['service_type'];
    $id_trans = $_POST['id_transaksi'];

    $sql = "UPDATE transaction_data 
            SET weight = ?, service_type = ?
            WHERE id_transaction = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("dsi", $weight, $service_type, $id_trans);

    if ($stmt->execute()) {
        header("Location: /WASHY/Pages/Transaction/index.php?msg=updated");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    header('Location: /WASHY/Pages/Transaction/index.php');
    exit;
}


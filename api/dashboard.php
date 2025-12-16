<?php
    header("Content-Type: application/json");
    require "../db.php";
    session_start();

    //total pendapatan
    $queryPendapatan = $conn->query("SELECT SUM(price) as total_income FROM transaction_data");
    $pendapatan = $queryPendapatan->fetch_assoc()['total_income'] ?? 0;

    $queryTransaksi = $conn->query('SELECT COUNT(*) AS jumlah_transaksi FROM transaction_data');
    $jumlahTransaksi = $queryTransaksi->fetch_assoc()['jumlah_transaksi'] ?? 0;

    $queryCustomer = $conn->query('SELECT COUNT(*) AS jumlah_customer FROM customer');
    $jumlahCustomer = $queryCustomer->fetch_assoc()['jumlah_customer'] ?? 0;

    echo json_encode([
        "total_income" => $pendapatan,
        "total_transaction"=> $jumlahTransaksi,
        "total_customer" => $jumlahCustomer,
    ])
?>
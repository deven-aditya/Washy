<?php
    require "../../db.php";
    session_start();

    //total pendapatan
    $queryPendapatan = $conn->query("SELECT SUM(price) as total_income FROM transaction_data");
    $pendapatan = $queryPendapatan->fetch_assoc()['total_income'] ?? 0;

    $queryTransaksi = $conn->query('SELECT COUNT(*) AS jumlah_transaksi FROM transaction_data');
    $jumlahTransaksi = $queryTransaksi->fetch_assoc()['jumlah_transaksi'] ?? 0;

    $queryCustomer = $conn->query('SELECT COUNT(*) AS jumlah_customer FROM customer');
    $jumlahCustomer = $queryCustomer->fetch_assoc()['jumlah_customer'] ?? 0;
?>

<!DOCTYPE html >
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Washy</title>
        <link rel="icon" class="icon-logo" href="/WASHY/img/Icon.png" type="image/png"/>
        <link rel="stylesheet" href="/WASHY/css/style.css" type="text/css" media="screen" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="sidebar"> <!--jgn diubah-->
            <img class="logo" src="/WASHY/img/Logo.png"/>

            <div class="button-sidebar">
                <ul class="menu menu-main">
                    <li>
                        <a href="/Washy/Pages/Dashboard/index.php" class="menu-button active">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/dashboard_button.png"/>
                            </div>
                            <div class="menu-text">
                                Dashboard
                            </div>
                        </a>
                        
                    </li>
                    <li>
                        <a href="/Washy/Pages/Customer/index.php" class="menu-button">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/customer_button.png"/>
                            </div>
                            <div class="menu-text">
                                Customer
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/Washy/Pages/Transaction/index.php" class="menu-button">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/transaction_button.png"/>
                            </div>
                            <div class="menu-text">
                                Transaction
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="menu menu-settings">
                    <li>
                        <a href="/Washy/Pages/Account/index.php" class="menu-button">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/account_button.png"/>
                            </div>
                            <div class="menu-text">
                                Account
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h1>DASHBOARD</h1>
                    <h3><?php echo date("d F Y"); ?></h3>
                </div>
                
            </div>

            <div class="page-body">
                <div class="income">
                    <h4>Total Income</h4>
                    <h1>Rp <?= number_format($pendapatan, 0, ',', ',') ?></h1>
                </div><br>

                <div class="reports">
                    <div class="customer-count">
                        <h2><?= $jumlahTransaksi ?></h2>
                    </div>

                    <div class="transaction-total">
                        <h2><?= $jumlahCustomer ?></h2>
                    </div>
                </div>
            </div>

            </div>
        </div>
        
    </body>
</html>
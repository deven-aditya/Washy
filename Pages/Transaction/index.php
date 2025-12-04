<?php
    include("../../db.php");

    $search = $_GET['search'] ?? '';

    if($search)
    {
        $search = $conn->real_escape_string($search);

        $sql = "
            SELECT * from transaction_data t
            JOIN customer c ON (t.id_customer=c.id_customer)
            WHERE
            c.first_name LIKE '%$search%' OR
            c.last_name LIKE '%$search%' OR
            t.service_type LIKE '%$search%' OR
            t.price LIKE '%$search%' OR
            t.weight LIKE '%$search%' OR
            t.id_transaction LIKE '%$search%'
        ";
        $query = $conn->query($sql);
    } else{
        $query = $conn->query("SELECT * FROM transaction_data t JOIN customer c ON t.id_customer=c.id_customer");
    }

    $trans=[];

    if($query->num_rows!=0){
        while($row=$query->fetch_assoc()){
            $trans[]=$row;
        }
    } 

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
        <div class="sidebar"> <!--jgn diubahh-->
            <img class="logo" src="/WASHY/img/Logo.png"/>

            <div class="button-sidebar">
                <ul class="menu menu-main">
                    <li>
                        <a href="/WASHY/Pages/Dashboard/index.php" class="menu-button">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/dashboard_button.png"/>
                            </div>
                            <div class="menu-text">
                                Dashboard
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/WASHY/Pages/Customer/index.php" class="menu-button">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/customer_button.png"/>
                            </div>
                            <div class="menu-text">
                                Customer
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/WASHY/Pages/Transaction/index.php" class="menu-button active">
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
                    <h1>TRANSACTION</h1>
                    <h3><?php echo date("d F Y"); ?></h3>
                </div>
                
                <a href="/WASHY/Pages/Transaction/tambah.php" class="add-btn">+ Add New</a>
            </div>

            <div class="page-body">
                <div class="search-section">
                    <form method="GET">
                        <input type="text" name="search" class="search-customer-box" id="search" value="<?= $_GET['search'] ?? '' ?>" placeholder="search"/>
                        
                        <button class="search-icon-box">
                            <img class="search-icon" src="/WASHY/img/search_icon.png"/>
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-section">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CUSTOMER NAME</th>
                            <th>SERVICE TYPE</th>
                            <th>WEIGHT</th>
                            <th>PRICE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($trans as $t): ?>
                        <tr>
                            <td><?=  $t['id_transaction'] ?></td>
                            <td><?= $t['first_name'].' '. $t['last_name'] ?></td>
                            <td><?=  $t['service_type'] ?></td>
                            <td><?= $t['weight'] ?></td>
                            <td><?= $t['price'] ?></td>
                            <td>
                                <input type="hidden" name="id_transaksi" value=<?= $t['id_transaction'] ?>>
                                <div class="action-button">
                                    <button type="submit" class="edit-button">
                                        <a href="/WASHY/Pages/Transaction/edit.php?id_transaction=<?= $t['id_transaction'] ?>">EDIT</a> 
                                    </button>
                                    <button class="delete-button">
                                        <a href="/WASHY/Pages/Transaction/delete.php?id_transaction=<?= $t['id_transaction'] ?>" onclick="return confirm('Yakin ingin hapus data transaksi ini?')">DELETE</a>
                                    </button>
                                </div>
                                
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </body>
</html>
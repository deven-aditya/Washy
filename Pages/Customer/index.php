<?php
    include("../../db.php");

    $search = $_GET['search'] ?? '';

    if($search)
    {
        $search = $conn->real_escape_string($search);

        $sql = "
            SELECT * FROM customer WHERE
            id_customer LIKE '%$search%' OR
            first_name LIKE '%$search%' OR
            last_name LIKE '%$search%' OR
            house_address LIKE '%$search%' OR
            email_address LIKE '%$search%' OR
            phone_number LIKE '%$search%'
        ";

        $query = $conn->query($sql);
    } else{
        $query = $conn->query("SELECT * FROM customer");
    }

    $customers = [];  
    
    if($query->num_rows == 0) {
        echo '<tr><td>Tidak Ada Data!</td></tr>';
    } else {
        while($row = $query->fetch_assoc()) {
            $customers[] = $row;
        }
    }
?>

<!DOCTYPE html >
<html>    <head>
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
                        <a href="/Washy/Pages/Dashboard/index.php" class="menu-button">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/dashboard_button.png"/>
                            </div>
                            <div class="menu-text">
                                Dashboard
                            </div>
                        </a>
                        
                    </li>
                    <li>
                        <a href="/Washy/Pages/Customer/index.php" class="menu-button active">
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
                    <h1>CUSTOMER</h1>
                    <h3><?php echo date("d F Y"); ?></h3>
                </div>
                
                <a href="/WASHY/Pages/Customer/tambah.php" class="add-btn">+ Add New</a>
            </div>

            <div class="page-body">
                <div class="search-section">
                    <form method="GET">
                        <input type="text" name="search" class="search-customer-box" id="search" value="<?= $_GET['search'] ?? '' ?>" placeholder="search"/>
                        
                        <button class="search-icon-box" type="submit">
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
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>HOME ADDRESS</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $c): ?>
                        <tr>
                            <td><?= $c['id_customer'] ?></td>
                            <td><?=  $c['first_name'] ?></td>
                            <td><?=  $c['last_name'] ?></td>
                            <td><?=  $c['house_address'] ?></td>
                            <td><?=  $c['email_address'] ?></td>
                            <td><?=  $c['phone_number'] ?></td>
                            <td>
                                <div class="action-button">
                                    <button class="edit-button">
                                        <a href="/WASHY/Pages/Customer/edit.php?id_customer=<?= $c['id_customer'] ?>">EDIT</a> 
                                    </button>
                                    <button class="delete-button">
                                        <a href="/WASHY/Pages/Customer/delete.php?id_customer=<?= $c['id_customer'] ?>" onclick="return confirm('Yakin ingin hapus data customer ini?')">DELETE</a>
                                    </button>
                                </div>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
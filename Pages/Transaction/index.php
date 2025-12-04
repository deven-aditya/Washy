<?php
    include("../../db.php");

    $search = $_GET['search'] ?? '';
    if($search)
    $search = $conn->real_escape_string($search);

    if($search)
    {
        $search = $conn->real_escape_string($search);

        $sql="SELECT * from transaction_data t join customer c 
        on (t.id_customer=c.id_customer) where 
        c.first_name = ' %$search% ' ";
        $query = $conn->query($sql);
    } else{
        $query = $conn->query("SELECT * FROM transaction_data t join customer c 
        on (t.id_customer=c.id_customer)");
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
                <h3>24 Juni 2005</h3>
                </div>
                
                <a href="/WASHY/Pages/Transaction/tambah.php" class="add-btn">+ Add New</a>
            </div>

            <div class="page-body">
                <div class="search-section">
                    <form method="GET">
                        <input type="text" class="search-customer-box" id="search-customer" name="search-customer" placeholder="search"/>
                        
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
                                <form  action="/WASHY/Pages/Transaction/edit.php" method="POST">
                                    <input type="hidden" name="id_transaksi" value=<?= $t['id_transaction'] ?>>
                                    <div class="action-button">
                                    <button type="submit" class="edit-button">EDIT
                                    </button>
                                    <button class="delete-button">
                                        DELETE
                                    </button>
                                </div>
                                </form>
                                
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </body>
</html>
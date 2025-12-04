<?php
    include("../../db.php");
    $search=$_POST['id_transaksi'];

    $sql="SELECT * from transaction_data t join customer c 
        on (t.id_customer=c.id_customer) where 
        t.id_transaction = $search";

    $query=$conn->query($sql);

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
        <div class="sidebar"> <!--jgn diubah-->
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
                    <div class="breadcrumb">
                        <a href="/WASHY/Pages/Transaction/index.php">Transaction</a>
                        <span>></span>
                        <p class="current">Edit</p>
                    </div>
                    <h1>Edit Transaction</h1>
                </div>
                
            </div>

            <div class="form-section">
                <form action="/WASHY/Pages/Transaction/edit-proses.php" method="POST">
                    <input type="hidden" name="id_transaksi" value=<?= $trans[0]['id_transaction'] ?>>
                    <label for="nama_customer">Customer</label><br>
                    <select class="dropdown" name="nama_customer" readonly>
                        <?php foreach($trans as $c): ?>
                        <option value=<?php echo $c['first_name'].' '. $c['last_name']?>><?= $c['first_name'].' '. $c['last_name'] ?></option>
                        <?php  endforeach; ?>
                    </select><br><br>
                    <?= $trans[0]['first_name'].' '. $trans[0]['last_name'] ?>" 
                    
                    <label for="service_type">Service Type</label><br>
                    <select class="dropdown" name="service_type">
                        <option value="" disabled selected hidden>Choose Service Type</option>
                        <option value="Regular">Regular</option>
                        <option value="Express">Express</option>
                    </select><br><br>

                    <label for="weight">Laundry Weight</label><br>
                    <input type="weight" name="weight" class="input-box" placeholder="Input Laundry Weight"/>
                    <br><br>

                    <div class="price">
                        <h4>Total Price</h4>
                        <h1><?= $trans[0]['price'] ?></h1>
                    </div><br>

                    <input type="submit" name="submit" class="add-btn"/>

                </form>

        </div>
    </body>
</html>
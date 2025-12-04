<?php
    include("../../db.php");
    $sql="SELECT first_name, last_name FROM Customer";

    $query=$conn->query($sql);

    $customer=[];

    if($query->num_rows!=0){
        while($row=$query->fetch_assoc()){
            $customer[]=$row;
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
        <script src="/WASHY/js/script.js"></script>
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
                    <div class="breadcrumb">
                        <a href="/WASHY/Pages/Transaction/index.php">Transaction</a>
                        <span>></span>
                        <p class="current">Add New</p>
                    </div>
                    <h1>Add New Transaction</h1>
                </div>
                
            </div>

            <div class="form-section">
                <form action="/WASHY/Pages/Transaction/tambah-proses.php" method="POST">
                    <label for="nama_customer">Customer</label><br>
                    <select class="dropdown" name="nama_customer">
                        <option value="null">Choose Customer</option>
                        <?php foreach($customer as $c): ?>
                        <option value="<?php echo $c['first_name'].' '. $c['last_name']?>"><?= $c['first_name'].' '. $c['last_name'] ?></option>
                        <?php  endforeach; ?>
                    </select><br><br>

                    <label for="service_type">Service Type</label><br>
                    <select class="dropdown" name="service_type" id="service_type" onchange="countPrice(this.value, document.getElementById('weight').value)">
                        <option value="null">Choose Service Type</option>
                        <option value="Regular">Regular</option>
                        <option value="Express">Express</option>
                    </select><br><br>

                    <label for="weight">Laundry Weight</label><br>
                    <input type="text" name="weight" class="input-box" placeholder="Input Laundry Weight" oninput="countPrice(document.getElementById('service_type').value, this.value)" />
                    <br><br>

                    <div class="price">
                        <h4>Total Price</h4>
                        <h1 id="count_price">Rp 0</h1>
                    </div><br>

                    <input type="submit" class="add-btn"/>
                </form>

        </div>
    </body>
</html>
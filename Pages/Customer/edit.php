<?php
    require '../../db.php';

    $id_customer = $_GET['id_customer'];

    $show = $conn->query("SELECT * FROM customer WHERE id_customer = '$id_customer'");

    if($show->num_rows == 0)
    {
        echo'<script>window.history.back()</script>';
    } else 
    {
        $data = $show->fetch_assoc();
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
                        <a href="/WASHY/Pages/Customer/index.php" class="menu-button active">
                            <div class="logo-box">
                                <img class="button-logo" src="/WASHY/img/customer_button.png"/>
                            </div>
                            <div class="menu-text">
                                Customer
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/WASHY/Pages/Transaction/index.php" class="menu-button">
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
                        <a href="/WASHY/Pages/Customer/index.php">Customer</a>
                        <span>></span>
                        <p class="current">Edit</p>
                    </div>
                    <h1>Edit Customer</h1>
                </div>
                
            </div>

            <div class="form-section">
                <form action="/WASHY/Pages/Customer/edit-proses.php" method="POST">

                    <input type="hidden" name="id_customer" value="<?php echo $id_customer; ?>">

                    <div class="input-name">
                        <div class="input-group">
                            <label for="first_name">First Name</label><br>
                        <input type="text" name="first_name" id="first_name" value="<?php echo $data['first_name']; ?>" class="input-box-name" placeholder="First Name" required/>
                        </div>
                        
                        <div class="input-group">
                            <label for="last_name">Last Name</label><br>
                            <input type="text" name="last_name" id="last_name" value="<?php echo $data['last_name']; ?>" class="input-box-name" placeholder="Last Name" required/>
                        </div>
                    </div><br>

                    <label for="home_address">House Address</label><br>
                    <input type="text" name="house_address" id="house_address" value="<?php echo $data['house_address']; ?>" class="input-box" placeholder="Input Home Address"/><br><br>

                    <label for="email_address">Email Address</label><br>
                    <input type="text" name="email_address" id="email_address" value="<?php echo $data['email_address']; ?>" class="input-box" placeholder="Input Email Address"/><br><br>

                    <label for="phone_number">Phone Number</label><br>
                    <input type="text" name="phone_number" id="phone_number" value="<?php echo $data['phone_number']; ?>" class="input-box" placeholder="Input Phone Number"/><br><br><br>

                    <div id="errorMsgCus" style="color:red; text-align:left; margin-bottom: 20px;"></div>

                    <input type="submit" name="submit" class="add-btn" value="submit" onclick="return ValCustomer();"/>
                </form>

        </div>
    </body>
</html>
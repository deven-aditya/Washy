<?php
    include("../../db.php");

    session_start();

    if(!isset($_SESSION['id_user']))
    {
        header("Location: /WASHY/login.php");
        exit;
    }

    $id_user = $_SESSION['id_user'];

    $show = $conn->query("SELECT * FROM users WHERE id_user = '$id_user'");

    if($show->num_rows == 0)
    {
        echo'<script>window.history.back()</script>';
    } else 
    {
        $data = $show->fetch_assoc();
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
                <ul class="menu menu-settings active">
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
                    <h1>ACCOUNT</h1>
                </div>
            </div>
            
            <div class="form-section">
                <a href="/WASHY/Pages/Account/edit.php" class="acc-edit-btn">Edit</a>
                <img class="profile" src="/WASHY/uploads/<?php echo $data["profile_photo"]; ?>" alt="Profile Photo" style="width: 100px; "><br><br>
                
                <div class="account-name">
                    <div class="account-field">
                        <label>First Name</label>
                        <p><?= $data["first_name"] ?></p>
                    </div>
                    
                    <div class="account-field">
                        <label>Last Name</label>
                        <p><?= $data["last_name"] ?></p>
                    </div>
                </div>

                <div class = "account-field">
                    <label>Username</label>
                    <p><?= $data["username"] ?></p>
                </div>

                <div class = "account-field">
                    <label>Email Address</label>
                    <p><?= $data["email_address"] ?></p>
                </div>

                <div class = "account-field">
                    <label>Phone Number</label>
                    <p><?= $data["phone_number"] ?></p>
                </div>
            </div>
            <br>
            
        </div>

    </body>
</html>
<?php
    require '../../db.php';

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
                    <div class="breadcrumb">
                        <a href="/WASHY/Pages/Account/index.php">Account</a>
                        <span>></span>
                        <p class="current">Edit</p>
                    </div>
                    <h1>Edit Account</h1>
                </div>
                
            </div>
            
            <div class="form-section">
                <form action="/WASHY/Pages/Account/edit-proses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id_user; ?>">
                    
                    <img class="profile" src="/WASHY/uploads/<?php echo $data["profile_photo"]; ?>" alt="Profile Photo"><br>
                    <input type="file" name="profile_photo" id="profile_photo" hidden>
                    <label for="profile_photo" class="photo-btn">Upload Foto</label>
                    
                    <br><br>
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

                    <label for="email_address">Email Address</label><br>
                    <input type="text" name="email_address" id="email_address" value="<?php echo $data['email_address']; ?>" class="input-box" placeholder="Input Email Address" required/><br><br>

                    <label for="phone_number">Phone Number</label><br>
                    <input type="text" name="phone_number" id="phone_number" value="<?php echo $data['phone_number']; ?>" class="input-box" placeholder="Input Phone Number" required/><br><br>

                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" value="<?php echo $data['username']; ?>" class="input-box" placeholder="Input Username" required/><br><br><br>

                    <input type="submit" name="submit" class="add-btn" value="Submit"/>
                </form>
            </div>
        </div>
        
    </body>
</html>
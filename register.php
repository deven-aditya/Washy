<?php

require "db.php";
session_start();

if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['conf_password'];
    $default_photo = "default.png";

    if($password !== $confirm_password)
    {
        echo '<script>window.history.back()</script>';
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email_address, phone_number, username, password, profile_photo)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $email_address, $phone_number, $username, $hashed_password, $default_photo);

    if($stmt->execute())
    {
        $_SESSION['id_user'] = $user['id_user'];

        header('Location: /WASHY/login.php');
        exit;
    } else {
        echo '<script>window.history.back()</script>';
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
        <div class="register">
            <div class="register-card">
                <img src="/WASHY/img/Logo.png">
                <h1>Create Your Account</h1>

                <form action="/WASHY/register.php" method="POST">
                    <div class="form-section">
                        <div class="input-name">
                            <div class="input-group">
                                <label for="first_name">First Name</label><br>
                                <input type="text" name="first_name" id="first_name" class="input-box-name" placeholder="First Name" required/>
                            </div>
                            
                            <div class="input-group">
                                <label for="last_name">Last Name</label><br>
                                <input type="text" name="last_name" id="last_name" class="input-box-name" placeholder="Last Name" required/>
                            </div>
                        </div><br>

                        <label for="email_address">Email Address</label><br>
                        <input type="text" name="email_address" id="email_address" class="input-box" placeholder="Input Email Address" required/><br><br>

                        <label for="phone_number">Phone Number</label><br>
                        <input type="text" name="phone_number" id="phone_number" class="input-box" placeholder="Input Phone Number" required/><br><br>

                        <label for="username">Username</label><br>
                        <input type="text" name="username" id="username" class="input-box" placeholder="Input Username" required/><br><br>

                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" class="input-box" placeholder="Input Password" required/><br><br>

                        <label for="conf_password">Confirm Password</label><br>
                        <input type="password" name="conf_password" id="conf_password" class="input-box" placeholder="Confirm Password" required/><br><br><br>

                        <button type="submit" name="submit" class="add-btn" value="Register">Register</button>
                    </div>
                    
                </form><br>

                <h4>
                    Already have an account? <a href="/WASHY/login.php">Login</a>
                </h4>
            </div>
        </div>
    </body>
</html>
<?php

require "../db.php";
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

    $_SESSION['old'] = $_POST;

    if($password !== $confirm_password)
    {
        header("Location: /WASHY/register.xhtml?error=pass");
        exit;
    }

    //cek username
    $checkUser = $conn->prepare("SELECT id_user FROM users WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $resultUser = $checkUser->get_result();

    if($resultUser->num_rows > 0){
        header("Location: /WASHY/register.xhtml?error=user");
        exit;
    }

    //cek email
    $checkEmail = $conn->prepare("SELECT id_user FROM users WHERE email_address = ?");
    $checkEmail->bind_param("s", $email_address);
    $checkEmail->execute();
    $resultEmail = $checkEmail->get_result();

    if($resultEmail->num_rows > 0){
        $_SESSION['errorMsg'] = "Email Address is already registered.";
        header("Location: /WASHY/register.xhtml?error=email");
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email_address, phone_number, username, password, profile_photo)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $email_address, $phone_number, $username, $hashed_password, $default_photo);

    if($stmt->execute())
    {
        $_SESSION['id_user'] = $user['id_user'];

        header('Location: /WASHY/login.xhtml?register=success');
        exit;
    } else {
        echo '<script>window.history.back()</script>';
    }
}

?>
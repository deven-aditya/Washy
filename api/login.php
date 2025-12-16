<?php

    require "../db.php";
    session_start();

    $errorMsg = "";    

    if(isset($_POST['username'], $_POST['password']))
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $conn->query("SELECT * FROM users WHERE username='$username'");
        $user = $sql->fetch_assoc();

        if($user && password_verify($password, $user['password']))
        {
            $_SESSION['id_user'] = $user['id_user']; //ini diganti jadi id_user

            header('Location: /WASHY/Pages/Dashboard/index.xhtml');
            exit;
        } else {
            header("Location: ../login.xhtml?error=1");
        }
    }
?>
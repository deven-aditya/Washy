<?php

    require "db.php";
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

            header('Location: /WASHY/Pages/Dashboard/index.php');
            exit;
        } else {
            $errorMsg =  "Invalid Username or Password";
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
        <div class="login">
            <div class="login-card">
                <img src="/WASHY/img/Logo.png">
                <h4>Washy Laundry Management System</h4>
                
                <form action="/WASHY/login.php" method="POST">
                    <input type="text" name="username" id="username" placeholder="Username" required><br>
                    <input type="password" name="password" id="password" placeholder="Password" required><br><br>

                    <div id="errorMsg" style="color:red; margin-top:10px">
                        <?= $errorMsg ?>
                    </div>

                    <button type="submit" onclick="return fn_ValLogin();">Login</button>
                </form><br>

                <h4>
                    Register <a href="/WASHY/register.php">here</a>
                </h4>
            </div>
        </div>
    </body>
</html>
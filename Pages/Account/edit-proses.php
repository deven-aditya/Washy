<?php
require '../../db.php';
session_start();

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /WASHY/Pages/Account/index.php');
    exit;
}

if(isset($_POST['submit'])){
    $id_user = $_SESSION['id_user'];   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];

    // PROFILE PHOTO
    $profile = $conn->query("SELECT profile_photo FROM users WHERE id_user='$id_user'")->fetch_assoc();
    $filename = $profile["profile_photo"];

    if(!empty($_FILES["profile_photo"]["name"]))
    {
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $status_upload = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
        if(($check === false) ||
            ($_FILES["profile_photo"]["size"] > 500000) ||
            ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"))
        {
            $status_upload = 0;
        }

        if($status_upload === 0){
            echo '<script>window.history.back()</script>';
            exit;
        } else if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)){
            $filename = basename($_FILES["profile_photo"]["name"]);
        }
    }

    $sql = "UPDATE users SET 
            first_name=?,    
            last_name=?,
            email_address=?,
            phone_number=?,
            username=?,
            profile_photo=?
            WHERE id_user=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $first_name, $last_name, $email_address, $phone_number, $username, $filename, $id_user);

    if ($stmt->execute()) {
        header("Location: /WASHY/Pages/Account/index.xhtml?msg=created");
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    echo json_encode(["status" => "error", "message" => $stmt->error]);
    echo '<script>window.history.back()</script>';
}
?>
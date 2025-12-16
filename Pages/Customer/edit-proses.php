<?php
require '../../db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /WASHY/Pages/Customer/index.xhtml');
    exit;
}

if(isset($_POST['submit'])){

    $id_customer = $_POST['id_customer'];   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house_address = $_POST['house_address'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];

    $sql = ("UPDATE customer SET 
            first_name=?,    
            last_name=?,
            house_address=?,
            email_address=?,
            phone_number=?
            WHERE id_customer=?") or die($conn->error); 

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $first_name, $last_name, $house_address, $email_address, $phone_number, $id_customer);

    if ($stmt->execute()) {
        header("Location: /WASHY/Pages/Customer/index.xhtml?msg=created");
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

}else{ 
    echo json_encode(["status" => "error", "message" => $stmt->error]);
    header('Location: /WASHY/Pages/Customer/index.xhtml');
    exit;
}
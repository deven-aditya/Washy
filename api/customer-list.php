<?php
    header("Content-Type: application/json");
    include("../db.php");

    $search = $_GET['search'] ?? '';

    if($search !== '')
    {
        $search = $conn->real_escape_string($search);

        $sql = "
            SELECT * FROM customer WHERE
            id_customer LIKE '%$search%' OR
            first_name LIKE '%$search%' OR
            last_name LIKE '%$search%' OR
            house_address LIKE '%$search%' OR
            email_address LIKE '%$search%' OR
            phone_number LIKE '%$search%'
        ";

        $query = $conn->query($sql);
    } else{
        $query = $conn->query("SELECT * FROM customer");
    }

    $customers = [];  
    
    if($query->num_rows != 0) {
        while($row = $query->fetch_assoc()) {
            $customers[] = $row;
        }
    }
    echo json_encode($customers);
?>
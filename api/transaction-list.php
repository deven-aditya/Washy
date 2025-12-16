<?php
    header("Content-Type: application/json");
    include("../db.php");

    $search = $_GET['search'] ?? '';

    if($search !== '')
    {
        $search = $conn->real_escape_string($search);

        $sql = "
            SELECT * from transaction_data t
            JOIN customer c ON (t.id_customer=c.id_customer)
            WHERE
            c.first_name LIKE '%$search%' OR
            c.last_name LIKE '%$search%' OR
            t.service_type LIKE '%$search%' OR
            t.price LIKE '%$search%' OR
            t.weight LIKE '%$search%' OR
            t.id_transaction LIKE '%$search%'
        ";
        $query = $conn->query($sql);
    } else{
        $query = $conn->query("SELECT * FROM transaction_data t JOIN customer c ON t.id_customer=c.id_customer");
    }

    $trans=[];

    if($query->num_rows!=0){
        while($row=$query->fetch_assoc()){
            $trans[]=$row;
        }
    } 

    echo json_encode($trans);

?>
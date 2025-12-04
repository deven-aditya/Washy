<?php

require '../../db.php';

if(!isset($_GET['id_transaction']))
{
    header("Location: /WASHY/Pages/Transaction/index.php?msg=created");
    exit;
}

$id = $_GET['id_transaction'];

$cek = $conn->query("SELECT id_transaction FROM transaction_data WHERE id_transaction ='$id'") or die($conn->error); 

if($cek->num_rows == 0)
{
    header("Location: /WASHY/Pages/Transaction/index.php?msg=created");
    exit;
} else
{
    $del = $conn->query("DELETE FROM transaction_data WHERE id_transaction ='$id'");
    header("Location: /WASHY/Pages/Transaction/index.php?msg=created");
    exit;
}

?>
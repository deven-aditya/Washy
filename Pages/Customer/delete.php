<?php

require '../../db.php';

if(!isset($_GET['id_customer']))
{
    header("Location: /WASHY/Pages/Customer/index.xhtml?msg=created");
    exit;
}

$id = $_GET['id_customer'];

$cek = $conn->query("SELECT id_customer FROM customer WHERE id_customer='$id'") or die($conn->error); 

if($cek->num_rows == 0)
{
    header("Location: /WASHY/Pages/Customer/index.xhtml?msg=created");
    exit;
} else
{
    $del = $conn->query("DELETE FROM customer WHERE id_customer='$id'");
    header("Location: /WASHY/Pages/Customer/index.xhtml?msg=created");
    exit;
}

?>
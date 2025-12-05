<?php
$conn = new mysqli("localhost", "root", "", "laundrydb", 3307); //harap diganti sesuai port device

if($conn->connect_error){
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}

?>

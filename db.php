<?php
$conn = new mysqli("localhost", "root", "", "laundrydb", 3306);

if($conn->connect_error){
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}

?>
